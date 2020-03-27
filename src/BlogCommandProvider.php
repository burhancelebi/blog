<?php


namespace Celebi\Commands;

use Illuminate\Support\ServiceProvider;

class BlogCommandProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                // BlogControllerCommand::class,
                // BlogObserverCommand::class,
                // BlogRequestCommand::class,
                // BlogModelCommand::class,
                BlogRouteCommand::class,
                MakeViewCommand::class,
                BlogMigrationCommand::class,
                BlogBuilderCommand::class,
                BlogViewCommand::class,
            ]);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
