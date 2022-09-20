<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        DB::table('themes')->insert([
            ["name" => "Theme 1", "created_at" => now()],
            ["name" => "Theme 2", "created_at" => now()],
            ["name" => "Theme 3", "created_at" => now()],
            ["name" => "Theme 4", "created_at" => now()],
            ["name" => "Theme 5", "created_at" => now()],
        ]);

        DB::table('media')->insert([
            [
                "owner_id" => 1,
                "type" => "theme",
                "name" => "1.png",
                "url" => "/assets/images/theme/bg/1.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 2,
                "type" => "theme",
                "name" => "2.png",
                "url" => "/assets/images/theme/bg/2.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 3,
                "type" => "theme",
                "name" => "3.png",
                "url" => "/assets/images/theme/bg/3.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 4,
                "type" => "theme",
                "name" => "4.png",
                "url" => "/assets/images/theme/bg/4.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 5,
                "type" => "theme",
                "name" => "5.png",
                "url" => "/assets/images/theme/bg/5.png",
                "created_at" => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
