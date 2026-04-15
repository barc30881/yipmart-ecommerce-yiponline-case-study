<?php

namespace Modules\YipEcommerce\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(module_path('YipEcommerce', '/routes/web.php'));

            Route::middleware('api')
                ->prefix('api')
                ->group(module_path('YipEcommerce', '/routes/api.php'));
        });

        // Register view namespace for Smarty-style hint (yip_ecommerce::)
        view()->addNamespace('yip_ecommerce', module_path('YipEcommerce', 'resources/views'));
    }
}