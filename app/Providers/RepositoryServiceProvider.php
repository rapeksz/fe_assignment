<?php

namespace App\Providers;

use App\Repositories\CommentRepository;
use App\Repositories\Eloquent\Comment;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    private static $repositories = [
        CommentRepository::class => Comment::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (self::$repositories as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

}
