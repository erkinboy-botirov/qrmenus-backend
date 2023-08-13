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
            $data['vendor_id'] = null; // if branch id is set it means the new user should be a branch user only
        }

        if (isset($data['is_admin']) && $data['is_admin'] && auth()->user()->is_not_admin) {
            $data['is_admin'] = false; // just in case, non-admin users cannot create one
        }

        return $data;
    }
}
