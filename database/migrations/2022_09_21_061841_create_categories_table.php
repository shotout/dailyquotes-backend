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
                "name" => "general.png",
                "url" => "/assets/icons/category/general.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 2,
                "type" => "category",
                "name" => "myfavorite.png",
                "url" => "/assets/icons/category/myfavorite.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 3,
                "type" => "category",
                "name" => "stress.png",
                "url" => "/assets/icons/category/stress.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 4,
                "type" => "category",
                "name" => "anxiety.png",
                "url" => "/assets/icons/category/anxiety.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 5,
                "type" => "category",
                "name" => "letting_go.png",
                "url" => "/assets/icons/category/letting_go.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 6,
                "type" => "category",
                "name" => "hard_times.png",
                "url" => "/assets/icons/category/hard_times.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 7,
                "type" => "category",
                "name" => "positive_thinking.png",
                "url" => "/assets/icons/category/positive_thinking.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 8,
                "type" => "category",
                "name" => "happiness.png",
                "url" => "/assets/icons/category/happiness.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 9,
                "type" => "category",
                "name" => "personal_growth.png",
                "url" => "/assets/icons/category/personal_growth.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 10,
                "type" => "category",
                "name" => "attitude.png",
                "url" => "/assets/icons/category/attitude.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 11,
                "type" => "category",
                "name" => "cool.png",
                "url" => "/assets/icons/category/cool.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 12,
                "type" => "category",
                "name" => "being_alone.png",
                "url" => "/assets/icons/category/being_alone.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 13,
                "type" => "category",
                "name" => "travel.png",
                "url" => "/assets/icons/category/travel.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 14,
                "type" => "category",
                "name" => "relationship.png",
                "url" => "/assets/icons/category/relationship.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 15,
                "type" => "category",
                "name" => "love.png",
                "url" => "/assets/icons/category/love.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 16,
                "type" => "category",
                "name" => "friendship.png",
                "url" => "/assets/icons/category/friendship.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 17,
                "type" => "category",
                "name" => "family.png",
                "url" => "/assets/icons/category/family.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 18,
                "type" => "category",
                "name" => "dating.png",
                "url" => "/assets/icons/category/dating.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 19,
                "type" => "category",
                "name" => "leadership.png",
                "url" => "/assets/icons/category/leadership.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 20,
                "type" => "category",
                "name" => "business.png",
                "url" => "/assets/icons/category/business.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 21,
                "type" => "category",
                "name" => "success.png",
                "url" => "/assets/icons/category/success.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 22,
                "type" => "category",
                "name" => "education.png",
                "url" => "/assets/icons/category/education.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 23,
                "type" => "category",
                "name" => "creativity.png",
                "url" => "/assets/icons/category/creativity.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 24,
                "type" => "category",
                "name" => "career.png",
                "url" => "/assets/icons/category/career.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 25,
                "type" => "category",
                "name" => "wellness.png",
                "url" => "/assets/icons/category/wellness.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 26,
                "type" => "category",
                "name" => "beauty.png",
                "url" => "/assets/icons/category/beauty.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 27,
                "type" => "category",
                "name" => "health.png",
                "url" => "/assets/icons/category/health.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 28,
                "type" => "category",
                "name" => "dreams&spirituality.png",
                "url" => "/assets/icons/category/dreams&spirituality.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 29,
                "type" => "category",
                "name" => "mindfulness.png",
                "url" => "/assets/icons/category/mindfulness.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 30,
                "type" => "category",
                "name" => "wisdom.png",
                "url" => "/assets/icons/category/wisdom.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 31,
                "type" => "category",
                "name" => "imagination.png",
                "url" => "/assets/icons/category/imagination.png",
                "created_at" => now()
            ],
            [
                "owner_id" => 32,
                "type" => "category",
                "name" => "freedom.png",
                "url" => "/assets/icons/category/freedom.png",
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
