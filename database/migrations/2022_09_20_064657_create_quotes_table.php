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
                "title" => "Sometimes you need to take a break from everyone and spend time alone, to experience, appreciate and love yourself.",
                "author" => "Robert Tew",
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
