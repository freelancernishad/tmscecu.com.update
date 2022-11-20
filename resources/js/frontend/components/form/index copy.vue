<template>
    <div>
        <b-form @submit.stop.prevent="onSubmit">

        <div class="row">


            <!-- col-md-6 -->
            <div class="col-md-6">
                <b-form-group id="sonod_name-group-1" label="মোবাইল" label-for="sonod_name">
                    <b-form-input id="sonod_name" name="sonod_name" v-model="$v.form.sonod_name"
                        :state="validateState('sonod_name')" aria-describedby="sonod_name-feedback"></b-form-input>
                    <b-form-invalid-feedback id="sonod_name-feedback">This is a required field</b-form-invalid-feedback>
                </b-form-group>
            </div>
            <!-- col-md-6 -->


            <!-- col-md-6 -->
            <div class="col-md-6">
                <b-form-group id="applicant_holding_tax_number-group-1" label="ইমেল" label-for="applicant_holding_tax_number">
                    <b-form-input id="applicant_holding_tax_number" name="applicant_holding_tax_number" v-model="$v.form.applicant_holding_tax_number"
                        :state="validateState('applicant_holding_tax_number')" aria-describedby="applicant_holding_tax_number-feedback"></b-form-input>
                    <b-form-invalid-feedback id="applicant_holding_tax_number-feedback">This is a required field</b-form-invalid-feedback>
                </b-form-group>
            </div>
            <!-- col-md-6 -->



        </div>




<!--
            <b-form-group id="example-input-group-2" label="Food" label-for="example-input-2">
                <b-form-select id="example-input-2" name="example-input-2" v-model="$v.form.food.$model"
                    :options="foods" :state="validateState('food')" aria-describedby="input-2-live-feedback">
                </b-form-select>
                <b-form-invalid-feedback id="input-2-live-feedback">This is a required field.</b-form-invalid-feedback>
            </b-form-group> -->




            <b-button type="submit" variant="primary">Submit</b-button>
            <b-button class="ml-2" @click="resetForm()">Reset</b-button>
        </b-form>
    </div>
</template>



<script>
import { validationMixin } from "vuelidate";
import { required, minLength } from "vuelidate/lib/validators";

export default {
    mixins: [validationMixin],
    data() {
        return {
            foods: [
                { value: null, text: "Choose..." },
                { value: "apple", text: "Apple" },
                { value: "orange", text: "Orange" }
            ],
            form: {
                sonod_name: null,
                applicant_holding_tax_number: null,
                applicant_national_id_number: null,
                applicant_birth_certificate_number: null,
                applicant_passport_number: null,
                applicant_date_of_birth: null,
                applicant_name: null,
                applicant_gender: null,
                applicant_marriage_status: null,
                applicant_father_name: null,
                applicant_mother_name: null,
                applicant_occupation: null,
                applicant_education: null,
                applicant_religion: null,
                applicant_resident_status: null,

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



            }
        };
    },
    validations: {
        form: {
            sonod_name: {
                required
            },
            applicant_date_of_birth: {
                required
            },
            applicant_name: {
                required
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
            }
        }
    },
    methods: {
        validateState(name) {
            const { $dirty, $error } = this.$v.form[name];
            // console.log(this.$v.form[name])
            return $dirty ? !$error : null;
        },

        resetForm() {
            this.form = {
                sonod_name: null,
                applicant_holding_tax_number: null,
                applicant_national_id_number: null,
                applicant_birth_certificate_number: null,
                applicant_passport_number: null,
                applicant_date_of_birth: null,
                applicant_name: null,
                applicant_gender: null,
                applicant_marriage_status: null,
                applicant_father_name: null,
                applicant_mother_name: null,
                applicant_occupation: null,
                applicant_education: null,
                applicant_religion: null,
                applicant_resident_status: null,

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

            };

            this.$nextTick(() => {
                this.$v.$reset();
            });
        },
        onSubmit() {
            this.$v.form.$touch();
            if (this.$v.form.$anyError) {
                return;
            }

            alert("Form submitted!");
        }
    }
};
</script>
