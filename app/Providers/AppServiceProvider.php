<?php

namespace App\Providers;

use App\Services\Comment\CommentManager;
use App\Services\Comment\CommentManagerContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @var array|string[]
     */
    private static $services = [
        CommentManagerContract::class => CommentManager::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function registerServices(): void
    {
        foreach (self::$services as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }
}
