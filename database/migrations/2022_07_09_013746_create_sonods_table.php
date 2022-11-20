<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSonodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sonods', function (Blueprint $table) {
            $table->id();
            $table->string('unioun_name')->nullable();
            $table->string('year')->nullable();
            $table->string('sonod_Id')->nullable();
            $table->longText('image')->nullable();
            $table->string('sonod_name')->nullable();
            $table->string('successor_father_name')->nullable();
            $table->string('successor_mother_name')->nullable();
            $table->string('successor_father_alive_status')->nullable();
            $table->string('successor_mother_alive_status')->nullable();
            $table->string('applicant_holding_tax_number')->nullable();
            $table->string('applicant_national_id_number')->nullable();
            $table->string('applicant_birth_certificate_number')->nullable();
            $table->string('applicant_passport_number')->nullable();
            $table->string('applicant_date_of_birth')->nullable();

            $table->string('family_name')->nullable();
            $table->string('Annual_income')->nullable();
            $table->string('Subject_to_permission')->nullable();
            $table->string('disabled')->nullable();
            $table->string('The_subject_of_the_certificate')->nullable();
            $table->string('Name_of_the_transferred_area')->nullable();
            $table->string('applicant_second_name')->nullable();

            $table->string('applicant_owner_type')->nullable();
            $table->string('applicant_name_of_the_organization')->nullable();
            $table->string('organization_address')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('utname')->nullable();
            $table->string('applicant_gender')->nullable();
            $table->string('applicant_marriage_status')->nullable();
            $table->string('applicant_vat_id_number')->nullable();
            $table->string('applicant_tax_id_number')->nullable();
            $table->string('applicant_type_of_business')->nullable();
            $table->string('applicant_father_name')->nullable();
            $table->string('applicant_mother_name')->nullable();
            $table->string('applicant_occupation')->nullable();
            $table->string('applicant_education')->nullable();
            $table->string('applicant_religion')->nullable();
            $table->string('applicant_resident_status')->nullable();
            $table->string('applicant_present_village')->nullable();
            $table->string('applicant_present_road_block_sector')->nullable();
            $table->string('applicant_present_word_number')->nullable();
            $table->string('applicant_present_district')->nullable();
            $table->string('applicant_present_Upazila')->nullable();
            $table->string('applicant_present_post_office')->nullable();
            $table->string('applicant_permanent_village')->nullable();
            $table->string('applicant_permanent_road_block_sector')->nullable();
            $table->string('applicant_permanent_word_number')->nullable();
            $table->string('applicant_permanent_district')->nullable();
            $table->string('applicant_permanent_Upazila')->nullable();
            $table->string('applicant_permanent_post_office')->nullable();
            $table->longText('successor_list')->nullable();
            $table->string('khat')->nullable();
            $table->string('last_years_money')->nullable();
            $table->string('currently_paid_money')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('amount_deails')->nullable();
            $table->string('the_amount_of_money_in_words')->nullable();
            $table->string('applicant_mobile')->nullable();
            $table->string('applicant_email')->nullable();
            $table->string('applicant_phone')->nullable();
            $table->string('applicant_national_id_front_attachment')->nullable();
            $table->string('applicant_national_id_back_attachment')->nullable();
            $table->string('applicant_birth_certificate_attachment')->nullable();
            $table->text('prottoyon')->nullable();
            $table->text('sec_prottoyon')->nullable();
            $table->string('stutus')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('chaireman_name')->nullable();
            $table->longText('chaireman_sign')->nullable();


            $table->string('cancedby')->nullable();
            $table->string('cancedbyUserid')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sonods');
    }
}
