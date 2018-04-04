<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Mail;
use Log;

use App\Mail\HappyBirthday;

class CheckBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CheckBirthday:CheckBirthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check birthday everyday at 00:00';

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
        $user=User::find(1);
        Mail::to($user->email)->send(new HappyBirthday($user->name));
        Log::info("Email sent to". $user->email);
    }
}
