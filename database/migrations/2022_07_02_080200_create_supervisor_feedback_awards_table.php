<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorFeedbackAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor_feedback_awards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supervisor_feedback_id');
            $table->string('award');
            $table->year('year');
            $table->timestamps();

            $table->foreign('supervisor_feedback_id')->references('id')->on('supervisor_feedback')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supervisor_feedback_awards', function (Blueprint $table) {
            $table->dropForeign(['supervisor_feedback_id']);
            $table->dropColumn(['supervisor_feedback_id']);
        });

        Schema::dropIfExists('supervisor_feedback_awards');
    }
}
