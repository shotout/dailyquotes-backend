<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Quote::factory(10)->create([
            "category_id" => 3,
            "title" => "Quote Stress",
            "author" => "Stress",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 4,
            "title" => "Quote Anxiety",
            "author" => "Anxiety",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 5,
            "title" => "Quote Letting Go",
            "author" => "Letting Go",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 6,
            "title" => "Quote Hard Times",
            "author" => "Hard Times",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 7,
            "title" => "Quote Positive Thinking",
            "author" => "Positive Thinking",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 8,
            "title" => "Quote Happiness",
            "author" => "Happiness",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 9,
            "title" => "Quote Personal Growth",
            "author" => "Personal Growth",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 10,
            "title" => "Quote Loving MySelf",
            "author" => "Loving MySelf",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 11,
            "title" => "Quote Being Thankful",
            "author" => "Being Thankful",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 12,
            "title" => "Quote Being Alone",
            "author" => "Being Alone",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 13,
            "title" => "Quote Travel",
            "author" => "Travel",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 14,
            "title" => "Quote Nature",
            "author" => "Nature",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 15,
            "title" => "Quote Relationship",
            "author" => "Relationship",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 16,
            "title" => "Quote Love",
            "author" => "Love",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 17,
            "title" => "Quote Friendship",
            "author" => "Friendship",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 18,
            "title" => "Quote Leadership",
            "author" => "Leadership",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 19,
            "title" => "Quote Productivity",
            "author" => "Productivity",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 20,
            "title" => "Quote Success",
            "author" => "Success",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 21,
            "title" => "Quote Education",
            "author" => "Education",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 22,
            "title" => "Quote Creativity",
            "author" => "Creativity",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 23,
            "title" => "Quote Inspiration",
            "author" => "Inspiration",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 24,
            "title" => "Quote Career",
            "author" => "Career",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 25,
            "title" => "Quote Reading",
            "author" => "Reading",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 26,
            "title" => "Quote Wellness",
            "author" => "Wellness",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 27,
            "title" => "Quote Exercise",
            "author" => "Exercise",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 28,
            "title" => "Quote Loving My Body",
            "author" => "Loving My Body",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 29,
            "title" => "Quote Health",
            "author" => "Health",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 30,
            "title" => "Quote Faith & Spirituality",
            "author" => "Faith & Spirituality",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 31,
            "title" => "Quote Mindfulness",
            "author" => "Mindfulness",
        ]);

        \App\Models\Quote::factory(10)->create([
            "category_id" => 32,
            "title" => "Quote Wisdom",
            "author" => "Wisdom",
        ]);
    }
}
