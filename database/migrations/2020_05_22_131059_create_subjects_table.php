<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_semester');
            
            $table->string('subject1_name',255);
            $table->integer('subject1_marks');
            $table->string('subject2_name',255);
            $table->integer('subject2_marks');
            $table->string('subject3_name',255);
            $table->integer('subject3_marks');
            $table->string('subject4_name',255);
            $table->integer('subject4_marks');
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
        Schema::dropIfExists('subjects');
    }
}
