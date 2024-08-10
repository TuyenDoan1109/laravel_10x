<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Admin\AdminRepository;
use App\Repositories\Admin\AdminRepositoryInterface;

use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;

use App\Repositories\Province\ProvinceRepository;
use App\Repositories\Province\ProvinceRepositoryInterface;

use App\Repositories\District\DistrictRepository;
use App\Repositories\District\DistrictRepositoryInterface;

use App\Repositories\Ward\WardRepository;
use App\Repositories\Ward\WardRepositoryInterface;

use App\Repositories\GroupAdmin\GroupAdminRepository;
use App\Repositories\GroupAdmin\GroupAdminRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            AdminRepositoryInterface::class,
            AdminRepository::class
        );
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->singleton(
            ProvinceRepositoryInterface::class,
            ProvinceRepository::class
        );
        $this->app->singleton(
            DistrictRepositoryInterface::class,
            DistrictRepository::class
        );
        $this->app->singleton(
            WardRepositoryInterface::class,
            WardRepository::class
        );
        $this->app->singleton(
            GroupAdminRepositoryInterface::class,
            GroupAdminRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
