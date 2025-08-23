<?php

namespace App\Filament\Resources\SmtpServerResource\Pages;

use App\Filament\Resources\SmtpServerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmtpServer extends EditRecord
{
    protected static string $resource = SmtpServerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
