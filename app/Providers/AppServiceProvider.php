<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->singleton('lang',function(){
            if(auth()->user())
            {
                if(empty(auth()->user()->lang)){
                    return 'en';
                }else{
                    return auth()->user()->lang;
                }
            }else{
                if(session()->has('lang')){
                    return session()->get('lang');
                }else{
                    return 'en';
                }
            }
        });
      Schema::defaultStringLength(191);   
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
