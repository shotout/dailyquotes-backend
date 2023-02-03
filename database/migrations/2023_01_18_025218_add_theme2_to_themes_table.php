<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTheme2ToThemesTable extends Migration
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
                "name" => "Theme 19",
                "is_free" => false,
                "font_family" => "Girassol-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 20",
                "is_free" => false,
                "font_family" => "Gaegu-Regular",
                "font_size" => 26,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 21",
                "is_free" => false,
                "font_family" => "Farsan-Regular",
                "font_size" => 28,
                "line_height" => 39,
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 22",
                "is_free" => false,
                "font_family" => "Hoefler Text Black",
                "font_size" => 26,
                "line_height" => 42,
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 23",
                "is_free" => false,
                "font_family" => "IM FELL DW Pica",
                "font_size" => 26,
                "line_height" => 38,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 24",
                "is_free" => false,
                "font_family" => "IbarraRealNova-Bold",
                "font_size" => 26,
                "line_height" => 38,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 25",
                "is_free" => false,
                "font_family" => "Iceberg-Regular",
                "font_size" => 26,
                "line_height" => 38,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 26",
                "is_free" => false,
                "font_family" => "PlayfairDisplay-Bold",
                "font_size" => 26,
                "line_height" => 38,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 27",
                "is_free" => false,
                "font_family" => "Rowdies-Regular",
                "font_size" => 26,
                "line_height" => 38,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 28",
                "is_free" => false,
                "font_family" => "Merienda-Bold",
                "font_size" => 24,
                "line_height" => 38,
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
        ]);

        DB::table('media')->insert([
            [
                "owner_id" => 19,
                "type" => "theme",
                "name" => "19.png",
                "url" => "/assets/images/theme/bg/19.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 20,
                "type" => "theme",
                "name" => "20.png",
                "url" => "/assets/images/theme/bg/20.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 21,
                "type" => "theme",
                "name" => "21.png",
                "url" => "/assets/images/theme/bg/21.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 22,
                "type" => "theme",
                "name" => "22.png",
                "url" => "/assets/images/theme/bg/22.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 23,
                "type" => "theme",
                "name" => "23.png",
                "url" => "/assets/images/theme/bg/23.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 24,
                "type" => "theme",
                "name" => "24.png",
                "url" => "/assets/images/theme/bg/24.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 25,
                "type" => "theme",
                "name" => "25.png",
                "url" => "/assets/images/theme/bg/25.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 26,
                "type" => "theme",
                "name" => "26.png",
                "url" => "/assets/images/theme/bg/26.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 27,
                "type" => "theme",
                "name" => "27.png",
                "url" => "/assets/images/theme/bg/27.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 28,
                "type" => "theme",
                "name" => "28.png",
                "url" => "/assets/images/theme/bg/28.png",
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
