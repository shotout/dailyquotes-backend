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
            $table->bigInteger('way_id')->nullable();
            $table->timestamps();
        });

        DB::table('category_ways')->insert([
            // love
            ["category_id" => 15, "way_id" => 1, "created_at" => now()],
            ["category_id" => 15, "way_id" => 2, "created_at" => now()],
            ["category_id" => 15, "way_id" => 4, "created_at" => now()],
            ["category_id" => 15, "way_id" => 5, "created_at" => now()],
            ["category_id" => 15, "way_id" => 6, "created_at" => now()],

            // friendship
            ["category_id" => 16, "way_id" => 1, "created_at" => now()],
            ["category_id" => 16, "way_id" => 2, "created_at" => now()],
            ["category_id" => 16, "way_id" => 5, "created_at" => now()],
            ["category_id" => 16, "way_id" => 6, "created_at" => now()],

            // health
            ["category_id" => 27, "way_id" => 1, "created_at" => now()],
            ["category_id" => 27, "way_id" => 2, "created_at" => now()],
            ["category_id" => 27, "way_id" => 4, "created_at" => now()],
            ["category_id" => 27, "way_id" => 5, "created_at" => now()],
            ["category_id" => 27, "way_id" => 6, "created_at" => now()],

            // career
            ["category_id" => 24, "way_id" => 3, "created_at" => now()],
            ["category_id" => 24, "way_id" => 6, "created_at" => now()],

            // wellness
            ["category_id" => 25, "way_id" => 4, "created_at" => now()],
            ["category_id" => 25, "way_id" => 6, "created_at" => now()],

            // education
            ["category_id" => 22, "way_id" => 3, "created_at" => now()],
            ["category_id" => 22, "way_id" => 6, "created_at" => now()],

            // mindfulness
            ["category_id" => 29, "way_id" => 1, "created_at" => now()],
            ["category_id" => 29, "way_id" => 2, "created_at" => now()],
            ["category_id" => 29, "way_id" => 4, "created_at" => now()],
            ["category_id" => 29, "way_id" => 5, "created_at" => now()],
            ["category_id" => 29, "way_id" => 6, "created_at" => now()],

            // family
            ["category_id" => 17, "way_id" => 1, "created_at" => now()],
            ["category_id" => 17, "way_id" => 2, "created_at" => now()],
            ["category_id" => 17, "way_id" => 4, "created_at" => now()],
            ["category_id" => 17, "way_id" => 5, "created_at" => now()],
            ["category_id" => 17, "way_id" => 6, "created_at" => now()],

            // stress
            ["category_id" => 3, "way_id" => 3, "created_at" => now()],
            ["category_id" => 3, "way_id" => 4, "created_at" => now()],
            ["category_id" => 3, "way_id" => 6, "created_at" => now()],

            // anxiety
            ["category_id" => 4, "way_id" => 3, "created_at" => now()],
            ["category_id" => 4, "way_id" => 6, "created_at" => now()],

            // personal growth
            ["category_id" => 9, "way_id" => 3, "created_at" => now()],
            ["category_id" => 9, "way_id" => 6, "created_at" => now()],

            // positive thinking
            ["category_id" => 7, "way_id" => 1, "created_at" => now()],
            ["category_id" => 7, "way_id" => 2, "created_at" => now()],
            ["category_id" => 7, "way_id" => 4, "created_at" => now()],
            ["category_id" => 7, "way_id" => 5, "created_at" => now()],
            ["category_id" => 7, "way_id" => 6, "created_at" => now()],

            // happiness
            ["category_id" => 8, "way_id" => 1, "created_at" => now()],
            ["category_id" => 8, "way_id" => 2, "created_at" => now()],
            ["category_id" => 8, "way_id" => 4, "created_at" => now()],
            ["category_id" => 8, "way_id" => 5, "created_at" => now()],
            ["category_id" => 8, "way_id" => 6, "created_at" => now()],

            // beauty
            ["category_id" => 26, "way_id" => 4, "created_at" => now()],
            ["category_id" => 26, "way_id" => 5, "created_at" => now()],
            ["category_id" => 26, "way_id" => 6, "created_at" => now()],

            // attitude
            ["category_id" => 10, "way_id" => 1, "created_at" => now()],
            ["category_id" => 10, "way_id" => 2, "created_at" => now()],
            ["category_id" => 10, "way_id" => 3, "created_at" => now()],
            ["category_id" => 10, "way_id" => 4, "created_at" => now()],
            ["category_id" => 10, "way_id" => 5, "created_at" => now()],
            ["category_id" => 10, "way_id" => 6, "created_at" => now()],

            // creativity
            ["category_id" => 23, "way_id" => 6, "created_at" => now()],

            // travel
            ["category_id" => 13, "way_id" => 6, "created_at" => now()],

            // imagination
            ["category_id" => 31, "way_id" => 6, "created_at" => now()],

            // relationship
            ["category_id" => 14, "way_id" => 1, "created_at" => now()],
            ["category_id" => 14, "way_id" => 2, "created_at" => now()],
            ["category_id" => 14, "way_id" => 5, "created_at" => now()],
            ["category_id" => 14, "way_id" => 6, "created_at" => now()],

            // Dreams & Spirituality
            ["category_id" => 28, "way_id" => 6, "created_at" => now()],

            // business
            ["category_id" => 20, "way_id" => 3, "created_at" => now()],
            ["category_id" => 20, "way_id" => 6, "created_at" => now()],

            // letting go
            ["category_id" => 5, "way_id" => 1, "created_at" => now()],
            ["category_id" => 5, "way_id" => 2, "created_at" => now()],
            ["category_id" => 5, "way_id" => 5, "created_at" => now()],
            ["category_id" => 5, "way_id" => 6, "created_at" => now()],

            // hard times
            ["category_id" => 6, "way_id" => 6, "created_at" => now()],

            // dating
            ["category_id" => 18, "way_id" => 6, "created_at" => now()],

            // cool
            ["category_id" => 11, "way_id" => 3, "created_at" => now()],
            ["category_id" => 11, "way_id" => 6, "created_at" => now()],

            // being alone
            ["category_id" => 12, "way_id" => 1, "created_at" => now()],
            ["category_id" => 12, "way_id" => 2, "created_at" => now()],
            ["category_id" => 12, "way_id" => 5, "created_at" => now()],
            ["category_id" => 12, "way_id" => 6, "created_at" => now()],

            // wisdom
            ["category_id" => 30, "way_id" => 6, "created_at" => now()],

            // success
            ["category_id" => 21, "way_id" => 3, "created_at" => now()],
            ["category_id" => 21, "way_id" => 6, "created_at" => now()],

            // freedom
            ["category_id" => 32, "way_id" => 3, "created_at" => now()],
            ["category_id" => 32, "way_id" => 4, "created_at" => now()],
            ["category_id" => 32, "way_id" => 6, "created_at" => now()],

            // leadership
            ["category_id" => 19, "way_id" => 3, "created_at" => now()],
            ["category_id" => 19, "way_id" => 6, "created_at" => now()],
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
