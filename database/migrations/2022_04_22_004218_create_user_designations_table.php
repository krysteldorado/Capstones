<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDesignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_designations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('designation_id');
            $table->foreignId('campus_id')->nullable();
            $table->foreignId('college_id')->nullable();
            $table->foreignId('program_id')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->foreign('campus_id')->references('id')->on('campuses')->onDelete('cascade');
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_designations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['designation_id']);
            $table->dropForeign(['campus_id']);
            $table->dropForeign(['college_id']);
            $table->dropForeign(['program_id']);
            $table->dropColumn(['user_id', 'designation_id', 'campus_id', 'college_id', 'program_id']);
        });

        Schema::dropIfExists('user_designations');
    }
}
