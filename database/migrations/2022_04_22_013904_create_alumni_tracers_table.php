<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniTracersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_tracers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('employer_id');
            $table->string('position');
            $table->boolean('futher_study');
            $table->boolean('related_specialization');
            $table->timestamp('traced_at')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumni_tracers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['company_id']);
            $table->dropColumn(['user_id', 'company_id']);
        });

        Schema::dropIfExists('alumni_tracers');
    }
}
