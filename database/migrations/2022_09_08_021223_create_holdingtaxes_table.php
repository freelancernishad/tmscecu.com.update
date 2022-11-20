<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoldingtaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holdingtaxes', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('unioun');
            $table->string('holding_no');
            $table->string('maliker_name');
            $table->string('father_or_samir_name');
            $table->string('gramer_name');
            $table->string('word_no');
            $table->string('nid_no');
            $table->string('mobile_no');
            $table->string('griher_barsikh_mullo');
            $table->string('barsikh_muller_percent');
            $table->string('jomir_vara');
            $table->string('total_mullo');
            $table->string('rokhona_bekhon_khoroch');
            $table->string('prakklito_mullo');
            $table->string('reyad');
            $table->string('angsikh_prodoy_korjoggo_barsikh_mullo');
            $table->string('barsikh_vara');
            $table->string('rokhona_bekhon_khoroch_percent');
            $table->string('prodey_korjoggo_barsikh_mullo');
            $table->string('prodey_korjoggo_barsikh_varar_mullo');
            $table->string('total_prodey_korjoggo_barsikh_mullo');
            $table->string('current_year_kor');
            $table->string('bokeya');
            $table->longText('total_bokeya');
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
        Schema::dropIfExists('holdingtaxes');
    }
}
