<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomeThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custome_themes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('entry_id')->nullable();
            $table->string('name')->nullable();
            $table->string('flag')->nullable();
            $table->boolean('is_free')->default(false);

            $table->string('font_family')->nullable();
            $table->tinyInteger('font_size')->default(18);
            $table->tinyInteger('line_height')->default(24);
            $table->string('text_color')->nullable();
            $table->string('text_shadow')->nullable();
            $table->string('text_shadow_offset')->nullable();
            $table->string('background_color')->nullable();
            $table->string('bg_image_color')->nullable();

            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custome_themes');
    }
}
