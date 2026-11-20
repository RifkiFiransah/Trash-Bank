<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenjualanResource\Pages;
use App\Models\Penjualan;
use App\Models\Sampah;
use BackedEnum;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class PenjualanResource extends Resource
{
    protected static ?string $model = Penjualan::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-credit-card';

    protected static string|UnitEnum|null $navigationGroup = 'Bank Management';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make()->schema([
                    Group::make()->schema([
                        TextInput::make('pembeli')->required()->maxLength(255),
                        TextInput::make('kontak')->required()->maxLength(255),
                    ])->columns(2),

                    Group::make()->schema([
                        Select::make('sampah_id')->relationship('sampah', 'nama')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set) {
                                $sampah = Sampah::find($state);
                                $set('harga', $sampah ? $sampah->harga : 0);
                            }),
                        TextInput::make('harga')->readOnly()->dehydrated()->numeric(),
                    ])->columns(2),

                    Group::make()->schema([
                        TextInput::make('berat')->required()->numeric()
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set, $get) {
                                $harga = $get('harga');
                                $set('total', $harga * $state);
                            }),
                        TextInput::make('total')->readOnly()->dehydrated(),
                    ])->columns(2),

                ])->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pembeli')->sortable()->searchable(),
                TextColumn::make('sampah.nama')->searchable(),
                TextColumn::make('kontak')->searchable(),
                TextColumn::make('harga')->sortable()->formatStateUsing(fn ($state) => 'Rp '.number_format($state, 0, ',', '.')),
                TextColumn::make('berat')->sortable()->formatStateUsing(fn ($state) => $state.' KG'),
                TextColumn::make('total')->sortable()->formatStateUsing(fn ($state) => 'Rp '.number_format($state, 0, ',', '.')),
                TextColumn::make('created_at')->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('sampah_id')->label('Jenis Sampah')->relationship('sampah', 'nama'),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
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
            'index' => Pages\ListPenjualans::route('/'),
            'create' => Pages\CreatePenjualan::route('/create'),
            'edit' => Pages\EditPenjualan::route('/{record}/edit'),
        ];
    }
}
