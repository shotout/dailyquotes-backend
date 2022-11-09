<?php

namespace App\Jobs;

use App\Models\Area;
use App\Models\Way;
use App\Models\Feel;
use App\Models\Percentage;
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

class UpdatePool implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $flag;
    private $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($flag, $id)
    {
        $this->flag = $flag;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $percentage = Percentage::where('flag', $this->flag)->first();

        if ($this->flag == 'feel') {
            $total = CategoryFeel::where('feel_id', $this->id)->count();

            $feel = Feel::find($this->id);
            if ($feel && $percentage) {
                $feel->percentage = $percentage->value / $total;
                $feel->update();
            }
        }

        if ($this->flag == 'way') {
            $total = CategoryWay::where('way_id', $this->id)->count();

            $way = Way::find($this->id);
            if ($way && $percentage) {
                $way->percentage = $percentage->value / $total;
                $way->update();
            }
        }

        if ($this->flag == 'area') {
            $total = CategoryArea::where('area_id', $this->id)->count();

            $area = Area::find($this->id);
            if ($area && $percentage) {
                $area->percentage = $percentage->value / $total;
                $area->update();
            }
        }

        Log::info('Job UpdatePool Success ...');
    }
}
