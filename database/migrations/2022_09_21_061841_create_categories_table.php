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
            $table->string('entry_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->string('name')->nullable();
            $table->boolean('is_free')->default(false);
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        Schema::create('user_category', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            // $table->timestamps();
        });

        DB::table('categories')->insert([
            // basic
            ["group_id" => 1, "name" => "General", "is_free" => true, "created_at" => now()],
            ["group_id" => 1, "name" => "My Favorites", "is_free" => true, "created_at" => now()],

            // hard times
            ["group_id" => 2, "name" => "Stress", "is_free" => false, "created_at" => now()],
            ["group_id" => 2, "name" => "Anxiety", "is_free" => false, "created_at" => now()],
            ["group_id" => 2, "name" => "Letting Go", "is_free" => false, "created_at" => now()],
            ["group_id" => 2, "name" => "Hard Times", "is_free" => false, "created_at" => now()],

            // personal growth
            ["group_id" => 3, "name" => "Positive Thinking", "is_free" => false, "created_at" => now()],
            ["group_id" => 3, "name" => "Happiness", "is_free" => false, "created_at" => now()],
            ["group_id" => 3, "name" => "Personal Growth", "is_free" => false, "created_at" => now()],
            ["group_id" => 3, "name" => "Attitude", "is_free" => false, "created_at" => now()],
            ["group_id" => 3, "name" => "Cool", "is_free" => false, "created_at" => now()],
            ["group_id" => 3, "name" => "Being Alone", "is_free" => false, "created_at" => now()],
            ["group_id" => 3, "name" => "Travel", "is_free" => false, "created_at" => now()],

            // relationships
            ["group_id" => 4, "name" => "Relationship", "is_free" => false, "created_at" => now()],
            ["group_id" => 4, "name" => "Love", "is_free" => false, "created_at" => now()],
            ["group_id" => 4, "name" => "Friendship", "is_free" => false, "created_at" => now()],
            ["group_id" => 4, "name" => "Family", "is_free" => false, "created_at" => now()],
            ["group_id" => 4, "name" => "Dating", "is_free" => false, "created_at" => now()],

            // work & productivity
            ["group_id" => 5, "name" => "Leadership", "is_free" => false, "created_at" => now()],
            ["group_id" => 5, "name" => "Business", "is_free" => false, "created_at" => now()],
            ["group_id" => 5, "name" => "Success", "is_free" => false, "created_at" => now()],
            ["group_id" => 5, "name" => "Education", "is_free" => false, "created_at" => now()],
            ["group_id" => 5, "name" => "Creativity", "is_free" => false, "created_at" => now()],
            ["group_id" => 5, "name" => "Career", "is_free" => false, "created_at" => now()],

            // health & fitness
            ["group_id" => 6, "name" => "Wellness", "is_free" => false, "created_at" => now()],
            ["group_id" => 6, "name" => "Beauty", "is_free" => false, "created_at" => now()],
            ["group_id" => 6, "name" => "Health", "is_free" => false, "created_at" => now()],

            // spiritual & philosophy
            ["group_id" => 7, "name" => "Dreams & Spirituality", "is_free" => false, "created_at" => now()],
            ["group_id" => 7, "name" => "Mindfulness", "is_free" => false, "created_at" => now()],
            ["group_id" => 7, "name" => "Wisdom", "is_free" => false, "created_at" => now()],
            ["group_id" => 7, "name" => "Imagination", "is_free" => false, "created_at" => now()],
            ["group_id" => 7, "name" => "Freedom", "is_free" => false, "created_at" => now()],
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
                "name" => "stress.svg",
                "url" => "/assets/icons/category/stress.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 4,
                "type" => "category",
                "name" => "anxiety.svg",
                "url" => "/assets/icons/category/anxiety.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 5,
                "type" => "category",
                "name" => "letting_go.svg",
                "url" => "/assets/icons/category/letting_go.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 6,
                "type" => "category",
                "name" => "hard_times.svg",
                "url" => "/assets/icons/category/hard_times.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 7,
                "type" => "category",
                "name" => "positive_thinking.svg",
                "url" => "/assets/icons/category/positive_thinking.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 8,
                "type" => "category",
                "name" => "happiness.svg",
                "url" => "/assets/icons/category/happiness.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 9,
                "type" => "category",
                "name" => "personal_growth.svg",
                "url" => "/assets/icons/category/personal_growth.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 10,
                "type" => "category",
                "name" => "attitude.svg",
                "url" => "/assets/icons/category/attitude.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 11,
                "type" => "category",
                "name" => "cool.svg",
                "url" => "/assets/icons/category/cool.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 12,
                "type" => "category",
                "name" => "being_alone.svg",
                "url" => "/assets/icons/category/being_alone.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 13,
                "type" => "category",
                "name" => "travel.svg",
                "url" => "/assets/icons/category/travel.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 14,
                "type" => "category",
                "name" => "relationship.svg",
                "url" => "/assets/icons/category/relationship.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 15,
                "type" => "category",
                "name" => "love.svg",
                "url" => "/assets/icons/category/love.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 16,
                "type" => "category",
                "name" => "friendship.svg",
                "url" => "/assets/icons/category/friendship.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 17,
                "type" => "category",
                "name" => "family.svg",
                "url" => "/assets/icons/category/family.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 18,
                "type" => "category",
                "name" => "dating.svg",
                "url" => "/assets/icons/category/dating.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 19,
                "type" => "category",
                "name" => "leadership.svg",
                "url" => "/assets/icons/category/leadership.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 20,
                "type" => "category",
                "name" => "business.svg",
                "url" => "/assets/icons/category/business.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 21,
                "type" => "category",
                "name" => "success.svg",
                "url" => "/assets/icons/category/success.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 22,
                "type" => "category",
                "name" => "education.svg",
                "url" => "/assets/icons/category/education.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 23,
                "type" => "category",
                "name" => "creativity.svg",
                "url" => "/assets/icons/category/creativity.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 24,
                "type" => "category",
                "name" => "career.svg",
                "url" => "/assets/icons/category/career.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 25,
                "type" => "category",
                "name" => "wellness.svg",
                "url" => "/assets/icons/category/wellness.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 26,
                "type" => "category",
                "name" => "beauty.svg",
                "url" => "/assets/icons/category/beauty.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 27,
                "type" => "category",
                "name" => "health.svg",
                "url" => "/assets/icons/category/health.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 28,
                "type" => "category",
                "name" => "dreams&spirituality.svg",
                "url" => "/assets/icons/category/dreams&spirituality.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 29,
                "type" => "category",
                "name" => "mindfulness.svg",
                "url" => "/assets/icons/category/mindfulness.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 30,
                "type" => "category",
                "name" => "wisdom.svg",
                "url" => "/assets/icons/category/wisdom.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 31,
                "type" => "category",
                "name" => "imagination.svg",
                "url" => "/assets/icons/category/imagination.svg",
                "created_at" => now()
            ],
            [
                "owner_id" => 32,
                "type" => "category",
                "name" => "freedom.svg",
                "url" => "/assets/icons/category/freedom.svg",
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
