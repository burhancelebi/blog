<?php

namespace Celebi\Commands;

use Illuminate\Console\Command;
use File;

class BlogViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create blog views.';

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
        $views = ['create','edit','index'];
        
        foreach ( $views as $value ) {
            $path = "resources/views/admin/blog/".$value.'.blade.php';

            $this->createDir($path);
            
            File::put($path, file_get_contents(dirname(__DIR__)."\stubs\blogs\\$value.blade.stub"));

        }

        $path = "resources/views/blogs.blade.php";
        File::put($path, file_get_contents(dirname(__DIR__)."\stubs\blogs.stub"));
    }

    /**
     * Create view directory if not exists.
     *
     * @param $path
     */
    public function createDir($path)
    {
        $dir = dirname($path);

        if (!file_exists($dir))
        {
            mkdir($dir, 0777, true);
        }
    }
}
