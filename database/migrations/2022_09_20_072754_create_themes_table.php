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
            $table->string('flag')->nullable();
            $table->boolean('is_free')->default(false);

            $table->string('font_family')->nullable();
            // $table->string('font_style')->nullable();
            // $table->string('font_weight')->nullable();
            // $table->string('font_size')->nullable();
            // $table->string('line_height')->nullable();
            $table->string('text_color')->nullable();
            $table->string('text_shadow')->nullable();
            $table->string('background_color')->nullable();

            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        Schema::create('user_themes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('theme_id')->nullable();
            // $table->timestamps();
        });

        DB::table('themes')->insert([
            [
                "name" => "Theme 1",
                "is_free" => true,
                "font_family" => "Iowan Old Style",
                "text_color" => "#000000",
                "text_shadow" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 2",
                "is_free" => false,
                "font_family" => "Koulen",
                "text_color" => "#FFFFFF",
                "text_shadow" => "0px 4px 4px rgba(0, 0, 0, 0.65)",
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 3",
                "is_free" => false,
                "font_family" => "Koulen",
                "text_color" => "#FFFFFF",
                "text_shadow" => "0px 4px 4px rgba(0, 0, 0, 0.65)",
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 4",
                "is_free" => false,
                "font_family" => "License Plate",
                "text_color" => "#FFFFFF",
                "text_shadow" => "0px 4px 4px rgba(0, 0, 0, 0.65)",
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 5",
                "is_free" => false,
                "font_family" => "Patua One",
                "text_color" => "#FFFFFF",
                "text_shadow" => null,
                "background_color" => "rgba(0, 0, 0, 0.6)",
                "created_at" => now()
            ],
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
