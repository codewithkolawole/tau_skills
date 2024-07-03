<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Setting;

use Log;

class MyViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        view()->composer('*', function ($view) {
            $view->with('pageGlobalData', $this->pageGlobalData());
        });
    }

    /**
     * Bootstrap services.
     */
    public function pageGlobalData()
    {
        $setting = Setting::first();

        $data = new \stdClass();
        $data->setting = $setting;

        return $data;
    }
}
