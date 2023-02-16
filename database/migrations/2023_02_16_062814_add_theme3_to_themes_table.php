<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTheme3ToThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('themes', function (Blueprint $table) {
            DB::table('themes')->insert([
                [
                    "name" => "Theme 29",
                    "is_free" => false,
                    "font_family" => "Gloria Hallelujah",
                    "font_size" => 24,
                    "line_height" => 38,
                    "text_color" => "#000000",
                    "text_shadow" => null,
                    "text_shadow_offset" => null,
                    "background_color" => null,
                    "created_at" => now()
                ],
                [
                    "name" => "Theme 30",
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
                    "name" => "Theme 31",
                    "is_free" => false,
                    "font_family" => "Palatino",
                    "font_size" => 24,
                    "line_height" => 34,
                    "text_color" => "#FFFFFF",
                    "text_shadow" => "rgba(0, 0, 0, 0.75)",
                    "text_shadow_offset" => '{"width":1,"height":1}',
                    "background_color" => null,
                    "created_at" => now()
                ],
                [
                    "name" => "Theme 32",
                    "is_free" => false,
                    "font_family" => "Hoefler Text Black",
                    "font_size" => 24,
                    "line_height" => 38,
                    "text_color" => "#000000",
                    "text_shadow" => null,
                    "text_shadow_offset" => null,
                    "background_color" => null,
                    "created_at" => now()
                ],
                [
                    "name" => "Theme 33",
                    "is_free" => false,
                    "font_family" => "IM FELL DW Pica",
                    "font_size" => 24,
                    "line_height" => 34,
                    "text_color" => "#FFFFFF",
                    "text_shadow" => "rgba(0, 0, 0, 0.75)",
                    "text_shadow_offset" => '{"width":1,"height":1}',
                    "background_color" => null,
                    "created_at" => now()
                ],
                [
                    "name" => "Theme 34",
                    "is_free" => false,
                    "font_family" => "Palatino",
                    "font_size" => 24,
                    "line_height" => 34,
                    "text_color" => "#FFFFFF",
                    "text_shadow" => "rgba(0, 0, 0, 0.75)",
                    "text_shadow_offset" => '{"width":1,"height":1}',
                    "background_color" => null,
                    "created_at" => now()
                ],
                [
                    "name" => "Theme 35",
                    "is_free" => false,
                    "font_family" => "AnticDidone-Regular",
                    "font_size" => 24,
                    "line_height" => 34,
                    "text_color" => "#FFFFFF",
                    "text_shadow" => "rgba(0, 0, 0, 0.75)",
                    "text_shadow_offset" => '{"width":1,"height":1}',
                    "background_color" => null,
                    "created_at" => now()
                ],
                [
                    "name" => "Theme 36",
                    "is_free" => false,
                    "font_family" => "Calistoga-Regular",
                    "font_size" => 24,
                    "line_height" => 34,
                    "text_color" => "#FFFFFF",
                    "text_shadow" => "rgba(0, 0, 0, 0.75)",
                    "text_shadow_offset" => '{"width":1,"height":1}',
                    "background_color" => null,
                    "created_at" => now()
                ],
                [
                    "name" => "Theme 37",
                    "is_free" => false,
                    "font_family" => "Capriola",
                    "font_size" => 24,
                    "line_height" => 38,
                    "text_color" => "#000000",
                    "text_shadow" => null,
                    "text_shadow_offset" => null,
                    "background_color" => null,
                    "created_at" => now()
                ],
                [
                    "name" => "Theme 38",
                    "is_free" => false,
                    "font_family" => "AnticDidone-Regular",
                    "font_size" => 24,
                    "line_height" => 34,
                    "text_color" => "#FFFFFF",
                    "text_shadow" => "rgba(0, 0, 0, 0.75)",
                    "text_shadow_offset" => '{"width":1,"height":1}',
                    "background_color" => null,
                    "created_at" => now()
                ],
                [
                    "name" => "Theme 39",
                    "is_free" => false,
                    "font_family" => "AnticDidone-Regular",
                    "font_size" => 24,
                    "line_height" => 34,
                    "text_color" => "#FFFFFF",
                    "text_shadow" => "rgba(0, 0, 0, 0.75)",
                    "text_shadow_offset" => '{"width":1,"height":1}',
                    "background_color" => null,
                    "created_at" => now()
                ],
                [
                    "name" => "Theme 40",
                    "is_free" => false,
                    "font_family" => "Gaegu-Regular",
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
                    "owner_id" => 29,
                    "type" => "theme",
                    "name" => "29.png",
                    "url" => "/assets/images/theme/bg/29.png",
                    "created_at" => now()
                ],
                [
                    "owner_id" => 30,
                    "type" => "theme",
                    "name" => "30.png",
                    "url" => "/assets/images/theme/bg/30.png",
                    "created_at" => now()
                ],
                [
                    "owner_id" => 31,
                    "type" => "theme",
                    "name" => "31.png",
                    "url" => "/assets/images/theme/bg/31.png",
                    "created_at" => now()
                ],
                [
                    "owner_id" => 32,
                    "type" => "theme",
                    "name" => "32.png",
                    "url" => "/assets/images/theme/bg/32.png",
                    "created_at" => now()
                ],
                [
                    "owner_id" => 33,
                    "type" => "theme",
                    "name" => "33.png",
                    "url" => "/assets/images/theme/bg/33.png",
                    "created_at" => now()
                ],
                [
                    "owner_id" => 34,
                    "type" => "theme",
                    "name" => "34.png",
                    "url" => "/assets/images/theme/bg/34.png",
                    "created_at" => now()
                ],
                [
                    "owner_id" => 35,
                    "type" => "theme",
                    "name" => "35.png",
                    "url" => "/assets/images/theme/bg/35.png",
                    "created_at" => now()
                ],
                [
                    "owner_id" => 36,
                    "type" => "theme",
                    "name" => "36.png",
                    "url" => "/assets/images/theme/bg/36.png",
                    "created_at" => now()
                ],
                [
                    "owner_id" => 37,
                    "type" => "theme",
                    "name" => "37.png",
                    "url" => "/assets/images/theme/bg/37.png",
                    "created_at" => now()
                ],
                [
                    "owner_id" => 38,
                    "type" => "theme",
                    "name" => "38.png",
                    "url" => "/assets/images/theme/bg/38.png",
                    "created_at" => now()
                ],
                [
                    "owner_id" => 39,
                    "type" => "theme",
                    "name" => "39.png",
                    "url" => "/assets/images/theme/bg/39.png",
                    "created_at" => now()
                ],
                [
                    "owner_id" => 40,
                    "type" => "theme",
                    "name" => "40.png",
                    "url" => "/assets/images/theme/bg/40.png",
                    "created_at" => now()
                ],
            ]);
        });
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
