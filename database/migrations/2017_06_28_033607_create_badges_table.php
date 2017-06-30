<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badges', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('badge_number');
            $table->integer('badge_level');
            $table->string('badge_short_name');
            $table->string('badge_long_name');
            $table->string('badge_level_name');
            $table->string('badge_level_type');
            $table->integer('start_need_point');
            $table->integer('max_need_point');
            $table->integer('incorrect_answer_to_lose');
            $table->string('badge_image');
            $table->integer('max_version');
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
        Schema::drop('badges');
    }
}
