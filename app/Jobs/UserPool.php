<?php

namespace App\Jobs;

use App\Models\Way;
use App\Models\Area;
use App\Models\Feel;
use App\Models\Pool;
use App\Models\User;
use App\Models\Category;
use App\Models\CategoryWay;
use App\Models\CategoryArea;
use App\Models\CategoryFeel;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UserPool implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->user = User::with('feel','ways','areas')->find($id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $categories = Category::where('status', 2)->get();

        if (count($categories)) {
            foreach ($categories as $category) {
                $sumWay = 0;
                $sumArea = 0;

                $pool = new Pool;
                $pool->user_id = $this->user->id;
                $pool->category_id = $category->id;

                if ($this->user->feel) {
                    $cf = CategoryFeel::where('category_id', $category->id)
                        ->where('feel_id', $this->user->feel->id)
                        ->first();
                    if ($cf) {
                        $feel = Feel::find($cf->feel_id);
                        if ($feel) {
                            $pool->feel = $feel->percentage;
                        }
                    }
                }

                if (count($this->user->ways)) {
                    foreach ($this->user->ways as $item) {
                        $cw = CategoryWay::where('category_id', $category->id)
                            ->where('way_id', $item->id)
                            ->first();
                        if ($cw) {
                            $way = Way::find($cw->way_id);
                            if ($way) {
                                $sumWay += $way->percentage;
                            }
                        }
                    }
                    $pool->way = $sumWay / count($this->user->ways);
                }

                if (count($this->user->areas)) {
                    foreach ($this->user->areas as $item) {
                        $ca = CategoryArea::where('category_id', $category->id)
                            ->where('area_id', $item->id)
                            ->first();
                        if ($ca) {
                            $area = Area::find($ca->area_id);
                            if ($area) {
                                $sumArea += $area->percentage;
                            }
                        }
                    }
                    $pool->area = $sumArea / count($this->user->areas);
                }

                $pool->save();
                $pool->total = $pool->feel + $pool->way + $pool->area;
                $pool->update();
            }
        }

        Log::info('Job UserPool Success ...');
    }
}
