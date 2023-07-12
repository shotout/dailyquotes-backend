<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThemes8ToThemesTable extends Migration
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
                "name" => "Theme 91",
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
                "group_id" => 9,
                "name" => "Theme 92",
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
                "group_id" => 9,
                "name" => "Theme 93",
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
                "name" => "Theme 94",
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
                "group_id" => 11,
                "name" => "Theme 95",
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
                "group_id" => 12,
                "name" => "Theme 96",
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
                "group_id" => 13,
                "name" => "Theme 97",
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
                "group_id" => 14,
                "name" => "Theme 98",
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
                "group_id" => 14,
                "name" => "Theme 99",
                "is_free" => false,
                "font_family" => "DeliusSwashCaps-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => '{"width":1,"height":1}',
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 15,
                "name" => "Theme 100",
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
                "owner_id" => 91,
                "type" => "theme",
                "name" => "91.png",
                "url" => "/assets/images/theme/bg/91.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 92,
                "type" => "theme",
                "name" => "92.png",
                "url" => "/assets/images/theme/bg/92.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 93,
                "type" => "theme",
                "name" => "93.png",
                "url" => "/assets/images/theme/bg/93.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 94,
                "type" => "theme",
                "name" => "94.png",
                "url" => "/assets/images/theme/bg/94.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 95,
                "type" => "theme",
                "name" => "95.png",
                "url" => "/assets/images/theme/bg/95.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 96,
                "type" => "theme",
                "name" => "96.png",
                "url" => "/assets/images/theme/bg/96.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 97,
                "type" => "theme",
                "name" => "97.png",
                "url" => "/assets/images/theme/bg/97.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 98,
                "type" => "theme",
                "name" => "98.png",
                "url" => "/assets/images/theme/bg/98.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 99,
                "type" => "theme",
                "name" => "99.png",
                "url" => "/assets/images/theme/bg/99.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 100,
                "type" => "theme",
                "name" => "100.png",
                "url" => "/assets/images/theme/bg/100.png",
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
