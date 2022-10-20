<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ways', function (Blueprint $table) {
            $table->id();
            $table->string('entry_id')->nullable();
            $table->string('name')->nullable();
            $table->float('percentage')->nullable();
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        Schema::create('user_way', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('way_id')->nullable();
            // $table->timestamps();
        });

        DB::table('ways')->insert([
            ["name" => "Family", "percentage" => 2.73, "created_at" => now()],
            ["name" => "Friends", "percentage" => 2.73, "created_at" => now()],
            ["name" => "Work", "percentage" => 3.75, "created_at" => now()],
            ["name" => "Health", "percentage" => 3.75, "created_at" => now()],
            ["name" => "Relationship", "percentage" => 2.73, "created_at" => now()],
            ["name" => "Other", "percentage" => 1.00, "created_at" => now()]
        ]);

        DB::table('media')->insert([
            [
                "owner_id" => 1,
                "type" => "way",
                "name" => "family.svg",
                "url" => "/assets/icons/way/family.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 2,
                "type" => "way",
                "name" => "friends.svg",
                "url" => "/assets/icons/way/friends.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 3,
                "type" => "way",
                "name" => "work.svg",
                "url" => "/assets/icons/way/work.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 4,
                "type" => "way",
                "name" => "health.svg",
                "url" => "/assets/icons/way/health.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 5,
                "type" => "way",
                "name" => "relationship.svg",
                "url" => "/assets/icons/way/relationship.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 6,
                "type" => "way",
                "name" => "other.svg",
                "url" => "/assets/icons/way/other.svg",
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
        Schema::dropIfExists('ways','user_way');
    }
}
