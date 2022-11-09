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
            $table->string('entry_id')->nullable();
            $table->string('name')->nullable();
            $table->float('percentage')->nullable();
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        DB::table('feels')->insert([
            ["name" => "Awesome", "percentage" => 1.36, "created_at" => now()],
            ["name" => "Good", "percentage" => 1.30, "created_at" => now()],
            ["name" => "Ok", "percentage" => 1.25, "created_at" => now()],
            ["name" => "Bad", "percentage" => 1.11, "created_at" => now()],
            ["name" => "Terrible", "percentage" => 1.11, "created_at" => now()],
            ["name" => "Other", "percentage" => 1.00, "created_at" => now()]
        ]);

        DB::table('media')->insert([
            [
                "owner_id" => 1,
                "type" => "feel",
                "name" => "awesome.png",
                "url" => "/assets/icons/feel/awesome.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 2,
                "type" => "feel",
                "name" => "good.png",
                "url" => "/assets/icons/feel/good.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 3,
                "type" => "feel",
                "name" => "ok.png",
                "url" => "/assets/icons/feel/ok.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 4,
                "type" => "feel",
                "name" => "bad.png",
                "url" => "/assets/icons/feel/bad.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 5,
                "type" => "feel",
                "name" => "terrible.png",
                "url" => "/assets/icons/feel/terrible.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 6,
                "type" => "feel",
                "name" => "other.png",
                "url" => "/assets/icons/feel/other.png",
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
