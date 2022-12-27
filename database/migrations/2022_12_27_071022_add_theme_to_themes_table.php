<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThemeToThemesTable extends Migration
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
                "name" => "Theme 7",
                "is_free" => false,
                "font_family" => "Fondamento",
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 8",
                "is_free" => false,
                "font_family" => "Antic Didone",
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 9",
                "is_free" => false,
                "font_family" => "Beth Ellen",
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 10",
                "is_free" => false,
                "font_family" => "Calistoga",
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 11",
                "is_free" => false,
                "font_family" => "Fondamento",
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 12",
                "is_free" => false,
                "font_family" => "Calistoga",
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 13",
                "is_free" => false,
                "font_family" => "Carter One",
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 14",
                "is_free" => false,
                "font_family" => "Kreon",
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => null,
                "background_color" => "rgba(0, 0, 0, 0.5)",
                "created_at" => now()
            ],
            [
                "name" => "Theme 15",
                "is_free" => false,
                "font_family" => "Caveat",
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 16",
                "is_free" => false,
                "font_family" => "Calistoga",
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 17",
                "is_free" => false,
                "font_family" => "Delius Swash Caps",
                "text_color" => "#000000",
                "text_shadow" => null,
                "text_shadow_offset" => null,
                "background_color" => null,
                "created_at" => now()
            ],
            [
                "name" => "Theme 18",
                "is_free" => false,
                "font_family" => "Kreon",
                "text_color" => "#FFFFFF",
                "text_shadow" => "rgba(0, 0, 0, 0.75)",
                "text_shadow_offset" => null,
                "background_color" => "rgba(0, 0, 0, 0.5)",
                "created_at" => now()
            ],
        ]);

        DB::table('media')->insert([
            [
                "owner_id" => 7,
                "type" => "theme",
                "name" => "7.png",
                "url" => "/assets/images/theme/bg/7.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 8,
                "type" => "theme",
                "name" => "8.png",
                "url" => "/assets/images/theme/bg/8.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 9,
                "type" => "theme",
                "name" => "9.png",
                "url" => "/assets/images/theme/bg/9.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 10,
                "type" => "theme",
                "name" => "10.png",
                "url" => "/assets/images/theme/bg/10.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 11,
                "type" => "theme",
                "name" => "11.png",
                "url" => "/assets/images/theme/bg/11.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 12,
                "type" => "theme",
                "name" => "12.png",
                "url" => "/assets/images/theme/bg/12.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 13,
                "type" => "theme",
                "name" => "13.png",
                "url" => "/assets/images/theme/bg/13.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 14,
                "type" => "theme",
                "name" => "14.png",
                "url" => "/assets/images/theme/bg/14.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 15,
                "type" => "theme",
                "name" => "15.png",
                "url" => "/assets/images/theme/bg/15.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 16,
                "type" => "theme",
                "name" => "16.png",
                "url" => "/assets/images/theme/bg/16.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 17,
                "type" => "theme",
                "name" => "17.png",
                "url" => "/assets/images/theme/bg/17.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 18,
                "type" => "theme",
                "name" => "18.png",
                "url" => "/assets/images/theme/bg/18.png",
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
