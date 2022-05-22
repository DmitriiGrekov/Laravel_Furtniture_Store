<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CatalogCategory;
use App\Models\NewsCategory;

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
        $catalog_category = CatalogCategory::all();
        $news_category = NewsCategory::all();
        view()->share('catalog_categories', $catalog_category);
        view()->share('news_category', $news_category);

    }
}
