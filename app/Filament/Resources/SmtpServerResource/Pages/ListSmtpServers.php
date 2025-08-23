<?php

namespace App\Filament\Resources\SmtpServerResource\Pages;

use App\Filament\Resources\SmtpServerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmtpServers extends ListRecords
{
    protected static string $resource = SmtpServerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
