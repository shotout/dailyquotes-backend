<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('entry_id')->nullable();
            $table->string('name')->nullable();
            $table->float('percentage')->nullable();
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        Schema::create('user_area', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('area_id')->nullable();
            // $table->timestamps();
        });

        DB::table('areas')->insert([
            ["name" => "Productivity", "percentage" => 3.33, "created_at" => now()],
            ["name" => "Positive Thinking", "percentage" => 2.11, "created_at" => now()],
            ["name" => "Inspiration", "percentage" => 3.64, "created_at" => now()],
            ["name" => "Stress & Anxiety", "percentage" => 4.00, "created_at" => now()],
            ["name" => "Relationships", "percentage" => 3.33, "created_at" => now()],
            ["name" => "Working Out", "percentage" => 4.00, "created_at" => now()],
            ["name" => "Self-Esteem", "percentage" => 2.50, "created_at" => now()],
            ["name" => "Achieving Goals", "percentage" => 3.64, "created_at" => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas','user_area');
    }
}
