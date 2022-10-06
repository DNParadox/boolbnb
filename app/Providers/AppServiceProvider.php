<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'q7w73cvf9hk8pdh9',
                    'publicKey' => 'r6wnwmnjdbn4y2ps',
                    'privateKey' => '19ca664cb520492c1ece401b4bb1bf4a'  
                ]
                
            );
        });
    }
}
