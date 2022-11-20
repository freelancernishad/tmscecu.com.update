<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charages', function (Blueprint $table) {
            $table->id();
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->string('vat')->nullable();
            $table->string('tax')->nullable();
            $table->string('service')->nullable();
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
        Schema::dropIfExists('charages');
    }
}
