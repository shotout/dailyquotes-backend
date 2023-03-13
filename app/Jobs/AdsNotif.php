<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Message;
use App\Models\UserMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AdsNotif implements ShouldQueue
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
        $users = User::with('schedule')->where('status', 2)->get();

        foreach ($users as $user) {
            $time = now()->setTimezone($user->schedule->timezone);

            $ums = UserMessage::where('user_id', $user->id)
                ->where('has_notif', false)
                ->whereDate('time', $time)
                ->whereTime('time', '<=', $time)
                ->get();

            foreach ($ums as $um) {
                $message = Message::find($um->message_id);
                if ($message) {
                    
                    $datas = array(
                        "user_name" => $user->name,
                        "selected_goal" => "area1, area2, area3"
                    );

                    foreach ($datas as $key => $val) {
                        $descShort = str_replace('['.$key.']', $val, $message->push_text);
                    }

                    $data = [
                        "to" => $user->fcm_token,
                        "data" => (object) array(
                            "type" => "paywall",
                            "placement" => "placement-type"
                        ),
                        "notification" => [
                            "title" => "Mooti App",
                            "body" => $descShort,  
                            "icon" => 'https://backend-mooti.walletads.io/assets/logos/logo.jpg',
                            "sound" => "circle.mp3",
                            "badge" => $user->notif_count + 1
                        ]
                    ];
        
                    Log::info($data);
        
                    $dataString = json_encode($data);
                
                    $headers = [
                        'Authorization: key=' . env('FIREBASE_SERVER_API_KEY'),
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

                    $um->has_notif = true;
                    $um->update();
                }
            }
        }

        Log::info('Job AdsNotif Success ...');
    }   
}
