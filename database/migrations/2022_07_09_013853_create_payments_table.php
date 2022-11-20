<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('union')->nullable();
            $table->string('trxId')->nullable();
            $table->string('sonodId')->nullable();
            $table->string('sonod_type')->nullable();
            $table->string('amount')->nullable();
            $table->string('applicant_mobile')->nullable();
            $table->string('status')->nullable();
            $table->string('balance')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
