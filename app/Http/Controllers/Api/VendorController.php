<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VendorController extends Controller
{
    public function show(string $subdomain, Request $request)
    {
        $vendor = Cache::get("vendor.{$subdomain}");
        if ($vendor === null) {
            $vendor = Vendor::whereSubdomain($subdomain)
                ->with('branches.categories.products.portions')
                ->firstOrFail();
            $vendor->setRelation('branches', $vendor->branches->keyBy('slug'));
            Cache::forever("vendor.{$subdomain}", $vendor);
        }

        if ($request->filled('branch') && $vendor->branches?->has($request->branch)) {
            $vendor->setRelation('branch', $vendor->branches->get($request->branch));
            $vendor->unsetRelation('branches');
        }

        return response()->json($vendor);
    }
}
