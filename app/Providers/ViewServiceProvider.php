<?php

namespace App\Providers;

use App\Category;
use App\Setting;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        view()->composer('forent.inc.header' , function($view){

            $view->with('cats',Category::select('id' ,'name')->get());
            $view->with('sett',Setting::select('logo' ,'favicon')->first());
        });

        view()->composer('forent.inc.footer' , function($view){

            $view->with('sett',Setting::first());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
