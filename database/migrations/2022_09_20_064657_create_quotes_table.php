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
            $table->integer('category_id')->nullable();
            $table->text('title')->nullable();
            $table->string('author')->nullable();
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        Schema::create('user_quote', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('quote_id')->nullable();
            $table->timestamps();
        });

        DB::table('quotes')->insert([
            [
                "category_id" => 1,
                "title" => "Sometimes you need to take a break from everyone and spend time alone, to experience, appreciate and love yourself.",
                "author" => "Robert Tew",
                "created_at" => now()
            ],
            [
                "category_id" => 1,
                "title" => "Result happen over time, not overnight. Work hard, stay consistent.",
                "author" => "Bob Marley",
                "created_at" => now()
            ],
            [
                "category_id" => 3,
                "title" => "You’ve gotta dance like there’s nobody watching, love like you’ll never be hurt, sing like there’s nobody listening, and live like it’s heaven on earth.",
                "author" => "Julian",
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
        Schema::dropIfExists('quotes','user_quote');
    }
}
