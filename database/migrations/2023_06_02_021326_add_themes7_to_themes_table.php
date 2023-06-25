<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThemes7ToThemesTable extends Migration
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
                "name" => "Theme 81",
                "is_free" => false,
                "font_family" => "Calistoga-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#BA0808",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 8,
                "name" => "Theme 82",
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
                "group_id" => 8,
                "name" => "Theme 83",
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
                "name" => "Theme 84",
                "is_free" => false,
                "font_family" => "Merienda-Bold",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#1E527D",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 10,
                "name" => "Theme 85",
                "is_free" => false,
                "font_family" => "Libre Baskerville",
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
                "name" => "Theme 86",
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
                "group_id" => 13,
                "name" => "Theme 87",
                "is_free" => false,
                "font_family" => "Gaegu-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "group_id" => 14,
                "name" => "Theme 88",
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
                "group_id" => 14,
                "name" => "Theme 89",
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
            [
                "group_id" => 15,
                "name" => "Theme 90",
                "is_free" => false,
                "font_family" => "FjallaOne-Regular",
                "font_size" => 24,
                "line_height" => 34,
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
        ]);

        DB::table('media')->insert([
            [
                "owner_id" => 81,
                "type" => "theme",
                "name" => "81.png",
                "url" => "/assets/images/theme/bg/81.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 82,
                "type" => "theme",
                "name" => "82.png",
                "url" => "/assets/images/theme/bg/82.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 83,
                "type" => "theme",
                "name" => "83.png",
                "url" => "/assets/images/theme/bg/83.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 84,
                "type" => "theme",
                "name" => "84.png",
                "url" => "/assets/images/theme/bg/84.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 85,
                "type" => "theme",
                "name" => "85.png",
                "url" => "/assets/images/theme/bg/85.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 86,
                "type" => "theme",
                "name" => "86.png",
                "url" => "/assets/images/theme/bg/86.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 87,
                "type" => "theme",
                "name" => "87.png",
                "url" => "/assets/images/theme/bg/87.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 88,
                "type" => "theme",
                "name" => "88.png",
                "url" => "/assets/images/theme/bg/88.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 89,
                "type" => "theme",
                "name" => "89.png",
                "url" => "/assets/images/theme/bg/89.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 90,
                "type" => "theme",
                "name" => "90.png",
                "url" => "/assets/images/theme/bg/90.png",
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
