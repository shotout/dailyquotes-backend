<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryWaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_ways', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('feel_id')->nullable();
            $table->timestamps();
        });

        DB::table('category_ways')->insert([
            // love
            ["category_id" => 16, "feel_id" => 1, "created_at" => now()],
            ["category_id" => 16, "feel_id" => 2, "created_at" => now()],
            ["category_id" => 16, "feel_id" => 4, "created_at" => now()],
            ["category_id" => 16, "feel_id" => 5, "created_at" => now()],
            ["category_id" => 16, "feel_id" => 6, "created_at" => now()],

            // friendship
            ["category_id" => 17, "feel_id" => 1, "created_at" => now()],
            ["category_id" => 17, "feel_id" => 2, "created_at" => now()],
            ["category_id" => 17, "feel_id" => 5, "created_at" => now()],
            ["category_id" => 17, "feel_id" => 6, "created_at" => now()],

            // health
            ["category_id" => 29, "feel_id" => 1, "created_at" => now()],
            ["category_id" => 29, "feel_id" => 2, "created_at" => now()],
            ["category_id" => 29, "feel_id" => 4, "created_at" => now()],
            ["category_id" => 29, "feel_id" => 5, "created_at" => now()],
            ["category_id" => 29, "feel_id" => 6, "created_at" => now()],

            // career
            ["category_id" => 24, "feel_id" => 3, "created_at" => now()],
            ["category_id" => 24, "feel_id" => 6, "created_at" => now()],

            // wellness
            ["category_id" => 26, "feel_id" => 4, "created_at" => now()],
            ["category_id" => 26, "feel_id" => 6, "created_at" => now()],

            // education
            ["category_id" => 21, "feel_id" => 3, "created_at" => now()],
            ["category_id" => 21, "feel_id" => 6, "created_at" => now()],

            // mindfulness
            ["category_id" => 31, "feel_id" => 1, "created_at" => now()],
            ["category_id" => 31, "feel_id" => 2, "created_at" => now()],
            ["category_id" => 31, "feel_id" => 4, "created_at" => now()],
            ["category_id" => 31, "feel_id" => 5, "created_at" => now()],
            ["category_id" => 31, "feel_id" => 6, "created_at" => now()],

            // loving my self
            ["category_id" => 10, "feel_id" => 1, "created_at" => now()],
            ["category_id" => 10, "feel_id" => 2, "created_at" => now()],
            ["category_id" => 10, "feel_id" => 4, "created_at" => now()],
            ["category_id" => 10, "feel_id" => 5, "created_at" => now()],
            ["category_id" => 10, "feel_id" => 6, "created_at" => now()],

            // stress
            ["category_id" => 3, "feel_id" => 3, "created_at" => now()],
            ["category_id" => 3, "feel_id" => 4, "created_at" => now()],
            ["category_id" => 3, "feel_id" => 6, "created_at" => now()],

            // anxiety
            ["category_id" => 4, "feel_id" => 3, "created_at" => now()],
            ["category_id" => 4, "feel_id" => 6, "created_at" => now()],

            // personal growth
            ["category_id" => 9, "feel_id" => 3, "created_at" => now()],
            ["category_id" => 9, "feel_id" => 6, "created_at" => now()],

            // positive thinking
            ["category_id" => 7, "feel_id" => 1, "created_at" => now()],
            ["category_id" => 7, "feel_id" => 2, "created_at" => now()],
            ["category_id" => 7, "feel_id" => 4, "created_at" => now()],
            ["category_id" => 7, "feel_id" => 5, "created_at" => now()],
            ["category_id" => 7, "feel_id" => 6, "created_at" => now()],

            // happiness
            ["category_id" => 8, "feel_id" => 1, "created_at" => now()],
            ["category_id" => 8, "feel_id" => 2, "created_at" => now()],
            ["category_id" => 8, "feel_id" => 4, "created_at" => now()],
            ["category_id" => 8, "feel_id" => 5, "created_at" => now()],
            ["category_id" => 8, "feel_id" => 6, "created_at" => now()],

            // loving my body
            ["category_id" => 28, "feel_id" => 6, "created_at" => now()],

            // being thankful
            ["category_id" => 11, "feel_id" => 1, "created_at" => now()],
            ["category_id" => 11, "feel_id" => 2, "created_at" => now()],
            ["category_id" => 11, "feel_id" => 5, "created_at" => now()],
            ["category_id" => 11, "feel_id" => 6, "created_at" => now()],

            // creativity
            ["category_id" => 22, "feel_id" => 6, "created_at" => now()],

            // travel
            ["category_id" => 13, "feel_id" => 6, "created_at" => now()],

            // inspiration
            ["category_id" => 23, "feel_id" => 6, "created_at" => now()],

            // relationship
            ["category_id" => 15, "feel_id" => 1, "created_at" => now()],
            ["category_id" => 15, "feel_id" => 2, "created_at" => now()],
            ["category_id" => 15, "feel_id" => 5, "created_at" => now()],
            ["category_id" => 15, "feel_id" => 6, "created_at" => now()],

            // Faith & Spirituality
            ["category_id" => 30, "feel_id" => 6, "created_at" => now()],

            // productivity
            ["category_id" => 19, "feel_id" => 3, "created_at" => now()],
            ["category_id" => 19, "feel_id" => 6, "created_at" => now()],

            // letting go
            ["category_id" => 5, "feel_id" => 1, "created_at" => now()],
            ["category_id" => 5, "feel_id" => 2, "created_at" => now()],
            ["category_id" => 5, "feel_id" => 5, "created_at" => now()],
            ["category_id" => 5, "feel_id" => 6, "created_at" => now()],

            // hard times
            ["category_id" => 6, "feel_id" => 6, "created_at" => now()],

            // nature
            ["category_id" => 14, "feel_id" => 6, "created_at" => now()],

            // exercise
            ["category_id" => 27, "feel_id" => 6, "created_at" => now()],

            // being alone
            ["category_id" => 12, "feel_id" => 1, "created_at" => now()],
            ["category_id" => 12, "feel_id" => 2, "created_at" => now()],
            ["category_id" => 12, "feel_id" => 5, "created_at" => now()],
            ["category_id" => 12, "feel_id" => 6, "created_at" => now()],

            // wisdom
            ["category_id" => 32, "feel_id" => 6, "created_at" => now()],

            // success
            ["category_id" => 20, "feel_id" => 3, "created_at" => now()],
            ["category_id" => 20, "feel_id" => 6, "created_at" => now()],

            // reading
            ["category_id" => 25, "feel_id" => 6, "created_at" => now()],

            // leadership
            ["category_id" => 18, "feel_id" => 3, "created_at" => now()],
            ["category_id" => 18, "feel_id" => 6, "created_at" => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_ways');
    }
}
