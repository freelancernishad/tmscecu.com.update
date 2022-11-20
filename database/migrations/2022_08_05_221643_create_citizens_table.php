<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('unioun_name')->nullable();
            $table->string('name')->nullable();
            $table->string('fathername')->nullable();
            $table->string('mothername')->nullable();
            $table->string('word')->nullable();
            $table->string('vill')->nullable();
            $table->string('post')->nullable();
            $table->string('thana')->nullable();
            $table->string('district')->nullable();
            $table->string('nidno')->nullable();
            $table->string('dobno')->nullable();
            $table->string('dob')->nullable();
            $table->string('holding')->nullable();
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
        Schema::dropIfExists('citizens');
    }
}
