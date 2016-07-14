<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRatingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->timestamps();
            $table->integer('rating');
            $table->morphs('rateable');
            $table->unsignedInteger('user_id')->index();
            $table->index('rateable_id');
            $table->index('rateable_type');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('user_ratings');
    }
}
