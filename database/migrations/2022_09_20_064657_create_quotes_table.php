<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('entry_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->text('title')->nullable();
            $table->string('author')->nullable();
            $table->boolean('has_notif')->default(false);
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        Schema::create('user_quote', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('quote_id')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->string('flag')->nullable();
            $table->timestamps();
        });

        // DB::table('quotes')->insert([
        //     [
        //         "category_id" => 1,
        //         "title" => "Sometimes you need to take a break from everyone and spend time alone, to experience, appreciate and love yourself.",
        //         "author" => "Robert Tew",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "Result happen over time, not overnight. Work hard, stay consistent.",
        //         "author" => "Bob Marley",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "We cannot solve problems with the kind of thinking we employed when we came up with them.",
        //         "author" => "Albert Einstein",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "Learn as if you will live forever, live like you will die tomorrow.",
        //         "author" => "Mahatma Gandhi",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "Stay away from those people who try to disparage your ambitions. Small minds will always do that, but great minds will give you a feeling that you can become great too.",
        //         "author" => "Mark Twain",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "When you give joy to other people, you get more joy in return. You should give a good thought to happiness that you can give out.",
        //         "author" => "Eleanor Roosevelt",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "When you change your thoughts, remember to also change your world.",
        //         "author" => "Norman Vincent Peale",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "It is only when we take chances, when our lives improve. The initial and the most difficult risk that we need to take is to become honest.",
        //         "author" => "Walter Anderson",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "Nature has given us all the pieces required to achieve exceptional wellness and health, but has left it to us to put these pieces together.",
        //         "author" => "Diane McLaren",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "Success is not final; failure is not fatal: It is the courage to continue that counts.",
        //         "author" => "Winston S. Churchill",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "It is better to fail in originality than to succeed in imitation.",
        //         "author" => "Herman Melville",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "The road to success and the road to failure are almost exactly the same.",
        //         "author" => "Colin R. Davis",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "Success usually comes to those who are too busy looking for it.",
        //         "author" => "Henry David Thoreau",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "Develop success from failures. Discouragement and failure are two of the surest stepping stones to success.",
        //         "author" => "Dale Carnegie",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 1,
        //         "title" => "There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The third way is to be kind.",
        //         "author" => "Mister Rogers",
        //         "created_at" => now()
        //     ],
        //     [
        //         "category_id" => 3,
        //         "title" => "You’ve gotta dance like there’s nobody watching, love like you’ll never be hurt, sing like there’s nobody listening, and live like it’s heaven on earth.",
        //         "author" => "Julian",
        //         "created_at" => now()
        //     ],
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes','user_quote');
    }
}
