<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        //menu
        $frontmenu = [
            '/' => 'Home'
        ];
        $pages = Page::all();
        foreach($pages as $page){
            $frontmenu[$page['slug']] = $page['title'];
        }


        View::share('front_menu', $frontmenu);
        //conf
        $config = [];
        $settings = Setting::all();
        foreach($settings as $setting){
            $config[$setting['nome'] ] = $setting['content'];
        }
        view()->share('front_config', $config);
    }
}
