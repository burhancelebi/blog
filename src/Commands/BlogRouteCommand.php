<?php

namespace Celebi\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use File;

class BlogRouteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:route';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a blogs route.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ( !Route::has('blogs.store') ) {

            $path = "routes/web.php";

            File::append($path, file_get_contents(dirname(__DIR__).'\stubs\route.stub'));
        }
    }
}