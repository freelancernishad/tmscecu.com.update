<template>
    <div class="container my-4">
        <div class="container">

    <b-form @submit.stop.prevent="onSubmit">

            <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                <div class="col-md-12 p-sm-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-12 p-sm-0">

                            <div class="border">

                                 <div class="verification-sec text-center mt-2 mb-2">
                                    <h2>Preview</h2>
                                    <h2></h2>
                                </div>
                            </div>
                            <div>
                                <div class="row m-0">
                                    
                                        <div class="beneficiary text-center p-2">
                                            <h3>আবেদনকারীর তথ্য</h3>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Certificate No:<br />সার্টিফিকেট নং:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                    {{ row.sonod_Id }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    NID Number:<br />জাতীয় পরিচয়পত্র নং:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                     {{ row.applicant_national_id_number }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Passport/Birth Registration:<br />পাসপোর্ট/জন্ম নিবন্ধন:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                    {{ row.applicant_passport_number }} {{ row.applicant_birth_certificate_number }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Country/Nationality:<br />দেশ/জাতীয়তা:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                    Bangladeshi
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Name:<br />নাম:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                    {{ row.applicant_name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Date of Birth:<br />জন্ম তারিখ:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                    {{ row.applicant_date_of_birth }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Gender:<br />লিঙ্গ:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                      {{ row.applicant_gender }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="beneficiary text-center p-2">
                                            <h3>Certificate Details (সনদ প্রদানের বিবরণ)</h3>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Date of Certificate Issue):<br />সনদ প্রদানের
                                                    তারিখ :
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                    11-10-2021
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Name of Certificate:<br />সনদের নাম:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                     {{ row.sonod_name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Date of Certificate Renew:<br />সনদ নবায়নের তারিখ:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                    14-11-2021
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Payment Status:<br />লেনদেনের অবস্থা:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                      {{ row.payment_status }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Certification Union:<br />সনদ প্রদানের ইউনিয়ন:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                      {{ row.unioun_name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Certifier By:<br />সনদ প্রদানকারী:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                      {{ row.unioun_name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-right cert-verify-content-div">
                                                    Total Certificate Given:<br />মোট সনদ সংখ্যা:
                                                </div>
                                            </div>
                                            <div class="col-6 border-dash">
                                                <div class="beneficiary-details-left cert-verify-content-div">
                                                    3
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</b-form>
        </div>


    </div>
</template>
<script>
export default {
    data(){
        return{
            row:{}
        }
    },
    methods:{

   async onSubmit() {
            this.$v.form.$touch();
            if (this.$v.form.$anyError) {
                return;
            }

       localStorage.setItem('form',JSON.stringify(this.form));
            this.$router.push({ name: 'certificate'})

            // var res = await this.callApi('post', '/api/sonod/submit', this.form);
            // var datas = res.data;
            var redirect;
            var payment_type = this.getunionInfos.payment_type;


            if(payment_type=='Prepaid'){
            // redirect = `sonod/payment/${datas.id}`
            // window.open(redirect,'_blank');
            }else if(payment_type=='Postpaid'){
                // redirect = '/document/'+datas.sonod_name+'/'+datas.id;
                // window.open(redirect,'_blank');
            }
            // console.log(payment_type);
            // this.resetForm();

            // window.location.href = redirect


        }

    },
    mounted() {
        // this.sonodVerifiy()

        if(localStorage.getItem('form')){
            this.row = JSON.parse(localStorage.getItem('form'))
        }

    },
}
</script>
<style>
.border-dash {
  border: 1px dashed #dee2e6;
}

.logo-img img {
  width: 70px;
}

.header-right-logo img {
  width: 100px;
}

.header-text {
  font-size: 16px;
  line-height: 70px;
}
.header-text p:first-child {
  font-weight: 500;
  line-height: 18px;
  margin-bottom: 0px;
  margin-top: 18px;
}
.header-text p:last-child {
  line-height: 18px;
}

.verification-sec h2:first-child {
  font-size: 30px;
  color: green;
  font-weight: bold;
}
.verification-sec h2:last-child {
  font-size: 22px;
  color: green;
  font-weight: 350;
}

.beneficiary {
  background-color: #eeeeee;
  border: 1px solid #dee2e6;
}

.beneficiary h3 {
  text-align: center;
  font-size: 14px;
  font-weight: bold;
}

.beneficiary-details-right {
  font-size: 13px;
  text-align: right;
  padding: 5px;
  overflow-wrap: break-word;
}

.beneficiary-details-left {
  font-size: 13px;
  text-align: left;
  padding: 5px;
  overflow-wrap: break-word;
}

.lower-does-1 h3 {
  font-size: 13px;
  text-align: right;
  padding: 5px;
  font-weight: bold;
}
.lower-does-2 h3 {
  font-size: 13px;
  text-align: center;
  padding: 5px;
  font-weight: bold;
}
.lower-does-3 h3 {
  font-size: 13px;
  text-align: left;
  padding: 5px;
  font-weight: bold;
}

.lower-does-part-1 h3 {
  font-size: 13px;
  text-align: right;
  padding: 5px;
  overflow-wrap: break-word;
  text-transform: capitalize;
}
.lower-does-part-2 h3 {
  font-size: 13px;
  text-align: center;
  padding: 5px;
  overflow-wrap: break-word;
}
.lower-does-part-3 h3 {
  font-size: 13px;
  text-align: left;
  padding: 5px;
  overflow-wrap: break-word;
}

.credit-Logo img {
  max-width: 80%;
}

</style>
