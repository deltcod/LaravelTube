<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLikesDislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes_dislikes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_id')->unsigned();
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['video_id', 'user_id']);
            $table->string('type');
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
        Schema::table('likes_dislikes', function (Blueprint $table) {
            $table->dropForeign('likes_dislikes_video_id_foreign');
            $table->dropForeign('likes_dislikes_user_id_foreign');
        });
        Schema::drop('likes_dislikes');
    }
}
