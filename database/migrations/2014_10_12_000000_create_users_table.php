<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('entry_id')->nullable();
            $table->integer('style_id')->nullable();
            $table->integer('feel_id')->nullable();
            
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();;
            $table->rememberToken()->nullable();;
            $table->boolean('is_member')->default(false);
            $table->string('device_id')->nullable();
            $table->string('fcm_token')->nullable();
            $table->integer('notif_count')->default(0);
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
