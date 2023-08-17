<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentId');
            $table->string('sl');
            $table->string('token');
            $table->string('group');
            $table->string('academic_year');
            $table->string('roll');
            $table->integer('year');
            $table->string('sscRoll')->nullable();
            $table->string('sscReg')->nullable();
            $table->string('sscGpa')->nullable();
            $table->date('dateOfBirth');
            $table->string('fatherName');
            $table->string('motherName');
            $table->string('division');
            $table->string('district');
            $table->string('upazila');
            $table->string('union');
            $table->string('post_office');
            $table->string('StudentAddress');
            $table->string('status');
            $table->string('paymentStatus');
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
        Schema::dropIfExists('tc');
    }
}
