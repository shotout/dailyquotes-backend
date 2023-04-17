<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Quote;
use App\Models\Schedule;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class QuoteNotif implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $quote = Quote::where('has_notif', false)
            ->orderBy('order', 'asc')
            ->first();

        // Log::info($quote);

        if ($quote) {
            // User::whereNotNull('fcm_token')->increment('notif_count', 1);
            $users = User::with('schedule','subscription')->whereNotNull('fcm_token')->get();
          
            $SERVER_API_KEY = env('FIREBASE_SERVER_API_KEY');

            $desc = strip_tags($quote->title);
            $filterDesc = html_entity_decode($desc);
            $descShort = substr($filterDesc, 0, 100);

            foreach ($users as $user) {
                if ($user->subscription->plan_id != 5 || $user->subscription->type != 5) {
                    if ($user->schedule->counter_notif < $user->schedule->often) {
                        if ($user->schedule->timezone && now()->setTimezone($user->schedule->timezone)->format('H:i:s') >= $user->schedule->start && now()->setTimezone($user->schedule->timezone)->format('H:i:s') <= Carbon::parse($user->schedule->end)->addMinute(10)->format('H:i:s')) {
                            if ($user->schedule->timer) {
                                if (in_array(now()->setTimezone($user->schedule->timezone)->format('H:i'), $user->schedule->timer)) {

                                    // \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('H:i:s');
                                    Log::info('ada ...');

                                    $data = [
                                        "to" => $user->fcm_token,
                                        "data" => [
                                            "id" => $quote->id,
                                        ],
                                        "notification" => [
                                            "title" => $quote->author,
                                            "body" => $descShort,  
                                            "icon" => 'https://backend-mooti.walletads.io/assets/logos/logo.jpg',
                                            // "image" => 'https://backend.nftdaily.app/image.png',
                                            "sound" => "circle.mp3",
                                            "badge" => $user->notif_count + 1
                                        ]
                                    ];
                        
                                    // Log::info($data);
                        
                                    $dataString = json_encode($data);
                                
                                    $headers = [
                                        'Authorization: key=' . $SERVER_API_KEY,
                                        'Content-Type: application/json',
                                    ];
                                
                                    $ch = curl_init();
                            
                                    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                                    curl_setopt($ch, CURLOPT_POST, true);
                                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                                        
                                    $response = curl_exec($ch);
                                    Log::info($response);

                                    // update user schedule
                                    $schedule = Schedule::find($user->schedule->id);
                                    if ($schedule) {
                                        $schedule->counter_notif++;
                                        $schedule->update();
                                    }

                                    // update user
                                    $user->notif_count++;
                                    $user->update();
                                    
                                }
                            }
                        }
                    } else {
                        // reset schedule counter
                        if ($user->schedule->timezone && now()->setTimezone($user->schedule->timezone)->format('H:i:s') >= '00:00:00' && now()->setTimezone($user->schedule->timezone)->format('H:i:s') <= '01:00:00') {
                            $schedule = Schedule::find($user->schedule->id);
                            if ($schedule) {
                                $schedule->counter_notif = 0;
                                $schedule->update();
                            }
                        }
                    }
                } else {
                    if ($user->limit == 1) {
                        if ($user->schedule->counter_notif < $user->schedule->often) {
                            if ($user->schedule->timezone && now()->setTimezone($user->schedule->timezone)->format('H:i:s') >= $user->schedule->start && now()->setTimezone($user->schedule->timezone)->format('H:i:s') <= Carbon::parse($user->schedule->end)->addMinute(10)->format('H:i:s')) {
                                if ($user->schedule->timer) {
                                    if (in_array(now()->setTimezone($user->schedule->timezone)->format('H:i'), $user->schedule->timer)) {
    
                                        Log::info('ada ...');
    
                                        $data = [
                                            "to" => $user->fcm_token,
                                            "data" => [
                                                "id" => $quote->id,
                                            ],
                                            "notification" => [
                                                "title" => "A new Affirmation is waiting for you",
                                                "body" => "Click here to get inspired All additional pushes open full screen rewarded ad",  
                                                "icon" => 'https://backend-mooti.walletads.io/assets/logos/logo.jpg',
                                                // "image" => 'https://backend.nftdaily.app/image.png',
                                                "sound" => "circle.mp3",
                                                "badge" => $user->notif_count + 1
                                            ]
                                        ];
                            
                                        // Log::info($data);
                            
                                        $dataString = json_encode($data);
                                    
                                        $headers = [
                                            'Authorization: key=' . $SERVER_API_KEY,
                                            'Content-Type: application/json',
                                        ];
                                    
                                        $ch = curl_init();
                                
                                        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                                        curl_setopt($ch, CURLOPT_POST, true);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                                            
                                        $response = curl_exec($ch);
                                        Log::info($response);
    
                                        // update user schedule
                                        $schedule = Schedule::find($user->schedule->id);
                                        if ($schedule) {
                                            $schedule->counter_notif++;
                                            $schedule->update();
                                        }
    
                                        // update user
                                        $user->notif_count++;
                                        $user->update();
                                        
                                    }
                                }
                            }
                        } else {
                            // reset schedule counter
                            if ($user->schedule->timezone && now()->setTimezone($user->schedule->timezone)->format('H:i:s') >= '00:00:00' && now()->setTimezone($user->schedule->timezone)->format('H:i:s') <= '01:00:00') {
                                $schedule = Schedule::find($user->schedule->id);
                                if ($schedule) {
                                    $schedule->counter_notif = 0;
                                    $schedule->update();
                                }
                            }
                        }
                    }
                }
            }

            // update status
            $quote->has_notif = true;
            $quote->update();

            Log::info('Job QuoteNotif Success ...');
        } else {
            // reset has notif
            Quote::where('has_notif', true)->update(['has_notif' => false]);
        }
    }
}
