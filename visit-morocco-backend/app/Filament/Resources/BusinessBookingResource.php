<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessBookingResource\Pages;
use App\Models\BusinessBooking;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;

class BusinessBookingResource extends Resource
{
    protected static ?string $model = BusinessBooking::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Bookings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('business_id')->required(),
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
                Tables\Columns\TextColumn::make('business.name')->label('Business'),
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
            'index' => Pages\ListBusinessBookings::route('/'),
            'create' => Pages\CreateBusinessBooking::route('/create'),
            'edit' => Pages\EditBusinessBooking::route('/{record}/edit'),
        ];
    }
}
