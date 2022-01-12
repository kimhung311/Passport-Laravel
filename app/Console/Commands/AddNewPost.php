<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Str;


class AddNewPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:create {--count=} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Post Susscess';

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
            $title = Str::random(8);
            $content = Str::random(100);
            $description = Str::random(100);
            $image = Str::random(28);
            $image_detail = Str::random(28);
            $total_view = rand(0,100);
            $hot = rand(0,1);
            $category_id = rand(4,10);
            $author_id = rand(4, 10);
            $user_id = rand(4, 10);
            Post::create([
                'title' => $title,
                'content' => $content,
                'description' => $description,
                'image' => $image,
                'image_detail' => $image_detail,
                'total_view' => $total_view,
                'hot' => $hot,
                'category_id' => $category_id,
                'author_id' => $author_id,
                'user_id' => $user_id,

            ]);
            $bar->advance();
        }
        $bar->finish();
        $this->info('Successfully created ' . $count );  
    }
}