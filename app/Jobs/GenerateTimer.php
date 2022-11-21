<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class GenerateTimer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = User::with('schedule')->find($user);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hour = \Carbon\Carbon::parse($this->user->schedule->end)
            ->diffInHours(\Carbon\Carbon::parse($this->user->schedule->start));
        $interval = floor($hour / $this->user->schedule->often);
        $timer = array();
    
        for ($i=1; $i <= $this->user->schedule->often; $i++) { 
            if ($i == 1) {
                $timer[] = \Carbon\Carbon::parse($this->user->schedule->start)->format('H:i');
            } else if ($i == $this->user->schedule->often) {
                $timer[] = \Carbon\Carbon::parse($this->user->schedule->end)->format('H:i');
            } else {
                if ($this->user->schedule->often == 3) {
                    $timer[] = \Carbon\Carbon::parse($this->user->schedule->start)
                        ->addHour($hour / 2)
                        ->format('H:i');
                } else {
                    $timer[] = \Carbon\Carbon::parse($this->user->schedule->start)
                        ->addHour($interval * $i)
                        ->format('H:i');
                }
            }
        }
    
        Schedule::where('id', $this->user->schedule->id)->update(['timer' => $timer]);
        Log::info('Job GenerateTimer Success ...');
    }
}
