<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoalToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('commit_goal')->nullable()->after('notif_count');
            $table->boolean('specific_goal')->default(false)->after('notif_count');
            $table->boolean('important_change')->default(false)->after('notif_count');
        });

        Schema::table('themes', function (Blueprint $table) {
            $table->string('bg_image_color')->nullable()->after('background_color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('commit_goal');
            $table->dropColumn('specific_goal');
            $table->dropColumn('important_change');
        });

        Schema::table('themes', function (Blueprint $table) {
            $table->dropColumn('bg_image_color');
        });
    }
}
