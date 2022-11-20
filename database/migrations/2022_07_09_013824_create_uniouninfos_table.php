<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniouninfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uniouninfos', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('short_name_e')->nullable();
            $table->string('short_name_b')->nullable();
            $table->string('thana')->nullable();
            $table->string('district')->nullable();
            $table->longText('web_logo')->nullable();
            $table->longText('sonod_logo')->nullable();
            $table->string('c_signture')->nullable();
            $table->string('c_name')->nullable();
            $table->longText('u_image')->nullable();
            $table->longText('u_description')->nullable();
            $table->longText('u_notice')->nullable();
            $table->string('u_code')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('google_map')->nullable();
            $table->string('defaultColor')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('uniouninfos');
    }
}
