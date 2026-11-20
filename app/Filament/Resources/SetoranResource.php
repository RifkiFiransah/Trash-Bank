<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SetoranResource\Pages;
use App\Models\Sampah;
use App\Models\Setoran;
use BackedEnum;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class SetoranResource extends Resource
{
    protected static ?string $model = Setoran::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-currency-dollar';

    protected static string|UnitEnum|null $navigationGroup = 'Bank Management';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('')->schema([
                    Select::make('sampah_id')
                        ->relationship('sampah', 'nama')
                        ->live(onBlur: true)
                        ->afterStateUpdated(function ($state, callable $set) {
                            $sampah = Sampah::find($state);
                            $set('harga', $sampah ? $sampah->harga : 0);
                            $set('total', 0);
                        }),
                    Hidden::make('user_id')
                        ->default(Auth::user()->id),
                    TextInput::make('berat')
                        ->required()
                        ->numeric()
                        ->live(onBlur: true)
                        ->afterStateUpdated(function ($state, callable $set, $get) {
                            $harga = $get('harga');
                            $set('total', $state * $harga);
                        })
                        ->helperText('Masukan angka berat per-KG'),
                    TextInput::make('harga')
                        ->readOnly()
                        ->numeric()
                        ->dehydrated(false)
                        ->label('Harga per-KG'),
                    TextInput::make('total')->required()->readOnly()->dehydrated()->helperText('Total harga akan muncul setelah mengisi input berat'),
                ])->columnSpan(2),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (Auth::user()->email !== 'adminn@banksampah.com') {
            $query->where('user_id', Auth::id());
        }

        return $query;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->searchable()->sortable(),
                TextColumn::make('sampah.nama')->searchable()->sortable(),
                TextColumn::make('berat')->sortable()->formatStateUsing(fn ($state) => $state.' KG'),
                TextColumn::make('total')->money('IDR', 1, '.', '.')->sortable(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make() // Menggunakan CreateAction yang benar
                // ->mutateFormDataUsing(function (array $data): array {
                //     $data['user_id'] = auth()->id(); // Menambahkan user_id jika diperlukan
                //     return $data;
                // }),
            ])
            ->filters([
                SelectFilter::make('sampah_id')->label('Jenis Sampah')->relationship('sampah', 'nama'),
                SelectFilter::make('user_id')->label('Nama')->relationship('user', 'name'),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
        // ->query(function (Builder $query): Builder {
        //     // Hanya tampilkan data user tertentu jika bukan admin
        //     if (Auth::check() && Auth::user()->email != 'adminn@banksampah.com') {
        //         $query->where('user_id', Auth::id());
        //     }
        //     return $query;
        // });
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
            'index' => Pages\ListSetorans::route('/'),
            'create' => Pages\CreateSetoran::route('/create'),
            'edit' => Pages\EditSetoran::route('/{record}/edit'),
        ];
    }
}
