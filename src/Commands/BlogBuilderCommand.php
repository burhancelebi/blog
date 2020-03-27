<?php

namespace Celebi\Commands;

use Illuminate\Console\Command;
use Artisan;

class BlogBuilderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:builder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a blog builder.';

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
        Artisan::call('blog:migration');
        $this->info("Blog migration is created.");
        
        Artisan::call('blog:route');
        $this->info("blog route is created.");
        
        Artisan::call('blog:views');
        $this->info("Blog views is created.");

        $this->info('Blog builder is completed');
    }
}
