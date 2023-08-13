<?php

use Illuminate\Support\Facades\Route;

Route::get('vendors/{subdomain}', [\App\Http\Controllers\Api\VendorController::class, 'show']);
