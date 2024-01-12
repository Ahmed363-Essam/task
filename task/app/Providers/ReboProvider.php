<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Admin\AdminAuthInterface;
use App\Repositories\Admin\AdminAuthRepositories;

use App\Interfaces\Admin\CategoryInterface;
use App\Repositories\Admin\CategoryRepository;


use App\Interfaces\Admin\ProductInterface;
use App\Repositories\Admin\ProductRepository;

class ReboProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(AdminAuthInterface::class, AdminAuthRepositories::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
