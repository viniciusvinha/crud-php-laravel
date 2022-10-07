<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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

     /**
      * Dentro do método boot, chamaremos o método Schema com o default do tamanho das colunas
      */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
