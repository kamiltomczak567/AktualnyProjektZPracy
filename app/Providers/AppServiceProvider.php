<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $settings = Setting::where('group', 'pageMeta')->get();
            $pageData = [];
            foreach($settings as $s) $pageData[$s->name] = $s->value;
            $view->with('pageData', $pageData);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
