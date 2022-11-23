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
        $minutes = \Carbon\Carbon::parse($this->user->schedule->end)
            ->diffInMinutes(\Carbon\Carbon::parse($this->user->schedule->start));
        $range = $minutes / 30;
        $interval = floor($range / $this->user->schedule->often);
        $timer = array();
    
        for ($i=1; $i <= $this->user->schedule->often; $i++) { 
            if ($i == 1) {
                $timer[] = \Carbon\Carbon::parse($this->user->schedule->start)->format('H:i');
            } else if ($i == $this->user->schedule->often) {
                $timer[] = \Carbon\Carbon::parse($this->user->schedule->end)->format('H:i');
            } else {
                if ($this->user->schedule->often == 3) {
                    $timer[] = \Carbon\Carbon::parse($this->user->schedule->start)
                        ->addMinutes(($range / 2) * 30)
                        ->format('H:i');
                } else {
                    $timer[] = \Carbon\Carbon::parse($this->user->schedule->start)
                        ->addMinutes(($interval * 30) * $i)
                        ->format('H:i');
                }
            }
        }
    
        Schedule::where('id', $this->user->schedule->id)->update(['timer' => $timer]);
        Log::info('Job GenerateTimer Success ...');
    }
}
