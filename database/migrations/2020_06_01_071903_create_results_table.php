<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('student_email',100)->unique();
            $table->string('student_semester',100);
            $table->string('subject1_marks',255);
            $table->string('subject2_marks',255);
            $table->string('subject3_marks',255);
            $table->string('subject4_marks',255);
            $table->string('total',255);
            $table->string('percentage',255);
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
        Schema::dropIfExists('results');
    }
}
