<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-server-stack';
    protected static ?string $navigationLabel = 'Stok Server (Packages)';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('game_id')
                    ->relationship('game', 'name') // Menghubungkan ke model Game
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Game Category'),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                
                // Grup untuk spesifikasi server
                Forms\Components\Section::make('Spesifikasi Server')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('ram')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('cpu')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('storage')
                            ->required()
                            ->maxLength(255),
                    ]),

                // PERUBAHAN: Mengelompokkan harga dan menambahkan field baru
                Forms\Components\Section::make('Harga dan Stok')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('price_monthly')
                            ->label('Harga Lokasi Basic')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                        Forms\Components\TextInput::make('price_premium_addon')
                            ->label('Biaya Tambahan Premium')
                            ->helperText('Tambahan biaya untuk lokasi premium.')
                            ->required()
                            ->numeric()
                            ->prefix('Rp')
                            ->default(0),
                        Forms\Components\TextInput::make('stock')
                            ->required()
                            ->numeric()
                            ->default(10),
                    ]),

                Forms\Components\Toggle::make('is_popular')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('game.name') // Menampilkan nama game dari relasi
                    ->sortable(),
                Tables\Columns\TextColumn::make('ram'),
                Tables\Columns\TextColumn::make('price_monthly')
                    ->money('IDR') // Format sebagai mata uang Rupiah
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_popular')
                    ->boolean(),
                // PERUBAHAN: Menambahkan kolom stok di tabel
                Tables\Columns\TextColumn::make('stock')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }    
}
