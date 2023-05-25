<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThemes5ToThemesTable extends Migration
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
                "group_id" => 8,
                "name" => "Theme 51",
                "is_free" => false,
                "font_family" => "Hoefler Text Black",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#473883",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 8,
                "name" => "Theme 52",
                "is_free" => false,
                "font_family" => "Fondamento-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 9,
                "name" => "Theme 53",
                "is_free" => false,
                "font_family" => "Fondamento-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 9,
                "name" => "Theme 54",
                "is_free" => false,
                "font_family" => "Caveat-Bold",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 10,
                "name" => "Theme 55",
                "is_free" => false,
                "font_family" => "DeliusSwashCaps-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 10,
                "name" => "Theme 56",
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
                "group_id" => 11,
                "name" => "Theme 57",
                "is_free" => false,
                "font_family" => "Fondamento-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 11,
                "name" => "Theme 58",
                "is_free" => false,
                "font_family" => "Hoefler Text Black",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 12,
                "name" => "Theme 59",
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
                "group_id" => 12,
                "name" => "Theme 60",
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
                "group_id" => 12,
                "name" => "Theme 61",
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
                "group_id" => 12,
                "name" => "Theme 62",
                "is_free" => false,
                "font_family" => "Merienda-Bold",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 12,
                "name" => "Theme 63",
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
                "group_id" => 12,
                "name" => "Theme 64",
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
                "group_id" => 12,
                "name" => "Theme 65",
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
                "group_id" => 12,
                "name" => "Theme 66",
                "is_free" => false,
                "font_family" => "Hoefler Text Black",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#473883",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 13,
                "name" => "Theme 67",
                "is_free" => false,
                "font_family" => "Calistoga-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 13,
                "name" => "Theme 68",
                "is_free" => false,
                "font_family" => "Optima",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#0E1E74",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 13,
                "name" => "Theme 69",
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
                "group_id" => 14,
                "name" => "Theme 70",
                "is_free" => false,
                "font_family" => "Optima",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#5F0A01",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
        ]);

        DB::table('media')->insert([
            [
                "owner_id" => 51,
                "type" => "theme",
                "name" => "51.png",
                "url" => "/assets/images/theme/bg/51.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 52,
                "type" => "theme",
                "name" => "52.png",
                "url" => "/assets/images/theme/bg/52.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 53,
                "type" => "theme",
                "name" => "53.png",
                "url" => "/assets/images/theme/bg/53.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 54,
                "type" => "theme",
                "name" => "54.png",
                "url" => "/assets/images/theme/bg/54.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 55,
                "type" => "theme",
                "name" => "55.png",
                "url" => "/assets/images/theme/bg/55.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 56,
                "type" => "theme",
                "name" => "56.png",
                "url" => "/assets/images/theme/bg/56.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 57,
                "type" => "theme",
                "name" => "57.png",
                "url" => "/assets/images/theme/bg/57.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 58,
                "type" => "theme",
                "name" => "58.png",
                "url" => "/assets/images/theme/bg/58.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 59,
                "type" => "theme",
                "name" => "59.png",
                "url" => "/assets/images/theme/bg/59.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 60,
                "type" => "theme",
                "name" => "60.png",
                "url" => "/assets/images/theme/bg/60.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 61,
                "type" => "theme",
                "name" => "61.png",
                "url" => "/assets/images/theme/bg/61.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 62,
                "type" => "theme",
                "name" => "62.png",
                "url" => "/assets/images/theme/bg/62.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 63,
                "type" => "theme",
                "name" => "63.png",
                "url" => "/assets/images/theme/bg/63.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 64,
                "type" => "theme",
                "name" => "64.png",
                "url" => "/assets/images/theme/bg/64.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 65,
                "type" => "theme",
                "name" => "65.png",
                "url" => "/assets/images/theme/bg/65.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 66,
                "type" => "theme",
                "name" => "66.png",
                "url" => "/assets/images/theme/bg/66.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 67,
                "type" => "theme",
                "name" => "67.png",
                "url" => "/assets/images/theme/bg/67.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 68,
                "type" => "theme",
                "name" => "68.png",
                "url" => "/assets/images/theme/bg/68.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 69,
                "type" => "theme",
                "name" => "69.png",
                "url" => "/assets/images/theme/bg/69.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 70,
                "type" => "theme",
                "name" => "70.png",
                "url" => "/assets/images/theme/bg/70.png",
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
