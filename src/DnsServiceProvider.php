<?php

namespace Vyacheslavhava\DnsService;

use Illuminate\Support\ServiceProvider;

class DnsServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(DnsServiceInterface::class, function($app){
            return new DnsService();
        });
    }
}
