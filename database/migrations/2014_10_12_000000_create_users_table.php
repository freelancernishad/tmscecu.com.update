<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('unioun')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('position')->nullable();
            $table->string('full_unioun_name')->nullable();
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->string('gram')->nullable();
            $table->string('word')->nullable();
            $table->string('description')->nullable();
            $table->longText('image')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->default(0);




            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
