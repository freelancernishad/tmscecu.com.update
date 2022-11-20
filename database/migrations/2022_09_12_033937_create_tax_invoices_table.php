<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoiceId')->nullable();
            $table->string('holdingTax_id')->nullable();
            $table->string('PayYear')->nullable();
            $table->string('totalAmount')->nullable();
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
        Schema::dropIfExists('tax_invoices');
    }
}
