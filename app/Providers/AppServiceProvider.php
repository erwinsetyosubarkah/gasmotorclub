<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ArtikelRepository;
use App\Repositories\Admin\AdminPostRepository;
use App\Repositories\Contracts\ArtikelRepositoryInterface;
use App\Repositories\Contracts\Admin\AdminPostRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ArtikelRepositoryInterface::class, ArtikelRepository::class);

        // Admin
        $this->app->bind(AdminPostRepositoryInterface::class, AdminPostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Gate::define('admin',function(User $user){
            return $user->level === 'admin';
        });
    }
}
