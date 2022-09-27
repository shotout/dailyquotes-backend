<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
        });

        DB::table('groups')->insert([
            ["name" => "Basic", "created_at" => now()],
            ["name" => "Hard Times", "created_at" => now()],
            ["name" => "Personal Growth", "created_at" => now()],
            ["name" => "Relationships", "created_at" => now()],
            ["name" => "Work & Productivity", "created_at" => now()],
            ["name" => "Health & Fitness", "created_at" => now()],
            ["name" => "Spiritual & Philosophy", "created_at" => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
