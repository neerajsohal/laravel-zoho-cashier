<?php

namespace Neerajsohal\Laravel\Zoho\Cashier;

use Illuminate\Support\ServiceProvider;
use Neerajsohal\Laravel\Zoho\Cashier\Subscription\ZohoSubscriptionClient as Zoho;

class ZohoCashierServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('zoho', function ($app) {
            $zohoConfig = config('services.zoho');
            return new Zoho(
                    $zohoConfig['token'],
                    $zohoConfig['organisation_id'],
                    $app->make('cache')
                );
        });
    }
}
