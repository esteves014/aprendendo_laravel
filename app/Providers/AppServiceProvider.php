<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Categoria;

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
        $categoriasMenu = Categoria::all();
        view()->share('categoriasMenu', $categoriasMenu);

        View::composer('site.layout', function ($view) {
            $view->with('cart', session()->get('cart', []));
        });
    }
}
