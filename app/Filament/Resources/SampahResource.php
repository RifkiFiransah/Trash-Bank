<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SampahResource\Pages;
use App\Models\Sampah;
use BackedEnum;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use UnitEnum;

class SampahResource extends Resource
{
    protected static ?string $model = Sampah::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-truck';

    protected static string|UnitEnum|null $navigationGroup = 'Sampah Category';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Daftar Sampah';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Group::make()->schema([

                    Section::make()->schema([
                        Group::make()->schema([
                            TextInput::make('nama')->helperText('Masukan nama sampah')->required()->maxLength(255),
                        ])->columnSpanFull(),

                        Group::make()->schema([
                            TextInput::make('satuan')->helperText('Masukan satuan berat :ex(KG/Liter)')->required()->maxLength(255),
                            TextInput::make('harga')->helperText('Masukan Harga Per-satuan')->numeric()->required(),
                        ])->columns(2),

                        Group::make()->schema([
                            FileUpload::make('image')->image()->maxSize(6000)->required(),
                        ])->columnSpanFull(),
                    ])->columnSpan(2),

                ])->columnSpan(2),

                Section::make('Kategori Sampah')->schema([
                    Radio::make('jenis')->options(['organik' => 'Organik', 'none-organik' => 'None Organik'])->required()->inline()->inlineLabel(false),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('satuan'),
                TextColumn::make('harga')->sortable()->formatStateUsing(fn ($state) => 'Rp. '.number_format($state, 0, ',', '.')),
                TextColumn::make('jenis')->sortable(),
                ImageColumn::make('image')->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                SelectFilter::make('jenis')->options(['organik' => 'Organik', 'none-organik' => 'None Organik']),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make()
                        ->requiresConfirmation()
                        ->action(function (Model $record) {
                            try {
                                FacadesStorage::disk('public')->delete($record->image);
                                $record->delete();
                                Notification::make()
                                    ->title('Deleted Successfully')
                                    ->success()
                                    ->send();
                            } catch (\Throwable $th) {
                                Notification::make()
                                    ->title('Failed Delete')
                                    ->danger()
                                    ->send();
                                dd($th);
                            }
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
            'index' => Pages\ListSampahs::route('/'),
            'create' => Pages\CreateSampah::route('/create'),
            'edit' => Pages\EditSampah::route('/{record}/edit'),
        ];
    }
}
