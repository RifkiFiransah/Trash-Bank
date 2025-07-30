<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenarikanResource\Pages;
use App\Filament\Resources\PenarikanResource\RelationManagers;
use App\Models\Penarikan;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PenarikanResource extends Resource
{
    protected static ?string $model = Penarikan::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Bank Management';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Hidden::make('user_id')->default(Auth::user()->id),
                    TextInput::make('nama')->default(Auth::user()->name)
                        ->required()
                        ->readOnly(),
                    TextInput::make('saldo')->default(Auth::user()->saldo)
                        ->readOnly()
                        ->dehydrated(false),
                    TextInput::make('jumlah')->required()
                        ->numeric()
                        ->rule(fn($get) => 'lte:' . $get('saldo'))
                        ->helperText('Jumlah tidak boleh lebih dari saldo'),
                ])->columnSpan(1)
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if(Auth::user()->email !== "adminn@banksampah.com"){
            $query->where('user_id', Auth::id());
        }

        return $query;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('jumlah')->sortable()->formatStateUsing(fn($state) => 'Rp. '.number_format($state, '0', ',', '.'))
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPenarikans::route('/'),
            'create' => Pages\CreatePenarikan::route('/create'),
            'edit' => Pages\EditPenarikan::route('/{record}/edit'),
        ];
    }
}
