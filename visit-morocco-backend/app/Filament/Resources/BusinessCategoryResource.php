<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessCategoryResource\Pages;
use App\Models\BusinessCategory;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;

class BusinessCategoryResource extends Resource
{
    protected static ?string $model = BusinessCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Businesses';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\Textarea::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                // Add filters as needed
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBusinessCategories::route('/'),
            'create' => Pages\CreateBusinessCategory::route('/create'),
            'edit' => Pages\EditBusinessCategory::route('/{record}/edit'),
        ];
    }
}
