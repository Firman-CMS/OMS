<?php

namespace Modules\Oms\Providers;

use Illuminate\Support\ServiceProvider;

class OmsComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        view()->composer(
            '*', 'Modules\Oms\Http\Controllers\OmsController'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
