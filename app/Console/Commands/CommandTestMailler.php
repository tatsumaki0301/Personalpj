<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailler;
use App\Models\User;
use Carbon\Carbon;

class CommandTestMailler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mailler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'mailler test';

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
        $users = User::get();
        foreach($users as $user){
            Mail::to($user->email)->send(new Mailler($user));
        }
    }
}
