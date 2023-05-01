<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThemes6ToThemesTable extends Migration
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
                "group_id" => 9,
                "name" => "Theme 71",
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
                "group_id" => 9,
                "name" => "Theme 72",
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
                "group_id" => 9,
                "name" => "Theme 73",
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
                "name" => "Theme 74",
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
                "group_id" => 10,
                "name" => "Theme 75",
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
                "name" => "Theme 76",
                "is_free" => false,
                "font_family" => "PlayfairDisplay-Bold",
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
                "name" => "Theme 77",
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
                "group_id" => 11,
                "name" => "Theme 78",
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
                "group_id" => 13,
                "name" => "Theme 79",
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
                "group_id" => 15,
                "name" => "Theme 80",
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
                "owner_id" => 71,
                "type" => "theme",
                "name" => "71.png",
                "url" => "/assets/images/theme/bg/71.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 72,
                "type" => "theme",
                "name" => "72.png",
                "url" => "/assets/images/theme/bg/72.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 73,
                "type" => "theme",
                "name" => "73.png",
                "url" => "/assets/images/theme/bg/73.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 74,
                "type" => "theme",
                "name" => "74.png",
                "url" => "/assets/images/theme/bg/74.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 75,
                "type" => "theme",
                "name" => "75.png",
                "url" => "/assets/images/theme/bg/75.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 76,
                "type" => "theme",
                "name" => "76.png",
                "url" => "/assets/images/theme/bg/76.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 77,
                "type" => "theme",
                "name" => "77.png",
                "url" => "/assets/images/theme/bg/77.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 78,
                "type" => "theme",
                "name" => "78.png",
                "url" => "/assets/images/theme/bg/78.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 79,
                "type" => "theme",
                "name" => "79.png",
                "url" => "/assets/images/theme/bg/79.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 80,
                "type" => "theme",
                "name" => "80.png",
                "url" => "/assets/images/theme/bg/80.png",
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
