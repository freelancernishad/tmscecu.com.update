<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assessment_id');
            $table->foreign('assessment_id')->references('id')->on('assessments');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->string('report_name');
            $table->date('date');
            $table->string('class');
            $table->string('subject');

            $table->string('chapter_name');
            $table->string('teacher_name');
            $table->text('note');
            $table->string('type')->nullable();
            $table->decimal('score', 5, 2)->nullable();
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
        Schema::dropIfExists('assessment_records');
    }
}
