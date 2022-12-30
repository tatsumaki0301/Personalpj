<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Person;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReserveMail;
use Carbon\Carbon;


class CommandTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'laravel commandのtest';

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
        $today = Carbon::today('Asia/Tokyo','9:00');
        $reserves = Reserve::wheredate('datetime', $today)->with('user')->get();
        foreach($reserves as $reserve){
            Mail::to($reserve->user->email)->send(new ReserveMail($reserve));
        }
    }
}
