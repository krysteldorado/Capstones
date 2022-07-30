<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentReactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comment_reacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_comment_id');
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('post_comment_id')->references('id')->on('post_comments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_comment_reacts', function (Blueprint $table) {
            $table->dropForeign(['post_comment_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn(['post_comment_id','user_id']);
        });

        Schema::dropIfExists('post_comment_reacts');
    }
}
