<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Pagination\Paginator::useBootstrapFive();

        \Illuminate\Support\Facades\View::composer('components.layouts.app', function ($view) {
            $view->with('menus', \App\Models\Menu::where('parent_id', null)
                ->where('is_active', true)
                ->orderBy('order')
                ->with(['children' => function($query) {
                    $query->where('is_active', true)->orderBy('order')->with(['children' => function($q) {
                        $q->where('is_active', true)->orderBy('order');
                    }]);
                }])
                ->get());
        });
    }
}
