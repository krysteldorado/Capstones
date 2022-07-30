<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisor_feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supervisor_id');
            $table->foreignId('alumni_tracer_id');
            $table->string('employment_time');
            $table->text('commment');
            $table->timestamps();

            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('alumni_tracer_id')->references('id')->on('alumni_tracers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supervisor_feedback', function (Blueprint $table) {
            $table->dropForeign(['supervisor_id']);
            $table->dropForeign(['alumni_tracer_id']);
            $table->dropColumn(['supervisor_id', 'alumni_tracer_id']);
        });

        Schema::dropIfExists('supervisor_feedback');
    }
}
