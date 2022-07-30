<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni_registers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('sex', 20);
            $table->string('civil_status', 20);
            $table->string('phone', 20)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('graduated_at');

            $table->timestamps();
            
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
        Schema::dropIfExists('alumni_registers');
    }
}
