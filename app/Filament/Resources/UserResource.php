<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use BackedEnum;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|UnitEnum|null $navigationGroup = 'User Management';

    protected static ?int $navigationSort = 5;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make()->schema([
                    TextInput::make('name')->required()->maxLength(255),
                    TextInput::make('email')->required()->email()->unique(ignoreRecord: true),
                    TextInput::make('password')->required()->password()->revealable(),
                    Select::make('roles')->relationship('roles', 'name'),
                    // Hidden::make('saldo')->default(0),
                    // Hidden::make('jumlah_penarikan')->default(0),
                    // Hidden::make('jumlah_setoran')->default(0),
                ])->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('roles.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('jumlah_setoran')
                    ->label('Jml Setor')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => empty($state) ? 0 : $state),
                TextColumn::make('jumlah_penarikan')
                    ->label('Jml Tarik')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => empty($state) ? 0 : $state),
                TextColumn::make('saldo')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => 'Rp. '.number_format($state, 0, ',', '.')),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make()
                        ->requiresConfirmation()
                        ->action(function (Model $record) {
                            if ($record->email === Auth::user()->email || $record->email == 'adminn@banksampah.com') {
                                Notification::make()
                                    ->title('Operation Failed')
                                    ->body($record->name.' tidak boleh di hapus')
                                    ->danger()
                                    ->send();

                                return;
                            }
                            Notification::make()
                                ->title('Operation Successfully')
                                ->success()
                                ->send();

                            // $record->delete();
                        }),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
