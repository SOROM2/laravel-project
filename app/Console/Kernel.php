<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SiteUsage;
use App\User;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // daily site usage emails
        $schedule->call(function() {
            $date = \Carbon\Carbon::today()->subDays(7);                // get the date from a week ago
            $users = User::where('last_updated', '<=', $date)->get();   // get the users with last updated values older than a week ago (null is opt-out)
            foreach ($users as $user) {
                if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {  // filter valid emails ==(this needs to be fixed with the register and profile email validation)==
                    $user->notify(new SiteUsage());                     // send a site usage email to each of those users.
                }
            }
        })->dailyAt('10:00');   // every day at 10am local time.

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
