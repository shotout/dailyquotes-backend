<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_areas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('area_id')->nullable();
            $table->timestamps();
        });

        DB::table('category_areas')->insert([
            // love
            ["category_id" => 16, "area_id" => 2, "created_at" => now()],
            ["category_id" => 16, "area_id" => 4, "created_at" => now()],
            ["category_id" => 16, "area_id" => 5, "created_at" => now()],
            ["category_id" => 16, "area_id" => 7, "created_at" => now()],

            // friendship
            ["category_id" => 17, "area_id" => 2, "created_at" => now()],
            ["category_id" => 17, "area_id" => 4, "created_at" => now()],
            ["category_id" => 17, "area_id" => 5, "created_at" => now()],
            ["category_id" => 17, "area_id" => 7, "created_at" => now()],

            // health
            ["category_id" => 29, "area_id" => 2, "created_at" => now()],
            ["category_id" => 29, "area_id" => 5, "created_at" => now()],
            ["category_id" => 29, "area_id" => 6, "created_at" => now()],

            // career
            ["category_id" => 24, "area_id" => 1, "created_at" => now()],
            ["category_id" => 24, "area_id" => 8, "created_at" => now()],

            // wellness
            ["category_id" => 26, "area_id" => 2, "created_at" => now()],
            ["category_id" => 26, "area_id" => 6, "created_at" => now()],

            // education
            ["category_id" => 21, "area_id" => 1, "created_at" => now()],

            // mindfulness
            ["category_id" => 31, "area_id" => 2, "created_at" => now()],
            ["category_id" => 31, "area_id" => 3, "created_at" => now()],
            ["category_id" => 31, "area_id" => 4, "created_at" => now()],
            ["category_id" => 31, "area_id" => 5, "created_at" => now()],
            ["category_id" => 31, "area_id" => 6, "created_at" => now()],
            ["category_id" => 31, "area_id" => 7, "created_at" => now()],
            ["category_id" => 31, "area_id" => 8, "created_at" => now()],

            // loving my self
            ["category_id" => 10, "area_id" => 2, "created_at" => now()],
            ["category_id" => 10, "area_id" => 3, "created_at" => now()],
            ["category_id" => 10, "area_id" => 4, "created_at" => now()],
            ["category_id" => 10, "area_id" => 5, "created_at" => now()],
            ["category_id" => 10, "area_id" => 7, "created_at" => now()],

            // stress
            ["category_id" => 3, "area_id" => 4, "created_at" => now()],

            // anxiety
            ["category_id" => 4, "area_id" => 4, "created_at" => now()],

            // personal growth
            ["category_id" => 9, "area_id" => 1, "created_at" => now()],
            ["category_id" => 9, "area_id" => 2, "created_at" => now()],
            ["category_id" => 9, "area_id" => 6, "created_at" => now()],
            ["category_id" => 9, "area_id" => 7, "created_at" => now()],
            ["category_id" => 9, "area_id" => 8, "created_at" => now()],

            // positive thinking
            ["category_id" => 7, "area_id" => 1, "created_at" => now()],
            ["category_id" => 7, "area_id" => 2, "created_at" => now()],
            ["category_id" => 7, "area_id" => 3, "created_at" => now()],
            ["category_id" => 7, "area_id" => 4, "created_at" => now()],
            ["category_id" => 7, "area_id" => 5, "created_at" => now()],
            ["category_id" => 7, "area_id" => 7, "created_at" => now()],
            ["category_id" => 7, "area_id" => 8, "created_at" => now()],

            // happiness
            ["category_id" => 8, "area_id" => 2, "created_at" => now()],
            ["category_id" => 8, "area_id" => 3, "created_at" => now()],
            ["category_id" => 8, "area_id" => 5, "created_at" => now()],
            ["category_id" => 8, "area_id" => 7, "created_at" => now()],

            // loving my body
            ["category_id" => 28, "area_id" => 6, "created_at" => now()],
            ["category_id" => 28, "area_id" => 7, "created_at" => now()],

            // being thankful
            ["category_id" => 11, "area_id" => 2, "created_at" => now()],
            ["category_id" => 11, "area_id" => 5, "created_at" => now()],

            // creativity
            ["category_id" => 22, "area_id" => 2, "created_at" => now()],
            ["category_id" => 22, "area_id" => 3, "created_at" => now()],

            // travel
            ["category_id" => 13, "area_id" => 2, "created_at" => now()],
            ["category_id" => 13, "area_id" => 3, "created_at" => now()],

            // inspiration
            ["category_id" => 23, "area_id" => 1, "created_at" => now()],
            ["category_id" => 23, "area_id" => 2, "created_at" => now()],
            ["category_id" => 23, "area_id" => 3, "created_at" => now()],
            ["category_id" => 23, "area_id" => 7, "created_at" => now()],

            // relationship
            ["category_id" => 15, "area_id" => 5, "created_at" => now()],
            ["category_id" => 15, "area_id" => 7, "created_at" => now()],

            // Faith & Spirituality
            ["category_id" => 30, "area_id" => 2, "created_at" => now()],
            ["category_id" => 30, "area_id" => 3, "created_at" => now()],
            ["category_id" => 30, "area_id" => 7, "created_at" => now()],

            // productivity
            ["category_id" => 19, "area_id" => 1, "created_at" => now()],
            ["category_id" => 19, "area_id" => 6, "created_at" => now()],
            ["category_id" => 19, "area_id" => 8, "created_at" => now()],

            // letting go
            ["category_id" => 5, "area_id" => 5, "created_at" => now()],

            // hard times
            ["category_id" => 6, "area_id" => 2, "created_at" => now()],

            // nature
            ["category_id" => 14, "area_id" => 2, "created_at" => now()],
            ["category_id" => 14, "area_id" => 3, "created_at" => now()],

            // exercise
            ["category_id" => 27, "area_id" => 1, "created_at" => now()],
            ["category_id" => 27, "area_id" => 6, "created_at" => now()],

            // being alone
            ["category_id" => 12, "area_id" => 4, "created_at" => now()],
            ["category_id" => 12, "area_id" => 5, "created_at" => now()],

            // wisdom
            ["category_id" => 32, "area_id" => 1, "created_at" => now()],
            ["category_id" => 32, "area_id" => 2, "created_at" => now()],
            ["category_id" => 32, "area_id" => 3, "created_at" => now()],
            ["category_id" => 32, "area_id" => 7, "created_at" => now()],
            ["category_id" => 32, "area_id" => 8, "created_at" => now()],

            // success
            ["category_id" => 20, "area_id" => 1, "created_at" => now()],
            ["category_id" => 20, "area_id" => 2, "created_at" => now()],
            ["category_id" => 20, "area_id" => 6, "created_at" => now()],
            ["category_id" => 20, "area_id" => 8, "created_at" => now()],

            // reading
            ["category_id" => 25, "area_id" => 1, "created_at" => now()],
            ["category_id" => 25, "area_id" => 3, "created_at" => now()],
            ["category_id" => 25, "area_id" => 8, "created_at" => now()],

            // leadership
            ["category_id" => 18, "area_id" => 1, "created_at" => now()],
            ["category_id" => 18, "area_id" => 6, "created_at" => now()],
            ["category_id" => 18, "area_id" => 8, "created_at" => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_areas');
    }
}
