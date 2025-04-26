<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessReviewResource\Pages;
use App\Models\BusinessReview;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;

class BusinessReviewResource extends Resource
{
    protected static ?string $model = BusinessReview::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Reviews';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('business_id')->required(),
                Forms\Components\TextInput::make('user_id')->required(),
                Forms\Components\TextInput::make('rating')->required(),
                Forms\Components\Textarea::make('comment'),
                Forms\Components\TextInput::make('status')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('business.name')->label('Business'),
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('rating'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                // Add filters as needed
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBusinessReviews::route('/'),
            'create' => Pages\CreateBusinessReview::route('/create'),
            'edit' => Pages\EditBusinessReview::route('/{record}/edit'),
        ];
    }
}
