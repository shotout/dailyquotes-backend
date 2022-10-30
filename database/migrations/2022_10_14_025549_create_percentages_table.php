<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePercentagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percentages', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->default(1);
            $table->string('flag')->nullable();
            $table->tinyInteger('value')->nullable();
            $table->timestamps();
        });

        DB::table('percentages')->insert([
            ["flag" => "feel", "value" => 30, "created_at" => now()],
            ["flag" => "way", "value" => 30, "created_at" => now()],
            ["flag" => "area", "value" => 40, "created_at" => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('percentages');
    }
}
