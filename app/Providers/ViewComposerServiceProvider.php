<?php

namespace App\Providers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site.partials.nav', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });
        View::composer('site.partials.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });
    }
}
