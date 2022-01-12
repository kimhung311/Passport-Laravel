<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use Illuminate\Support\Str;


class AddNewCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'categories:create {--count=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $count = $this->option('count');
        $bar = $this->output->createProgressBar($count);
        $bar->start();
        for ($i = 1; $i <= $count; $i++) {
            $category_name = Str::random(8);
            $parent_id = rand(1, 10);
            $user_id = rand(1,10);

            Category::create([
                'category_name' => $category_name,
                'parent_id' => $parent_id,
                'user_id' => $user_id,
            ]);
            $bar->advance();
        }
        $bar->finish();
        $this->info('Successfully created ' . $count );    }
}