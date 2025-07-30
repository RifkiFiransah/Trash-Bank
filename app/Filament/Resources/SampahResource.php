<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SampahResource\Pages;
use App\Filament\Resources\SampahResource\RelationManagers;
use App\Models\Sampah;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class SampahResource extends Resource
{
    protected static ?string $model = Sampah::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Sampah Category';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Daftar Sampah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([

                    Section::make()->schema([
                        Group::make()->schema([
                            TextInput::make('nama')->helperText('Masukan nama sampah')->required()->maxLength(255)
                        ])->columnSpanFull(),
    
                        Group::make()->schema([
                            TextInput::make('satuan')->helperText('Masukan satuan berat :ex(KG/Liter)')->required()->maxLength(255),
                            TextInput::make('harga')->helperText('Masukan Harga Per-satuan')->numeric()->required(),
                        ])->columns(2),
    
                        Group::make()->schema([
                            FileUpload::make('image')->image()->maxSize(6000)->required()
                        ])->columnSpanFull()
                    ])->columnSpan(2),

                ])->columnSpan(2),

                Section::make('Kategori Sampah')->schema([
                    Radio::make('jenis')->options(['organik' => 'Organik', 'none-organik' => 'None Organik'])->required()->inline()->inlineLabel(false)
                ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('satuan'),
                TextColumn::make('harga')->sortable()->formatStateUsing(fn($state) => "Rp. ".number_format($state, 0, ',', '.')),
                TextColumn::make('jenis')->sortable(),
                ImageColumn::make('image')->sortable()->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault:false)
            ])
            ->filters([
                SelectFilter::make('jenis')->options(['organik' => 'Organik', 'none-organik' => 'None Organik'])
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListSampahs::route('/'),
            'create' => Pages\CreateSampah::route('/create'),
            'edit' => Pages\EditSampah::route('/{record}/edit'),
        ];
    }
}
