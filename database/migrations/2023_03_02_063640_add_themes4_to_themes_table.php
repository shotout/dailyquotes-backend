<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThemes4ToThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('themes')->insert([
            [
                "name" => "Theme 41",
                "is_free" => false,
                "font_family" => "Palatino",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#F0CD96",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 42",
                "is_free" => false,
                "font_family" => "Montserrat-SemiBold",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 43",
                "is_free" => false,
                "font_family" => "Rowdies-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 44",
                "is_free" => false,
                "font_family" => "Optima",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 45",
                "is_free" => false,
                "font_family" => "FjallaOne-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 46",
                "is_free" => false,
                "font_family" => "Calistoga-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#631F1F",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 47",
                "is_free" => false,
                "font_family" => "FjallaOne-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 48",
                "is_free" => false,
                "font_family" => "Montserrat-SemiBold",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 49",
                "is_free" => false,
                "font_family" => "Rowdies-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FADAC3",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 50",
                "is_free" => false,
                "font_family" => "Koulen-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
        ]);

        DB::table('media')->insert([
            [
                "owner_id" => 41,
                "type" => "theme",
                "name" => "41.png",
                "url" => "/assets/images/theme/bg/41.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 42,
                "type" => "theme",
                "name" => "42.png",
                "url" => "/assets/images/theme/bg/42.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 43,
                "type" => "theme",
                "name" => "43.png",
                "url" => "/assets/images/theme/bg/43.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 44,
                "type" => "theme",
                "name" => "44.png",
                "url" => "/assets/images/theme/bg/44.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 45,
                "type" => "theme",
                "name" => "45.png",
                "url" => "/assets/images/theme/bg/45.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 46,
                "type" => "theme",
                "name" => "46.png",
                "url" => "/assets/images/theme/bg/46.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 47,
                "type" => "theme",
                "name" => "47.png",
                "url" => "/assets/images/theme/bg/47.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 48,
                "type" => "theme",
                "name" => "48.png",
                "url" => "/assets/images/theme/bg/48.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 49,
                "type" => "theme",
                "name" => "49.png",
                "url" => "/assets/images/theme/bg/49.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 50,
                "type" => "theme",
                "name" => "50.png",
                "url" => "/assets/images/theme/bg/50.png",
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
        Schema::table('themes', function (Blueprint $table) {
            //
        });
    }
}
