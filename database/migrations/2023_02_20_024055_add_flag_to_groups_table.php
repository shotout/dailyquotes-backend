<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFlagToGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->tinyInteger('flag')->default(1)->after('entry_id');
        });

        Schema::table('themes', function (Blueprint $table) {
            $table->integer('group_id')->nullable()->after('entry_id');
        });

        DB::table('groups')->insert([
            ["flag" => 2, "name" => "Abstract", "created_at" => now()],
            ["flag" => 2, "name" => "Calm", "created_at" => now()],
            ["flag" => 2, "name" => "Illustration", "created_at" => now()],
            ["flag" => 2, "name" => "Luxury", "created_at" => now()],
            ["flag" => 2, "name" => "Nature", "created_at" => now()],
            ["flag" => 2, "name" => "Seasonal", "created_at" => now()],
            ["flag" => 2, "name" => "Sunrise & Sunset", "created_at" => now()],
            ["flag" => 2, "name" => "Texture", "created_at" => now()],
        ]);

        DB::table('themes')->whereIn("id",[8,13,22,40])->update(["group_id" => 8]);
        DB::table('themes')->whereIn("id",[3,11,15,16,19,20,32])->update(["group_id" => 9]);
        DB::table('themes')->whereIn("id",[1,17,21,37,38,39])->update(["group_id" => 10]);
        DB::table('themes')->whereIn("id",[5,24,25])->update(["group_id" => 11]);
        DB::table('themes')->whereIn("id",[7,14,23,26,35,36])->update(["group_id" => 12]);
        DB::table('themes')->whereIn("id",[18,27,28])->update(["group_id" => 13]);
        DB::table('themes')->whereIn("id",[2,10,12,30,33,34])->update(["group_id" => 14]);
        DB::table('themes')->whereIn("id",[4,8,9,29,31])->update(["group_id" => 15]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn('flag');
        });

        Schema::table('themes', function (Blueprint $table) {
            $table->dropColumn('group_id');
        });
    }
}
