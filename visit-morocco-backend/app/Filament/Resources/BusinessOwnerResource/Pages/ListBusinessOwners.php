<?php

namespace App\Filament\Resources\BusinessOwnerResource\Pages;

use App\Filament\Resources\BusinessOwnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBusinessOwners extends ListRecords
{
    protected static string $resource = BusinessOwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
