<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // public function getTabs(): array
    // {
    //     return [
    //         'all' => Tab::make(),
    //         'vendors' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('vendor_id')),
    //         'branches' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('branch_id')),
    //         'admins' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('is_admin', true)),
    //     ];
    // }
}
