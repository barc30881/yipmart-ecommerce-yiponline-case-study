<?php

use Illuminate\Support\Facades\Route;
use Modules\YipEcommerce\Http\Controllers\YipEcommerceController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('yipecommerces', YipEcommerceController::class)->names('yipecommerce');
});
