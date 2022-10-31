<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('stripe_name')->nullable();
            $table->string('stripe_id')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('abbreviation')->nullable();
            $table->timestamps();
        });

        DB::table('plans')->insert([
            [
                'type' => 1,
                'name' => 'Free Plan',
                'slug' => 'free-plan',
                'stripe_name' => 'Free Plan',
                'stripe_id' => '',
                'price' => 0,
                'abbreviation' => ''
            ],

            [
                'type' => 2,
                'name' => 'Monthly Plan',
                'slug' => 'monthly-plan',
                'stripe_name' => 'Monthly Plan',
                'stripe_id' => 'price_1LxpU5KITpzX4txvtEkn6kUY',
                'price' => 4,
                'abbreviation' => '/month'
            ],
            [
                'type' => 3,
                'name' => 'Yearly Plan',
                'slug' => 'yearly-plan',
                'stripe_name' => 'Yearly Plan',
                'stripe_id' => 'price_1LyoE5KITpzX4txvQSHGWKQV',
                'price' => 20,
                'abbreviation' => '/year'
            ],
            [
                'type' => 4,
                'name' => 'Lifetime Plan',
                'slug' => 'lifetime-plan',
                'stripe_name' => 'Lifetime Plan',
                'stripe_id' => 'price_1LxpXiKITpzX4txv1EYTif9n',
                'price' => 150,
                'abbreviation' => ''
            ],

            [
                'type' => 5,
                'name' => '1 Month Free Plan',
                'slug' => '1-month-free-plan',
                'stripe_name' => '1 Month Free Plan',
                'stripe_id' => '',
                'price' => 0,
                'abbreviation' => ''
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
        Schema::dropIfExists('plans');
    }
}
