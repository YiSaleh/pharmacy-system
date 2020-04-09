<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Notifications\UserNotLoggedIn;
use Illuminate\Support\Facades\DB;
class SendNotLoggedInEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users-not-logged-in-for-month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' sending email to users who not logged in for month ';

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
        $this->info('Searching for users ');

        // we sort all tokens of each  user to get the newest one 
        $users_tokens=DB::table('personal_access_tokens')->orderBy('last_used_at','desc')
        ->get()->groupBy('tokenable_id');
        
        // collect newest users tokens 
        $collection= collect([]);
        foreach ($users_tokens as $users_token) {
             $collection->push($users_token[0]);
        }

        $date = \Carbon\Carbon::today()->subDays(30);
        $tokenable_ids = $collection->where('last_used_at', '<=', $date)->pluck('tokenable_id');
        $users=User::whereIn('id',$tokenable_ids)->get();
        foreach ($users as $user) {
            $this->info('Now users are notifing ');
            $user->notify(new UserNotLoggedIn());

        }
        $this->info('Done! ');

    }
}
