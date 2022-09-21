<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('flag')->nullable();
            $table->boolean('is_free')->default(false);
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ["name" => "General", "flag" => "", "is_free" => true, "created_at" => now()],
            ["name" => "My Favorites", "flag" => "", "is_free" => true, "created_at" => now()],
            ["name" => "Toxic Relationship", "flag" => "popular", "is_free" => false, "created_at" => now()],
            ["name" => "Mental Health", "flag" => "popular", "is_free" => false, "created_at" => now()],
            ["name" => "Love", "flag" => "popular", "is_free" => false, "created_at" => now()],
            ["name" => "Relationship", "flag" => "popular", "is_free" => true, "created_at" => now()],
            ["name" => "Parenthood", "flag" => "foryou", "is_free" => false, "created_at" => now()],
            ["name" => "Friendship", "flag" => "foryou", "is_free" => true, "created_at" => now()],
            ["name" => "Working Out", "flag" => "foryou", "is_free" => true, "created_at" => now()],
            ["name" => "Sadness", "flag" => "foryou", "is_free" => true, "created_at" => now()],
        ]);

        DB::table('media')->insert([
            [
                "owner_id" => 1,
                "type" => "category",
                "name" => "general.svg",
                "url" => "/assets/icons/category/general.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 2,
                "type" => "category",
                "name" => "myfavorite.svg",
                "url" => "/assets/icons/category/myfavorite.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 3,
                "type" => "category",
                "name" => "toxic_relationship.svg",
                "url" => "/assets/icons/category/toxic_relationship.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 4,
                "type" => "category",
                "name" => "mental_health.svg",
                "url" => "/assets/icons/category/mental_health.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 5,
                "type" => "category",
                "name" => "love.svg",
                "url" => "/assets/icons/category/love.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 6,
                "type" => "category",
                "name" => "relationship.svg",
                "url" => "/assets/icons/category/relationship.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 7,
                "type" => "category",
                "name" => "parenthood.svg",
                "url" => "/assets/icons/category/parenthood.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 8,
                "type" => "category",
                "name" => "friendship.svg",
                "url" => "/assets/icons/category/friendship.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 9,
                "type" => "category",
                "name" => "working_out.svg",
                "url" => "/assets/icons/category/working_out.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 10,
                "type" => "category",
                "name" => "sadness.svg",
                "url" => "/assets/icons/category/sadness.svg",
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
        Schema::dropIfExists('categories');
    }
}
