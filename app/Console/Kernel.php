<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // broadcast notif quote
        $schedule->job((new \App\Jobs\QuoteNotif)->onQueue(env('SUPERVISOR')))->everyTwoMinutes();

        // broadcast notif ads
        $schedule->job((new \App\Jobs\AdsNotif)->onQueue(env('SUPERVISOR')))->everyTenMinutes()

        // reset counter notif
        // $schedule->job((new \App\Jobs\ResetNotif)->onQueue(env('SUPERVISOR')))->dailyAt('00:00');
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
