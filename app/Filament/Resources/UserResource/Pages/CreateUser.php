<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['branch_id']) && isset($data['vendor_id'])) {
            $data['vendor_id'] = null;
        }

        return $data;
    }
}
