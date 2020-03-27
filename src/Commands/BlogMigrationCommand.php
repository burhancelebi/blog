<?php

namespace Celebi\Commands;

use Illuminate\Console\Command;
use File;
use Artisan;

class BlogMigrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create blog migration.';

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
        $time = date('Y_m_d_His');
        $path = "database/migrations/".$time."_create_blogs_table.php";

        $this->createDir($path);

        
        File::put($path , file_get_contents(dirname(__DIR__).'\stubs\migration.stub'));
        
        Artisan::call("migrate --path=$path");
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
