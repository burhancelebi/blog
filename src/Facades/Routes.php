<?php

namespace Celebi\Commands\Facades;

use Illuminate\Support\Facades\Facade;

class Routes extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'blog-routes';
    }
}