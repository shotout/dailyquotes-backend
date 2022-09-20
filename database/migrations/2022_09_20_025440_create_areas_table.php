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
            $table->string('name')->nullable();
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
            ["name" => "Productivity", "created_at" => now()],
            ["name" => "Positive Thinking", "created_at" => now()],
            ["name" => "Inspiration", "created_at" => now()],
            ["name" => "Faith & Spirituality", "created_at" => now()],
            ["name" => "Relationships", "created_at" => now()],
            ["name" => "Working Out", "created_at" => now()],
            ["name" => "Self-Esteem", "created_at" => now()],
            ["name" => "Achieving Goals", "created_at" => now()],
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
