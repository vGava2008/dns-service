<?php

namespace Vyacheslavhava\DnsService;

use Illuminate\Support\ServiceProvider;

class DnsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(DnsServiceInterface::class, function($app){
            return new DnsService();
        });
    }
}
