<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        DB::table('feels')->insert([
            ["name" => "Awesome", "created_at" => now()],
            ["name" => "Good", "created_at" => now()],
            ["name" => "Ok", "created_at" => now()],
            ["name" => "Bad", "created_at" => now()],
            ["name" => "Terrible", "created_at" => now()],
            ["name" => "Other", "created_at" => now()]
        ]);

        DB::table('media')->insert([
            [
                "owner_id" => 1,
                "type" => "feel",
                "name" => "awesome.svg",
                "url" => "/assets/icons/feel/awesome.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 2,
                "type" => "feel",
                "name" => "good.svg",
                "url" => "/assets/icons/feel/good.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 3,
                "type" => "feel",
                "name" => "ok.svg",
                "url" => "/assets/icons/feel/ok.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 4,
                "type" => "feel",
                "name" => "bad.svg",
                "url" => "/assets/icons/feel/bad.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 5,
                "type" => "feel",
                "name" => "terrible.svg",
                "url" => "/assets/icons/feel/terrible.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 6,
                "type" => "feel",
                "name" => "other.svg",
                "url" => "/assets/icons/feel/other.svg",
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
        Schema::dropIfExists('feels');
    }
}
