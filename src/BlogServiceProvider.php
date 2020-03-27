<?php

namespace Celebi\Commands;

use Illuminate\Support\ServiceProvider;
use Celebi\Commands\Models\Blog;
use Celebi\Commands\Observers\BlogObserver;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('blog-routes', function(){
            return new Routes();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blog::observe( new BlogObserver() );

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }
}
