<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class TenantScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $user = Auth::hasUser() ? Auth::user() : null; // do not edit to this: $user = Auth::user()
        if ($user === null or $user->is_admin) {
            return; // do not apply to public APIs and admin
        } elseif ($user->branch_id) {
            $builder->where('branch_id', $user->branch_id);
        } elseif ($user->vendor_id) {
            $builder->whereHas('branch', function ($query) use ($user) {
                $query->where('vendor_id', $user->vendor_id);
            });
        }
    }
}
