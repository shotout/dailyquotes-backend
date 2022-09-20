<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('styles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        DB::table('styles')->insert([
            ["name" => "style 1", "created_at" => now()],
            ["name" => "style 2", "created_at" => now()],
            ["name" => "style 3", "created_at" => now()],
            ["name" => "style 4", "created_at" => now()],
        ]);

        DB::table('media')->insert([
            [
                "owner_id" => 1,
                "type" => "style",
                "name" => "1.svg",
                "url" => "/asssets/icons/style/1.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 2,
                "type" => "style",
                "name" => "2.svg",
                "url" => "/asssets/icons/style/2.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 3,
                "type" => "style",
                "name" => "3.svg",
                "url" => "/asssets/icons/style/3.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 4,
                "type" => "style",
                "name" => "4.svg",
                "url" => "/asssets/icons/style/4.svg",
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
        Schema::dropIfExists('styles');
    }
}
