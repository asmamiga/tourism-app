<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuideBookingResource\Pages;
use App\Models\GuideBooking;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;

class GuideBookingResource extends Resource
{
    protected static ?string $model = GuideBooking::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Bookings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('guide_id')->required(),
                Forms\Components\TextInput::make('user_id')->required(),
                Forms\Components\DatePicker::make('date')->required(),
                Forms\Components\TextInput::make('status')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('guide.name')->label('Guide'),
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('date')->date(),
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
            'index' => Pages\ListGuideBookings::route('/'),
            'create' => Pages\CreateGuideBooking::route('/create'),
            'edit' => Pages\EditGuideBooking::route('/{record}/edit'),
        ];
    }
}
