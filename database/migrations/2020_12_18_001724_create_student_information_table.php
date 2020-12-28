<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('middle_name',50)->nullable();
            $table->string('extention_name',50)->nullable();
            $table->string('birthday',20);
            $table->string('birth_place',50);
            $table->string('sex',20);
            $table->string('nationality',50);
            $table->string('status',50);
            $table->string('street',50);
            $table->string('barangay',50);
            $table->string('city',50);
            $table->string('province',50);
            $table->string('region',50);
            $table->string('father_name',100);
            $table->string('mother_name',100);
            $table->string('father_contact_number',15);
            $table->string('mother_contact_number',15);
            $table->string('parent_address',200);
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
        Schema::dropIfExists('student_information');
    }
}
