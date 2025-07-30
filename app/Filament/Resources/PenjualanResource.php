<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenjualanResource\Pages;
use App\Filament\Resources\PenjualanResource\RelationManagers;
use App\Models\Penjualan;
use App\Models\Sampah;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenjualanResource extends Resource
{
    protected static ?string $model = Penjualan::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Bank Management';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Group::make()->schema([
                        TextInput::make('pembeli')->required()->maxLength(255),
                        TextInput::make('kontak')->required()->maxLength(255),
                    ])->columns(2),

                    Group::make()->schema([
                        Select::make('sampah_id')->relationship('sampah', 'nama')
                            ->live(onBlur:true)
                            ->afterStateUpdated(function($state, callable $set) {
                                $sampah = Sampah::find($state);
                                $set('harga', $sampah ? $sampah->harga: 0);
                            }),
                        TextInput::make('harga')->readOnly()->dehydrated()->numeric()
                    ])->columns(2),

                    Group::make()->schema([
                        TextInput::make('berat')->required()->numeric()
                            ->live()
                            ->afterStateUpdated(function($state, callable $set, $get) {
                                $harga = $get('harga');
                                $set('total', $harga * $state);
                            }),
                        TextInput::make('total')->readOnly()->dehydrated()
                    ])->columns(2)
                    
                ])->columnSpan(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pembeli')->sortable()->searchable(),
                TextColumn::make('sampah.nama')->searchable(),
                TextColumn::make('kontak')->searchable(),
                TextColumn::make('harga')->sortable()->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextColumn::make('berat')->sortable()->formatStateUsing(fn($state) => $state. ' KG'),
                TextColumn::make('total')->sortable()->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextColumn::make('created_at')->sortable()->toggleable(isToggledHiddenByDefault:true),
            ])
            ->filters([
                SelectFilter::make('sampah_id')->label('Jenis Sampah')->relationship('sampah', 'nama')
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    DeleteAction::make()    
                ])
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
            'index' => Pages\ListPenjualans::route('/'),
            'create' => Pages\CreatePenjualan::route('/create'),
            'edit' => Pages\EditPenjualan::route('/{record}/edit'),
        ];
    }
}
