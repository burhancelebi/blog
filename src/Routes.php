<?php

namespace Celebi\Commands;

use Illuminate\Support\Facades\Route;

class Routes
{
    public static function routes()
    {
        Route::group(['prefix' => 'bpanel','namespace' => '\Celebi\Commands\Controllers'],function(){

            Route::resource('blogs','BlogController')->middleware('auth');
            
        });

        Route::group(['namespace' => '\Celebi\Commands\Controllers'],function(){

            Route::get('articles','ArticleController@index')->name('articles');

        });

    }
}