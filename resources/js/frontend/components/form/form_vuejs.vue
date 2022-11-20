<template>
    <div>
        <b-form @submit.stop.prevent="onSubmit">
            <div class="panel-heading"
                style="font-weight: bold; font-size: 15px;background:#159513;text-align:center;color:white">{{
                        sonodnamedata.bnname
                }}
            </div>
            <div class="form-pannel">
                <input type="hidden" v-model="form.unioun_name = getUnion">
                <!-- <input type="text" v-model="form.sonod_Id"> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="app-heading">আবেদনকারীর তথ্য</div>
                    </div>
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_name-group-1" label="আবেদনকারীর নাম*" label-for="applicant_name">
                            <b-form-input id="applicant_name" name="applicant_name"
                                v-model="$v.form.applicant_name.$model" :state="validateState('applicant_name')"
                                aria-describedby="applicant_name-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_name-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.enname == 'Certification of the same name'">
                        <b-form-group id="applicant_second_name-group-1" label="আবেদনকারীর দ্বিতীয় নাম"
                            label-for="applicant_second_name">
                            <b-form-input id="applicant_second_name" name="applicant_second_name"
                                v-model="$v.form.applicant_second_name.$model"
                                :state="validateState('applicant_second_name')"
                                aria-describedby="applicant_second_name-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_second_name-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_gender-group-1" label="লিঙ্গ" label-for="applicant_gender">
                            <b-form-select id="applicant_gender" name="applicant_gender" :options="applicant_genders"
                                v-model="$v.form.applicant_gender.$model" :state="validateState('applicant_gender')"
                                aria-describedby="applicant_gender-feedback"></b-form-select>
                            <b-form-invalid-feedback id="applicant_gender-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_father_name-group-1" label="আবেদনকারীর পিতা/স্বামীর নাম (বাংলায়)"
                            label-for="applicant_father_name">
                            <b-form-input id="applicant_father_name" name="applicant_father_name"
                                v-model="$v.form.applicant_father_name.$model"
                                :state="validateState('applicant_father_name')"
                                aria-describedby="applicant_father_name-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_father_name-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="successor_father_alive_status-group-1" label=" আবেদনকারীর পিতা জীবিত কিনা"
                            label-for="successor_father_alive_status">
                            <b-form-select id="successor_father_alive_status" name="successor_father_alive_status"
                                :options="alives" v-model="$v.form.successor_father_alive_status.$model"
                                :state="validateState('successor_father_alive_status')"
                                aria-describedby="successor_father_alive_status-feedback"></b-form-select>
                            <b-form-invalid-feedback id="successor_father_alive_status-feedback">This is a required
                                field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_mother_name-group-1" label="আবেদনকারীর মাতার নাম (বাংলায়)"
                            label-for="applicant_mother_name">
                            <b-form-input id="applicant_mother_name" name="applicant_mother_name"
                                v-model="$v.form.applicant_mother_name.$model"
                                :state="validateState('applicant_mother_name')"
                                aria-describedby="applicant_mother_name-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_mother_name-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="successor_mother_alive_status-group-1" label="আবেদনকারীর মাতা জীবিত কিনা"
                            label-for="successor_mother_alive_status">
                            <b-form-select id="successor_mother_alive_status" name="successor_mother_alive_status"
                                :options="alives" v-model="$v.form.successor_mother_alive_status.$model"
                                :state="validateState('successor_mother_alive_status')"
                                aria-describedby="successor_mother_alive_status-feedback"></b-form-select>
                            <b-form-invalid-feedback id="successor_mother_alive_status-feedback">This is a required
                                field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_national_id_number-group-1" label="ন্যাশনাল আইডি (ইংরেজিতে)"
                            label-for="applicant_national_id_number">
                            <b-form-input id="applicant_national_id_number" type="text" @keydown="portKeydown($event)"
                                name="applicant_national_id_number"
                                v-model="$v.form.applicant_national_id_number.$model"
                                :state="validateState('applicant_national_id_number')"
                                aria-describedby="applicant_national_id_number-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_national_id_number-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_birth_certificate_number-group-1"
                            label="জন্ম নিবন্ধন নং ( ইংরেজিতে )" label-for="applicant_birth_certificate_number">
                            <b-form-input id="applicant_birth_certificate_number" type="text"
                                @keydown="portKeydown($event)" name="applicant_birth_certificate_number"
                                v-model="$v.form.applicant_birth_certificate_number.$model"
                                :state="validateState('applicant_birth_certificate_number')"
                                aria-describedby="applicant_birth_certificate_number-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_birth_certificate_number-feedback">This is a required
                                field</b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_holding_tax_number-group-1" label="হোল্ডিং নং (ইংরেজিতে)"
                            label-for="applicant_holding_tax_number">
                            <b-form-input id="applicant_holding_tax_number" name="applicant_holding_tax_number"
                                type="text" @keydown="portKeydown($event)"
                                v-model="$v.form.applicant_holding_tax_number.$model"
                                :state="validateState('applicant_holding_tax_number')"
                                aria-describedby="applicant_holding_tax_number-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_holding_tax_number-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_date_of_birth-group-1" label="জম্ম তারিখ"
                            label-for="applicant_date_of_birth">
                            <b-input-group>
                                <b-form-input id="applicant_date_of_birth"
                                    v-model="$v.form.applicant_date_of_birth.$model"
                                    :state="validateState('applicant_date_of_birth')" type="text"
                                    placeholder="YYYY-MM-DD" autocomplete="off"></b-form-input>
                                <b-input-group-append>
                                    <b-form-datepicker v-model="$v.form.applicant_date_of_birth.$model"
                                        :state="validateState('applicant_date_of_birth')" button-only right
                                        locale="en-US" aria-controls="applicant_date_of_birth"></b-form-datepicker>
                                </b-input-group-append>
                            </b-input-group>
                            <b-form-invalid-feedback id="applicant_date_of_birth-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.enname == 'Family certificate'">
                        <b-form-group id="family_name-group-1" label="বংশের নাম" label-for="family_name">
                            <b-input-group>
                                <b-form-input id="family_name" v-model="$v.form.family_name.$model"
                                    :state="validateState('family_name')" type="text" autocomplete="off"></b-form-input>
                            </b-input-group>
                            <b-form-invalid-feedback id="family_name-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4"
                        v-if="sonodnamedata.enname == 'Certificate of annual income' || sonodnamedata.enname == 'Parents Income Certificate'">
                        <b-form-group id="Annual_income-group-1" label="বার্ষিক আয়" label-for="Annual_income">
                            <b-input-group>
                                <b-form-input id="Annual_income" v-model="$v.form.Annual_income.$model"
                                    :state="validateState('Annual_income')" type="text" autocomplete="off">
                                </b-form-input>
                            </b-input-group>
                            <b-form-invalid-feedback id="Annual_income-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.enname == 'permit'">
                        <b-form-group id="Subject_to_permission-group-1" label="অনুমতি এর বিষয়"
                            label-for="Subject_to_permission">
                            <b-input-group>
                                <b-form-input id="Subject_to_permission" v-model="$v.form.Subject_to_permission.$model"
                                    :state="validateState('Subject_to_permission')" type="text" autocomplete="off">
                                </b-form-input>
                            </b-input-group>
                            <b-form-invalid-feedback id="Subject_to_permission-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.bnname == 'প্রতিবন্ধী সনদপত্র'">
                        <b-form-group id="disabled-group-1" label="প্রতিবন্ধী" label-for="disabled">
                            <b-input-group>
                                <b-form-select :options="disableds" id="disabled" v-model="$v.form.disabled.$model"
                                    :state="validateState('disabled')" type="text" autocomplete="off"></b-form-select>
                            </b-input-group>
                            <b-form-invalid-feedback id="disabled-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4"
                        v-if="sonodnamedata.enname == 'No Objection Letter to Transfer of Constituency'">
                        <b-form-group id="Name_of_the_transferred_area-group-1" label="স্থানান্তরিত এলাকার নাম"
                            label-for="Name_of_the_transferred_area">
                            <b-input-group>
                                <b-form-input id="Name_of_the_transferred_area"
                                    v-model="$v.form.Name_of_the_transferred_area.$model"
                                    :state="validateState('Name_of_the_transferred_area')" type="text"
                                    autocomplete="off"></b-form-input>
                            </b-input-group>
                            <b-form-invalid-feedback id="Name_of_the_transferred_area-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.enname == 'Certificate'">
                        <b-form-group id="The_subject_of_the_certificate-group-1" label="প্রত্যয়নপত্র এর বিষয়"
                            label-for="The_subject_of_the_certificate">
                            <b-input-group>
                                <b-form-input id="The_subject_of_the_certificate"
                                    v-model="$v.form.The_subject_of_the_certificate.$model"
                                    :state="validateState('The_subject_of_the_certificate')" type="text"
                                    autocomplete="off"></b-form-input>
                            </b-input-group>
                            <b-form-invalid-feedback id="The_subject_of_the_certificate-feedback">This is a required
                                field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                </div>
                <div class="row">
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.enname != 'Certificate of Inheritance'">
                        <b-form-group id="image-group-1" label="ছবি" label-for="image">
                            <b-form-file id="image" name="image" :state="validateState('image')"
                                @change="FileSelected($event, 'image')" aria-describedby="image-feedback">
                            </b-form-file>
                            <b-img thumbnail fluid v-if="form.image != null" :src="form.image" alt="Image 3"></b-img>
                            <b-form-invalid-feedback id="image-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.enname == 'Trade license'">
                        <b-form-group id="applicant_owner_type-group-1" label="প্রতিষ্ঠানের মালিকানার ধরণ *"
                            label-for="applicant_owner_type">
                            <b-form-select id="applicant_owner_type" name="applicant_owner_type" class="form-control"
                                v-model="$v.form.applicant_owner_type.$model"
                                :state="validateState('applicant_owner_type')"
                                aria-describedby="applicant_owner_type-feedback" :options="applicant_owner_typees">
                            </b-form-select>
                            <b-form-invalid-feedback id="applicant_owner_type-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4 d-none">
                        <b-form-group id="sonod_name-group-1" label="সেবার ধরণ" label-for="sonod_name">
                            <b-form-select id="sonod_name" name="sonod_name" class="form-control"
                                v-model="$v.form.sonod_name.$model" :state="validateState('sonod_name')"
                                aria-describedby="sonod_name-feedback" disabled>
                                <!-- This slot appears above the options from 'options' prop -->
                                <template #first>
                                    <b-form-select-option :value="null" disabled>-- Please select an option --
                                    </b-form-select-option>
                                </template>
                                <!-- These options will appear after the ones from 'options' prop -->
                                <b-form-select-option v-for="(sName, index) in SonodNames" :value="sName.bnname"
                                    :key="index">{{ sName.bnname }}</b-form-select-option>
                            </b-form-select>
                            <b-form-invalid-feedback id="sonod_name-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_passport_number-group-1" label="পাসপোর্ট নং ( ইংরেজিতে )"
                            label-for="applicant_passport_number">
                            <b-form-input id="applicant_passport_number" name="applicant_passport_number"
                                v-model="$v.form.applicant_passport_number.$model"
                                :state="validateState('applicant_passport_number')"
                                aria-describedby="applicant_passport_number-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_passport_number-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.enname == 'Certificate of Inheritance'">
                        <b-form-group id="utname-group-1" label="মৃত ব্যাক্তির নাম *" label-for="utname">
                            <b-form-input id="utname" name="utname" v-model="$v.form.utname.$model"
                                :state="validateState('utname')" aria-describedby="utname-feedback"></b-form-input>
                            <b-form-invalid-feedback id="utname-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.enname == 'Trade license'">
                        <b-form-group id="applicant_name_of_the_organization-group-1"
                            label="প্রতিষ্ঠানের নাম (বাংলায়) *" label-for="applicant_name_of_the_organization">
                            <b-form-input id="applicant_name_of_the_organization"
                                name="applicant_name_of_the_organization"
                                v-model="$v.form.applicant_name_of_the_organization.$model"
                                :state="validateState('applicant_name_of_the_organization')"
                                aria-describedby="applicant_name_of_the_organization-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_name_of_the_organization-feedback">This is a required
                                field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_marriage_status-group-1" label="বৈবাহিক সম্পর্ক"
                            label-for="applicant_marriage_status">
                            <b-form-select id="applicant_marriage_status" name="applicant_marriage_status"
                                :options="applicant_marriage_status_options"
                                v-model="$v.form.applicant_marriage_status.$model"
                                :state="validateState('applicant_marriage_status')"
                                aria-describedby="applicant_marriage_status-feedback"></b-form-select>
                            <b-form-invalid-feedback id="applicant_marriage_status-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_occupation-group-1" label="পেশা" label-for="applicant_occupation">
                            <b-form-input id="applicant_occupation" name="applicant_occupation"
                                v-model="$v.form.applicant_occupation.$model"
                                :state="validateState('applicant_occupation')"
                                aria-describedby="applicant_occupation-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_occupation-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_education-group-1" label="শিক্ষাগত যোগ্যতা"
                            label-for="applicant_education">
                            <b-form-input id="applicant_education" name="applicant_education"
                                v-model="$v.form.applicant_education.$model"
                                :state="validateState('applicant_education')"
                                aria-describedby="applicant_education-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_education-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_religion-group-1" label="ধর্ম" label-for="applicant_religion">
                            <b-form-select id="applicant_religion" name="applicant_religion"
                                :options="applicant_religions" v-model="$v.form.applicant_religion.$model"
                                :state="validateState('applicant_religion')"
                                aria-describedby="applicant_religion-feedback">
                            </b-form-select>
                            <b-form-invalid-feedback id="applicant_religion-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.enname == 'Trade license'">
                        <b-form-group id="applicant_vat_id_number-group-1" label="ভ্যাট আইডি (যদি থাকে)"
                            label-for="applicant_vat_id_number">
                            <b-form-input id="applicant_vat_id_number" name="applicant_vat_id_number"
                                v-model="$v.form.applicant_vat_id_number.$model"
                                :state="validateState('applicant_vat_id_number')"
                                aria-describedby="applicant_vat_id_number-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_vat_id_number-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.enname == 'Trade license'">
                        <b-form-group id="applicant_tax_id_number-group-1" label="ট্যাক্স আইডি (যদি থাকে)"
                            label-for="applicant_tax_id_number">
                            <b-form-input id="applicant_tax_id_number" name="applicant_tax_id_number"
                                v-model="$v.form.applicant_tax_id_number.$model"
                                :state="validateState('applicant_tax_id_number')"
                                aria-describedby="applicant_tax_id_number-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_tax_id_number-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4" v-if="sonodnamedata.enname == 'Trade license'">
                        <b-form-group id="applicant_type_of_business-group-1" label="ব্যবসার ধরন (বাংলায়) *"
                            label-for="applicant_type_of_business">
                            <b-form-input id="applicant_type_of_business" name="applicant_type_of_business"
                                v-model="$v.form.applicant_type_of_business.$model"
                                :state="validateState('applicant_type_of_business')"
                                aria-describedby="applicant_type_of_business-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_type_of_business-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_resident_status-group-1" label="বাসিন্দা"
                            label-for="applicant_resident_status">
                            <b-form-select id="applicant_resident_status" name="applicant_resident_status"
                                v-model="$v.form.applicant_resident_status.$model"
                                :state="validateState('applicant_resident_status')"
                                :options="applicant_resident_status_options"
                                aria-describedby="applicant_resident_status-feedback"></b-form-select>
                            <b-form-invalid-feedback id="applicant_resident_status-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-12" v-if="sonodnamedata.enname != 'Trade license'">
                        <b-form-group id="prottoyon-group-1" label="আবেদনকৃত প্রত্যয়নের বিবরণ উল্লেখ করুন"
                            label-for="prottoyon">
                            <b-form-textarea id="prottoyon" name="prottoyon" v-model="$v.form.prottoyon.$model"
                                :state="validateState('prottoyon')" rows="3" max-rows="6"
                                aria-describedby="prottoyon-feedback"></b-form-textarea>
                            <b-form-invalid-feedback id="prottoyon-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="app-heading">বর্তমান ঠিকানা</div>
                        <div class="col-md-12">
                        </div>
                        <b-form-group id="applicant_present_village-group-1" label="গ্রাম/মহল্লা"
                            label-for="applicant_present_village">
                            <b-form-input id="applicant_present_village" name="applicant_present_village"
                                v-model="$v.form.applicant_present_village.$model"
                                :state="validateState('applicant_present_village')"
                                aria-describedby="applicant_present_village-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_present_village-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group id="applicant_present_road_block_sector-group-1" label="রোড/ব্লক/সেক্টর"
                            label-for="applicant_present_road_block_sector">
                            <b-form-input id="applicant_present_road_block_sector"
                                name="applicant_present_road_block_sector"
                                v-model="$v.form.applicant_present_road_block_sector.$model"
                                :state="validateState('applicant_present_road_block_sector')"
                                aria-describedby="applicant_present_road_block_sector-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_present_road_block_sector-feedback">This is a
                                required field</b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group id="applicant_present_word_number-group-1" label="ওয়ার্ড নং"
                            label-for="applicant_present_word_number">
                            <b-form-input id="applicant_present_word_number" name="applicant_present_word_number"
                                v-model="$v.form.applicant_present_word_number.$model"
                                :state="validateState('applicant_present_word_number')"
                                aria-describedby="applicant_present_word_number-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_present_word_number-feedback">This is a required
                                field</b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group id="applicant_present_district-group-1" label="জেলা"
                            label-for="applicant_present_district">
                            <b-form-input id="applicant_present_district" name="applicant_present_district"
                                v-model="$v.form.applicant_present_district.$model"
                                :state="validateState('applicant_present_district')"
                                aria-describedby="applicant_present_district-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_present_district-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group id="applicant_present_Upazila-group-1" label="উপজেলা/থানা"
                            label-for="applicant_present_Upazila">
                            <b-form-input id="applicant_present_Upazila" name="applicant_present_Upazila"
                                v-model="$v.form.applicant_present_Upazila.$model"
                                :state="validateState('applicant_present_Upazila')"
                                aria-describedby="applicant_present_Upazila-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_present_Upazila-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group id="applicant_present_post_office-group-1" label="পোষ্ট অফিস"
                            label-for="applicant_present_post_office">
                            <b-form-input id="applicant_present_post_office" name="applicant_present_post_office"
                                v-model="$v.form.applicant_present_post_office.$model"
                                :state="validateState('applicant_present_post_office')"
                                aria-describedby="applicant_present_post_office-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_present_post_office-feedback">This is a required
                                field</b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <div class="col-md-6">
                        <div class="app-heading">স্থায়ী ঠিকানা</div>
                        <div class="col-md-12">
                            <input type="checkbox" id="checkbox" v-model="sameStatus" @change="sameAddress"> <label
                                for="checkbox"> বর্তমান ঠিকানা ও স্থায়ী ঠিকানা একই হলে</label>
                        </div>
                        <b-form-group id="applicant_permanent_village-group-1" label="গ্রাম/মহল্লা"
                            label-for="applicant_permanent_village">
                            <b-form-input id="applicant_permanent_village" name="applicant_permanent_village"
                                v-model="$v.form.applicant_permanent_village.$model"
                                :state="validateState('applicant_permanent_village')"
                                aria-describedby="applicant_permanent_village-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_permanent_village-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group id="applicant_permanent_road_block_sector-group-1" label="রোড/ব্লক/সেক্টর"
                            label-for="applicant_permanent_road_block_sector">
                            <b-form-input id="applicant_permanent_road_block_sector"
                                name="applicant_permanent_road_block_sector"
                                v-model="$v.form.applicant_permanent_road_block_sector.$model"
                                :state="validateState('applicant_permanent_road_block_sector')"
                                aria-describedby="applicant_permanent_road_block_sector-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_permanent_road_block_sector-feedback">This is a
                                required field</b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group id="applicant_permanent_word_number-group-1" label="ওয়ার্ড নং"
                            label-for="applicant_permanent_word_number">
                            <b-form-input id="applicant_permanent_word_number" name="applicant_permanent_word_number"
                                v-model="$v.form.applicant_permanent_word_number.$model"
                                :state="validateState('applicant_permanent_word_number')"
                                aria-describedby="applicant_permanent_word_number-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_permanent_word_number-feedback">This is a required
                                field</b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group id="applicant_permanent_district-group-1" label="জেলা"
                            label-for="applicant_permanent_district">
                            <b-form-input id="applicant_permanent_district" name="applicant_permanent_district"
                                v-model="$v.form.applicant_permanent_district.$model"
                                :state="validateState('applicant_permanent_district')"
                                aria-describedby="applicant_permanent_district-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_permanent_district-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group id="applicant_permanent_Upazila-group-1" label="উপজেলা/থানা"
                            label-for="applicant_permanent_Upazila">
                            <b-form-input id="applicant_permanent_Upazila" name="applicant_permanent_Upazila"
                                v-model="$v.form.applicant_permanent_Upazila.$model"
                                :state="validateState('applicant_permanent_Upazila')"
                                aria-describedby="applicant_permanent_Upazila-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_permanent_Upazila-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                        <b-form-group id="applicant_permanent_post_office-group-1" label="পোষ্ট অফিস"
                            label-for="applicant_permanent_post_office">
                            <b-form-input id="applicant_permanent_post_office" name="applicant_permanent_post_office"
                                v-model="$v.form.applicant_permanent_post_office.$model"
                                :state="validateState('applicant_permanent_post_office')"
                                aria-describedby="applicant_permanent_post_office-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_permanent_post_office-feedback">This is a required
                                field</b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="app-heading"> যোগাযোগের ঠিকানা</div>
                    </div>
                    <div class="col-md-6">
                        <b-form-group id="applicant_mobile-group-1" label="মোবাইল" label-for="applicant_mobile">
                            <b-form-input id="applicant_mobile" name="applicant_mobile" maxlength=11
                                v-model="$v.form.applicant_mobile.$model" :state="validateState('applicant_mobile')"
                                aria-describedby="applicant_mobile-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_mobile-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <div class="col-md-6">
                        <b-form-group id="applicant_email-group-1" label="ইমেল" label-for="applicant_email">
                            <b-form-input id="applicant_email" name="applicant_email"
                                v-model="$v.form.applicant_email.$model" :state="validateState('applicant_email')"
                                aria-describedby="applicant_email-feedback"></b-form-input>
                            <b-form-invalid-feedback id="applicant_email-feedback">This is a required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <div class="col-md-12">
                        <div class="app-heading"> Attachment</div>
                    </div>
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_national_id_front_attachment-group-1"
                            label="জাতীয় পরিচয়পত্র (Front page)" label-for="applicant_national_id_front_attachment">
                            <b-form-file id="applicant_national_id_front_attachment"
                                name="applicant_national_id_front_attachment"
                                :state="validateState('applicant_national_id_front_attachment')"
                                @change="FileSelected($event, 'applicant_national_id_front_attachment')"
                                aria-describedby="applicant_national_id_front_attachment-feedback">
                            </b-form-file>
                            <b-img thumbnail fluid v-if="form.applicant_national_id_front_attachment != null"
                                :src="form.applicant_national_id_front_attachment" alt="Image 3"></b-img>
                            <b-form-invalid-feedback id="applicant_national_id_front_attachment-feedback">This is a
                                required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_national_id_back_attachment-group-1"
                            label="জাতীয় পরিচয়পত্র (Back page)" label-for="applicant_national_id_back_attachment">
                            <b-form-file id="applicant_national_id_back_attachment"
                                name="applicant_national_id_back_attachment"
                                :state="validateState('applicant_national_id_back_attachment')"
                                @change="FileSelected($event, 'applicant_national_id_back_attachment')"
                                aria-describedby="applicant_national_id_back_attachment-feedback">
                            </b-form-file>
                            <b-img thumbnail fluid v-if="form.applicant_national_id_back_attachment != null"
                                :src="form.applicant_national_id_back_attachment" alt="Image 3"></b-img>
                            <b-form-invalid-feedback id="applicant_national_id_back_attachment-feedback">This is a
                                required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <b-form-group id="applicant_birth_certificate_attachment-group-1" label="জন্ম নিবন্ধন"
                            label-for="applicant_birth_certificate_attachment">
                            <b-form-file id="applicant_birth_certificate_attachment"
                                name="applicant_birth_certificate_attachment"
                                :state="validateState('applicant_birth_certificate_attachment')"
                                @change="FileSelected($event, 'applicant_birth_certificate_attachment')"
                                aria-describedby="applicant_birth_certificate_attachment-feedback">
                            </b-form-file>
                            <b-img thumbnail fluid v-if="form.applicant_birth_certificate_attachment != null"
                                :src="form.applicant_birth_certificate_attachment" alt="Image 3"></b-img>
                            <b-form-invalid-feedback id="applicant_birth_certificate_attachment-feedback">This is a
                                required field
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </div>
                    <!-- col-md-4 -->
                </div>
                <div class="app-heading"
                    v-if="sonodnamedata.bnname == 'ওয়ারিশ সনদ' || sonodnamedata.bnname == 'উত্তরাধিকারী সনদ'">ওয়ারিশগনের
                    তালিকা
                </div>
                <table class="table"
                    v-if="sonodnamedata.bnname == 'ওয়ারিশ সনদ' || sonodnamedata.bnname == 'উত্তরাধিকারী সনদ'">
                    <tr>
                        <th>নাম</th>
                        <th>সম্পর্ক</th>
                        <th>জন্ম তারিখ</th>
                        <th>জাতীয় পরিচয়পত্র নাম্বার/জন্মনিবন্ধন নাম্বার</th>
                        <th><button type="button" class="flex justify-start btn btn-info" @click="addMore()">Add
                                More</button></th>
                    </tr>
                    <tr v-for="(successor, index) in form.successors" :key="index">
                        <input type="hidden" v-model="successor.w_id = index">
                        <th><input v-model="successor.w_name" placeholder="নাম" class="form-control" /></th>
                        <th>
                            <select v-model="successor.w_relation" class="form-control">
                                <option value="">সম্পর্ক</option>
                                <option>বাবা</option>
                                <option>মা</option>
                                <option>ভাই</option>
                                <option>বোন</option>
                                <option>দাদা</option>
                                <option>দাদি</option>
                                <option>নানা</option>
                                <option>নানি</option>
                                <option>চাচা</option>
                                <option>চাচি</option>
                                <option>ফুপা</option>
                                <option>ফুপি</option>
                                <option>মামা</option>
                                <option>মামি</option>
                                <option>খালা</option>
                                <option>খালু</option>
                            </select>
                            <!-- <input v-model="successor.w_relation" placeholder="সম্পর্ক" class="form-control" /> -->
                        </th>
                        <th><input v-model="successor.w_age" type="date" placeholder="জন্ম তারিখ"
                                class="form-control" /></th>
                        <th><input v-model="successor.w_nid" type="text" @keydown="portKeydown($event)"
                                placeholder="জাতীয় পরিচয়পত্র নাম্বার/জন্মনিবন্ধন নাম্বার" class="form-control" /></th>
                        <th><button type="button" class="ml-2 btn btn-danger" @click="remove(index)"
                                v-show="index != 0">Remove</button></th>
                    </tr>
                </table>
                <!--
            <b-form-group id="example-input-group-2" label="Food" label-for="example-input-2">
                <b-form-select id="example-input-2" name="example-input-2" v-model="$v.form.food.$model"
                    :options="foods" :state="validateState('food')" aria-describedby="input-2-live-feedback">
                </b-form-select>
                <b-form-invalid-feedback id="input-2-live-feedback">This is a required field.</b-form-invalid-feedback>
            </b-form-group> -->
                <b-button type="submit" variant="primary">Submit</b-button>
                <b-button class="ml-2" @click="resetForm()">Reset</b-button>
            </div>
        </b-form>
        <!-- Info modal -->
        <b-modal :id="infoModal.id" size="xl" :title="infoModal.title" ok-only ok-disabled no-close-on-esc
            no-close-on-backdrop>
            <div class="row">
                <div class="col-md-12">
                    <div class="app-heading">আবেদনকারীর তথ্য</div>
                </div>
                <div class="col-md-4 mt-3"></div>
                <div class="col-md-4 mt-3"><img width="100%" :src="form.image" alt=""></div>
                <div class="col-md-4 mt-3"></div>
                <div class="col-md-4 col-6 mt-3"><b>আবেদনকারীর নাম : </b>{{ form.applicant_name }}</div>
                <div class="col-md-4 col-6 mt-3" v-if="sonodnamedata.enname == 'Certification of the same name'">
                    <b>আবেদনকারীর দ্বিতীয় নাম : </b>{{ form.applicant_second_name }}</div>
                <div class="col-md-4 col-6 mt-3"><b>লিঙ্গ : </b>{{ form.applicant_gender }}</div>
                <div class="col-md-4 col-6 mt-3"><b>আবেদনকারীর পিতা/স্বামীর নাম : </b>{{ form.applicant_father_name }}
                </div>
                <div class="col-md-4 col-6 mt-3"><b>আবেদনকারীর পিতা জীবিত কিনা : </b>{{
                        form.successor_father_alive_status
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>আবেদনকারীর মাতার নাম : </b>{{ form.applicant_mother_name }}</div>
                <div class="col-md-4 col-6 mt-3"><b>আবেদনকারীর মাতা জীবিত কিনা : </b>{{
                        form.successor_mother_alive_status
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>ন্যাশনাল আইডি : </b>{{ form.applicant_national_id_number }}</div>
                <div class="col-md-4 col-6 mt-3"><b>জন্ম নিবন্ধন নং : </b>{{ form.applicant_birth_certificate_number }}
                </div>
                <div class="col-md-4 col-6 mt-3"><b>হোল্ডিং নং : </b>{{ form.applicant_holding_tax_number }}</div>
                <div class="col-md-4 col-6 mt-3"><b>জম্ম তারিখ : </b>{{ form.applicant_date_of_birth }}</div>
                <div class="col-md-4 col-6 mt-3" v-if="sonodnamedata.enname == 'Family certificate'"><b>বংশের নাম :
                    </b>{{ form.family_name }}</div>
                <div class="col-md-4 col-6 mt-3"
                    v-if="sonodnamedata.enname == 'Certificate of annual income' || sonodnamedata.enname == 'Parents Income Certificate'">
                    <b>বার্ষিক আয় : </b>{{ form.Annual_income }}</div>
                <div class="col-md-4 col-6 mt-3" v-if="sonodnamedata.enname == 'permit'"><b>অনুমতি এর বিষয় : </b>{{
                        form.Subject_to_permission
                }}</div>
                <div class="col-md-4 col-6 mt-3" v-if="sonodnamedata.bnname == 'প্রতিবন্ধী সনদপত্র'"><b>প্রতিবন্ধী :
                    </b>{{ form.disabled }}</div>
                <div class="col-md-4 col-6 mt-3"
                    v-if="sonodnamedata.enname == 'No Objection Letter to Transfer of Constituency'"><b>স্থানান্তরিত
                        এলাকার নাম : </b>{{ form.Name_of_the_transferred_area }}</div>
                <div class="col-md-4 col-6 mt-3" v-if="sonodnamedata.enname == 'Certificate'"><b>প্রত্যয়নপত্র এর বিষয় :
                    </b>{{ form.The_subject_of_the_certificate }}</div>
                <div class="col-md-4 col-6 mt-3"><b>পাসপোর্ট নং : </b>{{ form.applicant_passport_number }}</div>
                <div class="col-md-4 col-6 mt-3"><b>বৈবাহিক সম্পর্ক : </b>{{ form.applicant_marriage_status }}</div>
                <div class="col-md-4 col-6 mt-3"><b>পেশা: </b>{{ form.applicant_occupation }}</div>
                <div class="col-md-4 col-6 mt-3"><b>শিক্ষাগত যোগ্যতা: </b>{{ form.applicant_education }}</div>
                <div class="col-md-4 col-6 mt-3"><b>ধর্ম: </b>{{ form.applicant_religion }}</div>
                <div class="col-md-4 col-6 mt-3"><b>বাসিন্দা: </b>{{ form.applicant_resident_status }}</div>
                <div class="col-md-12 col-12 mt-3" v-if="form.sonod_name != 'ট্রেড লাইসেন্স'"><b>আবেদনকৃত প্রত্যয়নের
                        : <br> </b>{{ form.prottoyon }}</div>
                <div class="col-md-12">
                    <div class="app-heading">বর্তমান ঠিকানা</div>
                </div>
                <div class="col-md-4 col-6 mt-3"><b>গ্রাম/মহল্লা: </b>{{ form.applicant_present_village }}</div>
                <div class="col-md-4 col-6 mt-3"><b>রোড/ব্লক/সেক্টর: </b>{{ form.applicant_present_road_block_sector }}
                </div>
                <div class="col-md-4 col-6 mt-3"><b>ওয়ার্ড নং: </b>{{ form.applicant_present_word_number }}</div>
                <div class="col-md-4 col-6 mt-3"><b>জেলা: </b>{{ form.applicant_present_district }}</div>
                <div class="col-md-4 col-6 mt-3"><b>উপজেলা/থানা: </b>{{ form.applicant_present_Upazila }}</div>
                <div class="col-md-4 col-6 mt-3"><b>পোষ্ট অফিস: </b>{{ form.applicant_present_post_office }}</div>
                <div class="col-md-12">
                    <div class="app-heading">স্থায়ী ঠিকানা</div>
                </div>
                <div class="col-md-4 col-6 mt-3"><b>গ্রাম/মহল্লা: </b>{{ form.applicant_permanent_village }}</div>
                <div class="col-md-4 col-6 mt-3"><b>রোড/ব্লক/সেক্টর: </b>{{ form.applicant_permanent_road_block_sector
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>ওয়ার্ড নং: </b>{{ form.applicant_permanent_word_number }}</div>
                <div class="col-md-4 col-6 mt-3"><b>জেলা: </b>{{ form.applicant_permanent_district }}</div>
                <div class="col-md-4 col-6 mt-3"><b>উপজেলা/থানা: </b>{{ form.applicant_permanent_Upazila }}</div>
                <div class="col-md-4 col-6 mt-3"><b>পোষ্ট অফিস: </b>{{ form.applicant_permanent_post_office }}</div>
                <div class="col-md-12">
                    <div class="app-heading">যোগাযোগের ঠিকানা</div>
                </div>
                <div class="col-md-6 col-6 mt-3"><b>মোবাইল: </b>{{ form.applicant_mobile }}</div>
                <div class="col-md-6 col-6 mt-3"><b>ইমেল: </b>{{ form.applicant_email }}</div>
                <div class="col-md-12">
                    <div class="app-heading">Attachment</div>
                </div>
                <div class="col-md-4 col-6 mt-3"><span>ন্যাশনাল আইডি (Front page)</span> <br> <img width="100%"
                        :src="form.applicant_national_id_front_attachment" alt=""></div>
                <div class="col-md-4 col-6 mt-3"><span>ন্যাশনাল আইডি (Back page)</span> <br> <img width="100%"
                        :src="form.applicant_national_id_back_attachment" alt=""></div>
                <div class="col-md-4 col-6 mt-3"><span>জন্ম নিবন্ধন</span> <br> <img width="100%"
                        :src="form.applicant_birth_certificate_attachment" alt=""></div>
                <div class="col-md-12" v-if="form.sonod_name == 'ওয়ারিশ সনদ' || form.sonod_name == 'উত্তরাধিকারী সনদ'">
                    <div class="app-heading">ওয়ারিশগনের তালিকা </div>
                </div>
                <table class="table" v-if="form.sonod_name == 'ওয়ারিশ সনদ' || form.sonod_name == 'উত্তরাধিকারী সনদ'">
                    <tr>
                        <th>ক্রমিক</th>
                        <th>নাম</th>
                        <th>সম্পর্ক</th>
                        <th>জন্ম তারিখ</th>
                        <th>জাতীয় পরিচয়পত্র নাম্বার</th>
                    </tr>
                    <tr v-for="(ut, indexs) in form.successors" :key="'ut' + indexs">
                        <td>{{ ut.w_id }}</td>
                        <td>{{ ut.w_name }}</td>
                        <td>{{ ut.w_relation }}</td>
                        <td>{{ ut.w_age }}</td>
                        <td>{{ ut.w_nid }}</td>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <b-form @submit.stop.prevent="finalSubmit" style="margin-top: 50px;">
                <div class="text-center" style="width:50%;margin:0 auto" v-if="getunionInfos.payment_type == 'Prepaid'">
                    <h3>আপনার আবেদনটি সফল করার জন্য সনদের ফি প্রদান করুন । {{ sonodnamedata.bnname }} এর ফি {{
                            charages.totalamount
                    }} টাকা ।</h3>
                    <button type="submit" class="btn btn-info" v-if="!submitLoad">Pay And Submit</button>
                    <span class="btn btn-info" v-else-if="submitLoad">Please Wait...</span>
                    <button type="submit" class="btn btn-info" v-if="submitLoad">Try Again</button>
                </div>
                <div class="text-center" style="width:50%;margin:0 auto"
                    v-else-if="getunionInfos.payment_type == 'Postpaid'">
                    <h3>আপনার আবেদনটি সফল করার জন্য Confirm বাটন এ চাপ দিন</h3>
                    <button type="submit" class="btn btn-info" v-if="!submitLoad">Confirm</button>
                    <span class="btn btn-info" v-else-if="submitLoad">Please Wait...</span>
                </div>
            </b-form>
        </b-modal>
    </div>
</template>
<script>
import axios from 'axios';
// import { setTimeout } from "timers";
import { validationMixin } from "vuelidate";
import { required, minLength, maxLength } from "vuelidate/lib/validators";
import Datepick from './input.vue'
export default {
    mixins: [validationMixin],
    components: {
        Datepick,
    },
    data() {
        return {
            infoModal: {
                id: 'info-modal',
                title: '',
                content: '',
                content_id: '',
            },
            charages: {
                sonod_fee: 0,
                vatAmount: 0,
                taxAmount: 0,
                service: 0,
                totalamount: 0,
            },
            waitForPayment: false,
            submitLoad: false,
            sameStatus: '',
            sonodnamedata: {},
            SonodNamesOptions: {},
            applicant_religions: [
                { value: null, text: 'ধর্ম নির্বাচন করুন' },
                { value: 'ইসলাম', text: 'ইসলাম' },
                { value: 'হিন্দু', text: 'হিন্দু' },
                { value: 'বৌদ্ধ', text: 'বৌদ্ধ' },
                { value: 'খ্রিস্টান', text: 'খ্রিস্টান' },
                { value: 'অন্যান্য', text: 'অন্যান্য' },
            ],
            disableds: [
                { value: null, text: 'নির্বাচন করুন' },
                { value: 'শারীরিক', text: 'শারীরিক' },
                { value: 'দৃষ্টি', text: 'দৃষ্টি' },
                { value: 'শ্রবন', text: 'শ্রবন' },
                { value: 'বাক', text: 'বাক' },
                { value: 'বুদ্ধি', text: 'বুদ্ধি' },
                { value: 'বহুবিধ', text: 'বহুবিধ' },
            ],
            applicant_genders: [
                { value: null, text: 'লিঙ্গ নির্বাচন করুন' },
                { value: 'পুরুষ', text: 'পুরুষ' },
                { value: 'মহিলা', text: 'মহিলা' }
            ],
            applicant_marriage_status_options: [
                { value: null, text: 'বৈবাহিক সম্পর্ক নির্বাচন করুন' },
                { value: 'বিবাহিত', text: 'বিবাহিত' },
                { value: 'অবিবাহিত', text: 'অবিবাহিত' },
                { value: 'তালাক প্রাপ্ত', text: 'তালাক প্রাপ্ত' },
                { value: 'বিধবা', text: 'বিধবা' },
                { value: 'অন্যান্য', text: 'অন্যান্য' },
            ],
            applicant_resident_status_options: [
                { value: null, text: 'বাসিন্দা নির্বাচন করুন' },
                { value: 'স্থায়ী', text: 'স্থায়ী' },
                { value: 'অস্থায়ী', text: 'অস্থায়ী' },
            ],
            foods: [
                { value: null, text: "Choose..." },
                { value: "apple", text: "Apple" },
                { value: "orange", text: "Orange" }
            ],
            alives: [
                { value: null, text: "Choose..." },
                { value: "হ্যাঁ", text: "হ্যাঁ" },
                { value: "না", text: "না" }
            ],
            applicant_owner_typees: [
                { value: null, text: "Choose..." },
                { value: "ব্যক্তি মালিকানাধীন", text: "ব্যক্তি মালিকানাধীন" },
                { value: "যৌথ মালিকানা", text: "যৌথ মালিকানা" },
                { value: "কোম্পানী", text: "কোম্পানী" },
            ],
            form: {
                image: null,
                sonod_Id: '',
                unioun_name: null,
                year: null,
                sonod_name: null,
                applicant_holding_tax_number: null,
                applicant_national_id_number: null,
                applicant_birth_certificate_number: null,
                applicant_passport_number: null,
                applicant_date_of_birth: null,
                family_name: null,
                Annual_income: null,
                Subject_to_permission: null,
                disabled: null,
                The_subject_of_the_certificate: null,
                Name_of_the_transferred_area: null,
                applicant_name: null,
                applicant_second_name: null,
                applicant_name_of_the_organization: null,
                applicant_gender: null,
                applicant_marriage_status: null,
                applicant_father_name: null,
                applicant_mother_name: null,
                applicant_occupation: null,
                applicant_education: null,
                applicant_religion: null,
                applicant_resident_status: null,
                applicant_owner_type: null,
                applicant_vat_id_number: null,
                applicant_tax_id_number: null,
                applicant_type_of_business: null,
                successor_father_alive_status: null,
                successor_mother_alive_status: null,
                utname: null,
                //////////////////////////////////////////////
                // বর্তমান ঠিকানা
                applicant_present_village: null,
                applicant_present_road_block_sector: null,
                applicant_present_word_number: null,
                applicant_present_district: null,
                applicant_present_Upazila: null,
                applicant_present_post_office: null,
                //////////////////////////////////////////////
                // স্থায়ী ঠিকানা
                applicant_permanent_village: null,
                applicant_permanent_road_block_sector: null,
                applicant_permanent_word_number: null,
                applicant_permanent_district: null,
                applicant_permanent_Upazila: null,
                applicant_permanent_post_office: null,
                //////////////////////////////////////////////
                // যোগাযোগের ঠিকানা
                applicant_mobile: null,
                applicant_email: null,
                //////////////////////////////////////////////
                // Attachment
                applicant_national_id_front_attachment: null,
                applicant_national_id_back_attachment: null,
                applicant_birth_certificate_attachment: null,
                prottoyon: null,
                stutus: 'Pending',
                payment_status: 'Unpaid',
                successors: [
                    {
                        w_id: "",
                        w_name: "",
                        w_relation: "",
                        w_age: "",
                        w_nid: "",
                    },
                ],
            }
        };
    },
    validations: {
        form: {
            image: {
            },
            sonod_name: {
                required
            },
            utname: {
                // required
            },
            applicant_type_of_business: {
                // required
            },
            applicant_date_of_birth: {
                required
            },
            family_name: {
                // required
            },
            Annual_income: {
                // required
            },
            Subject_to_permission: {
                // required
            },
            disabled: {
                // required
            },
            The_subject_of_the_certificate: {
                // required
            },
            Name_of_the_transferred_area: {
                // required
            },
            applicant_name: {
                required
            },
            applicant_second_name: {
                // required
            },
            applicant_name_of_the_organization: {
                // required
            },
            applicant_gender: {
                required
            },
            applicant_marriage_status: {
                required
            },
            applicant_father_name: {
                required
            },
            applicant_mother_name: {
                required
            },
            applicant_religion: {
                required
            },
            applicant_resident_status: {
                required
            },
            applicant_mobile: {
                required
            },
            applicant_holding_tax_number: {},
            applicant_national_id_number: {
                //  maxLength: maxLength(5)
            },
            applicant_birth_certificate_number: {},
            applicant_passport_number: {},
            applicant_occupation: {},
            applicant_education: {},
            applicant_owner_type: {},
            applicant_vat_id_number: {},
            applicant_tax_id_number: {},
            successor_father_alive_status: {},
            successor_mother_alive_status: {},
            //////////////////////////////////////////////
            // বর্তমান ঠিকানা
            applicant_present_village: {},
            applicant_present_road_block_sector: {},
            applicant_present_word_number: {},
            applicant_present_district: {},
            applicant_present_Upazila: {},
            applicant_present_post_office: {},
            //////////////////////////////////////////////
            // স্থায়ী ঠিকানা
            applicant_permanent_village: {},
            applicant_permanent_road_block_sector: {},
            applicant_permanent_word_number: {},
            applicant_permanent_district: {},
            applicant_permanent_Upazila: {},
            applicant_permanent_post_office: {},
            //////////////////////////////////////////////
            // যোগাযোগের ঠিকানা
            applicant_email: {},
            //////////////////////////////////////////////
            // Attachment
            applicant_national_id_front_attachment: {},
            applicant_national_id_back_attachment: {},
            applicant_birth_certificate_attachment: {},
            prottoyon: {},
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                this.form.year = new Date().getFullYear();
                this.sonodname();
                setTimeout(() => {
                    this.form.sonod_name = this.sonodnamedata.bnname;
                    // console.log(this.getUnion)
                    var res = axios({ method: 'get', url: `/api/sonod/sonod_Id?union=${this.getUnion}`, data: [] })
                    axios.get(`/api/sonod/sonod_Id?union=${this.getUnion}`)
                        .then((response) => {
                            //   console.log(response.data)
                            this.form.sonod_Id = `${response.data}`;
                        })
                }, 3000);
            },
            deep: true
        }
    },
    //   updated() {
    //       console.log('ss');
    //     },
    methods: {
        FileSelected($event, parent_index) {
            let file = $event.target.files[0];
            if (file.size > 5048576) {
                Notification.image_validation();
            } else {
                let reader = new FileReader;
                reader.onload = event => {
                    this.form[parent_index] = event.target.result
                    // console.log(event.target.result);
                };
                reader.readAsDataURL(file)
            }
            //   console.log($event.target.result);
        },
        portKeydown(e) {
            if (/^\+$/.test(e.key)) {
                e.preventDefault();
            }
        },
        addMore() {
            this.form.successors.push({
                w_name: "",
                w_relation: "",
                w_age: "",
                w_nid: "",
            });
        },
        remove(index) {
            this.form.successors.splice(index, 1);
        },
        validateState(name) {
            const { $dirty, $error } = this.$v.form[name];
            // console.log($error)
            return $dirty ? !$error : null;
        },
        resetForm() {
            this.form.image = null;
            this.form.applicant_holding_tax_number = null;
            this.form.applicant_national_id_number = null;
            this.form.applicant_birth_certificate_number = null;
            this.form.applicant_passport_number = null;
            this.form.applicant_date_of_birth = null;
            this.form.family_name = null;
            this.form.Annual_income = null;
            this.form.Subject_to_permission = null;
            this.form.disabled = null;
            this.form.The_subject_of_the_certificate = null;
            this.form.Name_of_the_transferred_area = null;
            this.form.applicant_name = null;
            this.form.applicant_second_name = null;
            this.form.applicant_gender = null;
            this.form.applicant_marriage_status = null;
            this.form.applicant_father_name = null;
            this.form.applicant_mother_name = null;
            this.form.applicant_occupation = null;
            this.form.applicant_education = null;
            this.form.applicant_religion = null;
            this.form.applicant_resident_status = null;
            ////////////////////////////////////////////// =               this.for;.// =বর্তমান ঠিকানা
            this.form.applicant_present_village = null;
            this.form.applicant_present_road_block_sector = null;
            this.form.applicant_present_word_number = null;
            this.form.applicant_present_district = null;
            this.form.applicant_present_Upazila = null;
            this.form.applicant_present_post_office = null;
            ////////////////////////////////////////////// =               this.for;.// =স্থায়ী ঠিকানা
            this.form.applicant_permanent_village = null;
            this.form.applicant_permanent_road_block_sector = null;
            this.form.applicant_permanent_word_number = null;
            this.form.applicant_permanent_district = null;
            this.form.applicant_permanent_Upazila = null;
            this.form.applicant_permanent_post_office = null;
            ////////////////////////////////////////////// =               this.for;.// =যোগাযোগের ঠিকানা
            this.form.applicant_mobile = null;
            this.form.applicant_email = null;
            ////////////////////////////////////////////// =               this.for;.// =Attachment
            this.form.applicant_national_id_front_attachment = null;
            this.form.applicant_national_id_back_attachment = null;
            this.form.applicant_birth_certificate_attachment = null;
            this.form.prottoyon = null;
            this.$nextTick(() => {
                this.$v.$reset();
            });
        },
        sameAddress() {
            // console.log(value)
            if (this.sameStatus) {
                this.form.applicant_permanent_village = this.form.applicant_present_village
                this.form.applicant_permanent_road_block_sector = this.form.applicant_present_road_block_sector
                this.form.applicant_permanent_word_number = this.form.applicant_present_word_number
                this.form.applicant_permanent_district = this.form.applicant_present_district
                this.form.applicant_permanent_Upazila = this.form.applicant_present_Upazila
                this.form.applicant_permanent_post_office = this.form.applicant_present_post_office
            } else {
                this.form.applicant_permanent_village = null
                this.form.applicant_permanent_road_block_sector = null
                this.form.applicant_permanent_word_number = null
                this.form.applicant_permanent_district = null
                this.form.applicant_permanent_Upazila = null
                this.form.applicant_permanent_post_office = null
            }
        },
        sonodname() {
            if (this.$route.params.name) {
                axios.get(`/api/get/sonodname/list?data=${this.$route.params.name.replaceAll('_', ' ')}`)
                    .then(({ data }) => {
                        this.sonodnamedata = data
                        window.scrollTo(0, 0);
                    })
                    .catch()
            }
        },
        resetInfoModal() {
            this.infoModal.title = ''
            this.infoModal.content = ''
        },
        async onSubmit() {
            this.$v.form.$touch();
            if (this.$v.form.$anyError) {
                return;
            }
            var sonod_fee = Number(this.sonodnamedata.sonod_fee)
            var vat = Number(this.getvatTax.vat)
            var tax = Number(this.getvatTax.tax)
            var service = Number(this.getvatTax.service)
            var vatAmount = ((sonod_fee * vat) / 100);
            var taxAmount = ((sonod_fee * tax) / 100);
            var totalamount = sonod_fee + vatAmount + taxAmount + service
            this.charages = {
                sonod_fee: sonod_fee,
                vatAmount: vatAmount,
                taxAmount: taxAmount,
                service: service,
                totalamount: totalamount,
            },
                this.$root.$emit('bv::show::modal', this.infoModal.id)
        },
        async finalSubmit() {
            this.submitLoad = true;
            var redirect;
            var payment_type = this.getunionInfos.payment_type;
            if (payment_type == 'Prepaid') {
                this.form.stutus = 'Prepaid';
            } else if (payment_type == 'Postpaid') {
                this.form.stutus = 'Pending';
            }
            var res = await this.callApi('post', '/api/sonod/submit', this.form);
            var datas = res.data;
            // this.$router.push({ name: 'home' })
            if (payment_type == 'Prepaid') {
                redirect = `/sonod/payment/${datas.id}`
                this.waitForPayment = true;
                this.checkPayment(datas.id);
                this.form['id'] = datas.id;
                window.open(redirect, '_blank');
            } else if (payment_type == 'Postpaid') {
                this.waitForPayment = true;
                // this.checkPayment(datas.id);
                // this.form['id'] = datas.id;
                Swal.fire({
                    title: 'Success',
                    text: `সনদের ফি সফলভাবে প্রদান হয়েছে`,
                    icon: 'success',
                    confirmButtonColor: 'green',
                    confirmButtonText: `আবেদন পত্র ডাউনলোড করুন`,
                    showDenyButton: true,
                    showCancelButton: true,
                    denyButtonText: 'রশিদ ডাউনলোড করুন',
                    cancelButtonText: 'Back to home',
                    customClass: {
                        actions: 'my-actions',
                        cancelButton: 'order-1 right-gap',
                        confirmButton: 'order-2',
                        denyButton: 'order-3',
                    },
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    preConfirm: () => {
                        redirect = '/document/' + res.data.sonod_name + '/' + res.data.id;
                        window.open(redirect, '_blank');
                        return false; // Prevent confirmed
                    },
                    preDeny: () => {
                        redirect = '/invoice/' + res.data.sonod_name + '/' + res.data.id;
                        window.open(redirect, '_blank');
                        return false; // Prevent denied
                    },
                }).then(async (result) => {
                    console.log(result)
                    if (result.isConfirmed) {
                        // this.$root.$emit('bv::hide::modal', 'info-modal')
                    } else if (result.isDenied) {
                        // this.$root.$emit('bv::hide::modal', 'info-modal')
                    } else if (result.isDismissed) {
                        //cancel
                        this.$router.push({ name: 'home' })
                    }
                })
                //  console.log(this.waitForPayment)
                // redirect = '/document/' + datas.sonod_name + '/' + datas.id;
                // window.open(redirect, '_blank');
            }
        },
        checkPayment(id) {
            var redirect;
            setInterval(() => {
                if (this.waitForPayment) {
                    axios.get(`/api/sonod/single/${id}`).then((res) => {
                        var payment_type = this.getunionInfos.payment_type;
                        if (payment_type == 'Prepaid') {
                            if (res.data.stutus == 'Pending' && res.data.payment_status == 'Paid') {
                                this.waitForPayment = false;
                                // console.log(this.waitForPayment)
                                Swal.fire({
                                    title: 'Success',
                                    text: `সনদের ফি সফলভাবে প্রদান হয়েছে`,
                                    icon: 'success',
                                    confirmButtonColor: 'green',
                                    confirmButtonText: `আবেদন পত্র ডাউনলোড করুন`,
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    denyButtonText: 'রশিদ ডাউনলোড করুন',
                                    cancelButtonText: 'Back to home',
                                    customClass: {
                                        actions: 'my-actions',
                                        cancelButton: 'order-1 right-gap',
                                        confirmButton: 'order-2',
                                        denyButton: 'order-3',
                                    },
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    preConfirm: () => {
                                        redirect = '/document/' + res.data.sonod_name + '/' + res.data.id;
                                        window.open(redirect, '_blank');
                                        return false; // Prevent confirmed
                                    },
                                    preDeny: () => {
                                        redirect = '/invoice/' + res.data.sonod_name + '/' + res.data.id;
                                        window.open(redirect, '_blank');
                                        return false; // Prevent denied
                                    },
                                }).then(async (result) => {
                                    console.log(result)
                                    if (result.isConfirmed) {
                                        // this.$root.$emit('bv::hide::modal', 'info-modal')
                                        redirect = '/document/' + res.data.sonod_name + '/' + res.data.id;
                                        window.open(redirect, '_blank');
                                    } else if (result.isDenied) {
                                        // this.$root.$emit('bv::hide::modal', 'info-modal')
                                        redirect = '/invoice/' + res.data.sonod_name + '/' + res.data.id;
                                        window.open(redirect, '_blank');
                                    } else if (result.isDismissed) {
                                        //cancel
                                        this.$router.push({ name: 'home' })
                                    }
                                })
                            }
                        } else if (payment_type == 'Postpaid') {
                            if (res.data.stutus == 'Pending') {
                                this.waitForPayment = false;
                                Swal.fire({
                                    title: 'Success',
                                    text: `সনদের ফি সফলভাবে প্রদান হয়েছে`,
                                    icon: 'success',
                                    confirmButtonColor: 'green',
                                    confirmButtonText: `আবেদন পত্র ডাউনলোড করুন`,
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    denyButtonText: 'রশিদ ডাউনলোড করুন',
                                    cancelButtonText: 'Back to home',
                                    customClass: {
                                        actions: 'my-actions',
                                        cancelButton: 'order-1 right-gap',
                                        confirmButton: 'order-2',
                                        denyButton: 'order-3',
                                    },
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    preConfirm: () => {
                                        redirect = '/document/' + res.data.sonod_name + '/' + res.data.id;
                                        window.open(redirect, '_blank');
                                        return false; // Prevent confirmed
                                    },
                                    preDeny: () => {
                                        redirect = '/invoice/' + res.data.sonod_name + '/' + res.data.id;
                                        window.open(redirect, '_blank');
                                        return false; // Prevent denied
                                    },
                                }).then(async (result) => {
                                    console.log(result)
                                    if (result.isConfirmed) {
                                        // this.$root.$emit('bv::hide::modal', 'info-modal')
                                        redirect = '/document/' + res.data.sonod_name + '/' + res.data.id;
                                        window.open(redirect, '_blank');
                                    } else if (result.isDenied) {
                                        // this.$root.$emit('bv::hide::modal', 'info-modal')
                                        redirect = '/invoice/' + res.data.sonod_name + '/' + res.data.id;
                                        window.open(redirect, '_blank');
                                    } else if (result.isDismissed) {
                                        //cancel
                                        this.$router.push({ name: 'home' })
                                    }
                                })
                            }
                        }
                        // console.log(res)
                    })
                }
            }, 3000);
        }
    },
    mounted() {
        // if(localStorage.getItem('form')){
        //     this.form = JSON.parse(localStorage.getItem('form'))
        // }
        this.form.year = new Date().getFullYear();
        this.sonodname();
        setTimeout(() => {
            this.form.sonod_name = this.sonodnamedata.bnname;
            console.log(this.getUnion)
            var res = axios({ method: 'get', url: `/api/sonod/sonod_Id?union=${this.getUnion}`, data: [] })
            axios.get(`/api/sonod/sonod_Id?union=${this.getUnion}`)
                .then((response) => {
                    //   console.log(response.data)
                    this.form.sonod_Id = `${response.data}`;
                })
        }, 3000);
        //   Swal.fire({
        //                             title: 'Success',
        //                             text: `সনদের ফি সফলভাবে প্রদান হয়েছে`,
        //                             icon: 'success',
        //                             confirmButtonColor: 'green',
        //                             confirmButtonText: `আবেদন পত্র ডাউনলোড করুন`,
        //                             showDenyButton: true,
        //                             showCancelButton: true,
        //                             denyButtonText: 'রশিদ ডাউনলোড করুন',
        //                             cancelButtonText:'Back to home',
        //                             customClass: {
        //                                 actions: 'my-actions',
        //                                 cancelButton: 'order-1 right-gap',
        //                                 confirmButton: 'order-2',
        //                                 denyButton: 'order-3',
        //                             },
        //                             allowOutsideClick: false,
        //                             allowEscapeKey: false,
        //                             preConfirm: () => {
        //                             return false; // Prevent confirmed
        //                             },
        //                             preDeny: () => {
        //                                 return false; // Prevent denied
        //                             },
        //                         }).then(async (result) => {
        //                             console.log(result)
        //                             if (result.isConfirmed) {
        //                                 // this.$root.$emit('bv::hide::modal', 'info-modal')
        //                                 redirect = '/document/' + res.data.sonod_name + '/' + res.data.id;
        //                                 window.open(redirect, '_blank');
        //                             } else if (result.isDenied) {
        //                                 // this.$root.$emit('bv::hide::modal', 'info-modal')
        //                                 redirect = '/invoice/' + res.data.sonod_name + '/' + res.data.id;
        //                                 window.open(redirect, '_blank');
        //                             } else if (result.isDismissed) {
        //                                 //cancel
        //                                 this.$router.push({ name: 'home' })
        //                             }
        //                         })
    }
};
</script>
<style>
.app-heading {
    text-align: center;
    margin: 32px 0;
    font-size: 23px;
    border-bottom: 1px solid #159513;
    color: #159513;
}
.form-pannel {
    border: 1px solid #159513;
    padding: 25px 25px 25px 25px;
}
.panel-heading {
    padding: 11px 0px;
    border-top-right-radius: 6px;
    border-top-left-radius: 6px;
    margin-top: 20px;
}
.form-pannel {
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
}
.dropdown-menu {
    z-index: 99999;
}
</style>
