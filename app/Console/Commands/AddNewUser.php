<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

// use App\Console\Commands\bycrypt;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {--count=} {--verified} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' Create a new user';

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
            $name = Str::random(8);
            $email = $name . '@gmail.com';
            $hashedPassword = Hash::make('password') ?? Str::random(10);
            $avatar = Str::random(18);
            $role_id = '3';
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'role_id' => $role_id,
                'avatar' => $avatar,
                'email_verified_at' => $this->options('verified') ? now() : null
            ]);
            $bar->advance();
        }
        $bar->finish();
        $this->info('Successfully created ' . $count . '   ' . $hashedPassword);
    }
}