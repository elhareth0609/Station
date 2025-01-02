<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // Load and share the menu data
        $menuJson1 = File::get(resource_path('menu/menu.json'));
        $menuJson2 = File::get(resource_path('menu/menu1.json'));
        $menu1 = json_decode($menuJson1, true);
        $menu2 = json_decode($menuJson2, true);

        $mergedSections = array_merge($menu1['sections'], $menu2['sections']);

        $mergedMenu = [
            'sections' => $mergedSections,
        ];

        View::share('menu', $menu1);
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
