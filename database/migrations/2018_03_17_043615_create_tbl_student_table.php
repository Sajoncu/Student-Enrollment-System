<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_student', function (Blueprint $table) {
            $table->increments('student_id');
            $table->string('student_name');
            $table->string('student_roll');
            $table->string('student_fathersname');
            $table->string('student_mothersname');
            $table->string('student_email');
            $table->string('student_password');
            $table->string('student_phone');
            $table->string('student_image');
            $table->string('student_address');
            $table->string('student_admissionyear');
            $table->string('student_department');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_student');
    }
}
