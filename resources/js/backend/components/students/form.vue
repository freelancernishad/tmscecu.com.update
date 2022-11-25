<template>
	<div>
        <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
   <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Students</h3>
                  <ul>
                <li>
                    <router-link :to="{name:'home'}">Home</router-link>
                </li>
                <li>
                    <router-link  v-if="this.editid!=''" :to="{name:'students'}">Student</router-link> <span v-else>Admission Form</span>
                </li>
                <li v-if="this.editid!=''">{{ form.StudentName }}</li>
            </ul>
        </div>
        <!-- Breadcubs Area End Here -->
  <!-- Admit Form Area Start Here -->
  <div class="card height-auto">
    <div class="card-body">
                        <router-link  class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                             to="">
                            GO BACK
                        </router-link>
        <div class="heading-layout1">
            <div class="item-title">

            </div>
            <div class="dropdown">



            </div>
        </div>



        <form  enctype="multipart/form-data" v-on:submit.prevent="formsubmit" >

<fieldset class="col-md-12 mt-3" style="border: 2px solid;">
 <legend> <h3>Students Detials</h3></legend>


            <div class="row">
<!--


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Admission ID:</label>
                        <input class="form-control" type="text"  placeholder="Enter Admission ID" v-model="form.AdmissionID" id="AdmissionID" readonly required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student ID:</label>
                        <input class="form-control" type="text" placeholder="Enter Student ID" v-model="form.StudentID" id="StudentID" readonly required />
                    </div>
                </div>
 -->

 <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="নাম (বাংলা)" v-model="form.StudentName" required  />

                    </div>
                </div>



                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">নাম (English)</label>
                        <input class="form-control" style="text-transform:uppercase"  type="text"  placeholder="নাম (English)" v-model="form.StudentNameEn" required />

                    </div>
                </div>




                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">শ্রেণি</label>


                            <select  class="form-control"  style="width: 100%;" v-model="form.StudentClass" @change="checkRoll" required >
                                <option value="">
                                    নির্বাচন করুন
                                </option>
                                <option v-for="classlist in classess">{{ classlist }}</option>
                            </select>

                    </div>
                </div>

                <div class="col-md-4 mt-3" v-if="form.StudentClass=='Nine' || form.StudentClass=='Ten'" id="Sgroup" >
                    <div class="form-group">
                        <label class="form_label">গ্রুপ</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGroup" @change="checkRoll"  required>
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option>
                                Science
                            </option>
                            <option>
                                Humanities
                            </option>
                            <option>
                                Commerce
                            </option>
                        </select>

                    </div>
                    </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">রোল</label>
                        <input class="form-control" style="text-transform:uppercase"  type="text" @keyup="checkRoll"  placeholder="রোল" v-model="form.StudentRoll"  required />
                    </div>
                    <span v-if="alredyhave" style="color:red">{{ form.StudentClass }} Already Have Roll {{ form.StudentRoll }}</span>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">লিঙ্গ</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGender" required>
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option value="Male">
                                ছেলে
                            </option>
                            <option value="Female">
                                মেয়ে
                            </option>
                        </select>

                    </div>


                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">ধর্ম</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentReligion" required>
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option value="Islam">
                                ইসলাম
                            </option>
                            <option value="Hindu">
                                হিন্দু
                            </option>
                            <option value="Other">
                                অন্যান্য
                            </option>
                        </select>

                    </div>


                </div>




<!--
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">Student Email:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Email" v-model="form.StudentEmail" name="StudentEmail" data-vv-scope="step1"  />
                         <p class="help is-danger" v-show="errors.has('step1.StudentEmail')">
                             {{ errors.first('step1.StudentEmail') }}
                          </p>
                         <p class="help is-danger" v-show="studentEmailerror!=''">
                             {{ studentEmailerror }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">Student Password:</label>
                        <input class="form-control" type="password" name="StudentPassword"  placeholder="Enter Student Password" v-model="form.StudentPassword"  data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentPassword')">
                             {{ errors.first('step1.StudentPassword') }}
                          </p>
                    </div>
                </div> -->



                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text"  placeholder="জন্ম নিবন্ধন নং" v-model="form.StudentBirthCertificateNo" required />

                    </div>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">জন্ম তারিখ</label>
                        <input class="form-control" type="date"  placeholder="জন্ম তারিখ" v-model="form.StudentDateOfBirth" required />

                    </div>
                </div>




                <div class="col-md-4 mt-3"  >
                    <div class="form-group">
                        <label class="form_label">Student category</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentCategory" required >
                            <option value="">Select Student category</option>
                            <option>কর্মজীবী শিক্ষার্থী</option>
                            <option>ভূমিহীন অভিভাবকের সন্তান</option>
                            <option>মুক্তিযোদ্ধা পোষা/নাতি-নাতনি</option>
                            <option>ক্ষুদ্র নৃ-গোষ্ঠী শিক্ষার্থী</option>
                            <option>বিশেষ চাহিদা সম্পন্ন শিক্ষার্থী</option>
                            <option>অনাথ/এতিম শিক্ষা</option>
                            <option>অন্যান্য</option>
                        </select>

                    </div>
                    </div>


                <div class="col-md-4 mt-3"  >
                    <div class="form-group">
                        <label class="form_label">কোটা</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentKota" required >
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option>মুক্তিযোদ্ধার সন্তান, নাতী নাতনী</option>
                            <option>অত্র বিদ্যালয়ে কর্মরত শিক্ষক, কর্মচারী ও ম্যানেজিং কমিটির সন্তান</option>
                            <option>প্রতিবন্ধী</option>
                            <option>সাধারণ কোটা</option>
                            <option>কোন কোটা নেই</option>
                        </select>

                    </div>
                    </div>

                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">পূর্বে অধ্যায়নরত স্কুল এর নাম </label>
                        <input class="form-control" type="text"  placeholder="পূর্বে অধ্যায়নরত স্কুল এর নাম" required/>

                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">পূর্বে অধ্যায়নরত শ্রেণি</label>

                        <select  class="form-control"  style="width: 100%;" v-model="form.preClass" required>
                                <option value="">
                                    নির্বাচন করুন
                                </option>
                                <option>Five</option>
                                <option v-for="classlist in classess">{{ classlist }}</option>
                            </select>

                    </div>
                </div>


                <div class="col-md-4 mt-3"  >
                    <div class="form-group">
                        <label class="form_label">কোন ভাই/বোন অত্র প্রতিষ্ঠানে অধ্যায়নরত কি না</label>
                        <select class="form-control" style="width: 100%;" v-model="form.bigBroSis"  required>
                            <option value="No">না</option>
                            <option value="Yes">হ্যাঁ</option>

                        </select>

                    </div>
                </div>



                <div class="col-md-4 mt-3" v-if="form.bigBroSis=='Yes'" >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের নাম</label>
                        <input class="form-control" type="text"  placeholder="অধ্যয়নরত ভাই/বোনের নাম" v-model="form.bigBroSisName" required/>

                    </div>
                </div>


                <div class="col-md-4 mt-3"  v-if="form.bigBroSis=='Yes'"  >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের শ্রেণি</label>
                        <input class="form-control" type="text"  placeholder="অধ্যয়নরত ভাই/বোনের শ্রেণি" v-model="form.bigBroSisClass" required />

                    </div>
                </div>


                <div class="col-md-4 mt-3"  v-if="form.bigBroSis=='Yes'"  >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের রোল</label>
                        <input class="form-control" type="text"  placeholder="অধ্যয়নরত ভাই/বোনের রোল" v-model="form.bigBroSisRoll" required />

                    </div>
                </div>
















                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">ঠিকানা</label>
                        <input class="form-control" type="text"  placeholder="ঠিকানা" v-model="form.StudentAddress" required/>

                    </div>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">মোবাইল নাম্বার</label>
                        <input class="form-control" type="text"  placeholder="মোবাইল নাম্বার" v-model="form.StudentPhoneNumber" maxlength="11" required/>

                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">পোস্টাল কোড</label>
                        <input class="form-control" type="text"  placeholder="পোস্টাল কোড" v-model="form.AreaPostalCode"  required/>

                    </div>
                </div>

                </div>

      </fieldset>

            <fieldset class="col-md-12 mt-3" style="border: 2px solid;">
             <legend> <h3>Parents Detials</h3></legend>
<div class="row">





    <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="পিতার নাম (বাংলা)" v-model="form.StudentFatherNameBn" required/>

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার নাম (English)</label>
                        <input class="form-control" type="text"  placeholder="পিতার নাম (English)" v-model="form.StudentFatherName" style="text-transform:uppercase" required />

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার জাতীয় পরিচয় পত্র নং</label>
                        <input class="form-control" type="text"  placeholder="পিতার জাতীয় পরিচয় পত্র নং" v-model="form.StudentFatherNid" required />

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="মাতার নাম (বাংলা)" v-model="form.StudentMotherNameBn"  required />

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার নাম (English)</label>
                        <input class="form-control" type="text"  placeholder="মাতার নাম (English)" v-model="form.StudentMotherName"  style="text-transform:uppercase" required  />

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার জাতীয় পরিচয় পত্র নং</label>
                        <input class="form-control" type="text"  placeholder="মাতার জাতীয় পরিচয় পত্র নং" v-model="form.StudentMotherNid"  required/>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text"  placeholder="পিতার জন্ম নিবন্ধন নং" v-model="form.StudentFatherBCN" required />

                    </div>
                </div>





                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text"  placeholder="মাতার জন্ম নিবন্ধন নং" v-model="form.StudentMotherBCN" required />

                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতা/মাতা না থাকলে অভিভাবকের নাম</label>
                        <input class="form-control" type="text"  placeholder="পিতা/মাতা না থাকলে অভিভাবকের নাম" v-model="form.guardName"  required/>

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র</label>
                        <input class="form-control" type="text"  placeholder="পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং" v-model="form.guardNid" required />

                    </div>
                </div>







                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের মাসিক আয়</label>
                        <input class="form-control" type="text"  placeholder="অভিভাবকের মাসিক আয়" v-model="form.parentEarn"  required/>

                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের পেশা</label>


                        <select class="form-control" style="width: 100%;" v-model="form.StudentFatherOccupation" name="অভিভাবকের পেশা" required >
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option>ব্যবসায়ি</option>
                            <option>কৃষি শ্রমিক</option>
                            <option>ডাক্তার</option>
                            <option>জেলে</option>
                            <option>সরকারি চাকুরি</option>
                            <option>কামার/কুমোর</option>
                            <option>প্রবাসি</option>
                            <option>ক্ষুদ্র ব্যবসায়ি</option>
                            <option>শিক্ষক</option>
                            <option>অকৃষি শ্রমিক</option>
                            <option>অন্যান্য</option>
                        </select>


                    </div>
                </div>


                </div>
</fieldset>
<div class="row">

                <div class="col-md-12" >
                    <div class="form-group">

                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">SAVE DATA</button>


                    </div>
                </div>





            </div>



        </form>





    </div>
</div>


	</div>
</template>

<script>


export default {

	created(){
		if (!User.loggedIn()) {
			this.$router.push({name: '/'})
		}
             this.form.school_id = this.school_id
	},

	data () {
		return {
            form:{
                id:null,
                school_id:null,
                Year:new Date().getFullYear(),
                AdmissionID:null,
                StudentID:null,
                StudentRoll:null,
                StudentClass:null,
                StudentGender:null,
                StudentReligion:null,
                StudentName:null,
                StudentNameEn:null,
                StudentFatherNameBn:null,
                StudentFatherName:null,
                StudentMotherNameBn:null,
                StudentMotherName:null,
                StudentFatherNid:null,
                StudentMotherNid:null,
                StudentFatherBCN:null,
                StudentMotherBCN:null,
                guardName:null,
                guardNid:null,
                StudentFatherOccupation:null,
                parentEarn:null,
                StudentMotherOccupation:null,
                ParentEmail:null,
                ParentPassword:null,
                StudentEmail:null,
                StudentPassword:null,
                StudentDateOfBirth:null,
                StudentBirthCertificateNo:null,
                StudentCategory:null,
                StudentKota:null,
                preSchool:null,
                preClass:null,
                bigBroSis:"No",
                bigBroSisName:null,
                bigBroSisClass:null,
                bigBroSisRoll:null,
                StudentGroup:'',
                StudentAddress:null,
                StudentPhoneNumber:null,
                AreaPostalCode:null,
                StudentStatus:'Pending',
                StudentTranferFrom:null,
                StudentPicture:null,
                JoiningDate:null,
                StudentTranferStatus:null,
                AplicationStatus:null,
                ThisMonthPaymentStatus:null,
            },

            editid:'',
            classdisable:false,
            alredyhave:false,
               preloader: true,
		}
	},

	methods: {



      async checkRoll(){


        if(this.form.StudentClass=='Nine' || this.form.StudentClass=='Ten'){

        }else{
            this.form.StudentGroup = '';
        }

        var res = await this.callApi('get',`/api/check/student/roll?StudentRoll=${this.form.StudentRoll}&StudentClass=${this.form.StudentClass}&StudentGroup=${this.form.StudentGroup}`,[]);
        this.alredyhave = res.data;
        },








        getstudent(){
                axios.get(`/api/students/single?filter[id]=${this.editid}`)
                                .then(({data}) => {
                                    //  console.log(data)
                                    this.form = data[0]
                                              this.preloader = false;
                                })
                                .catch(() => {
                                    // this.$router.push({name: 'supplier'})
                                })
        },


       async formsubmit(){


            if(this.alredyhave){
                Notification.customError(`${this.form.StudentClass} Already Have Roll ${this.form.StudentRoll}`);
            }else{
                this.preloader = true;
                var res = await this.callApi('post',`/api/students/form/submit?submit_type=data_entry`,this.form);
                this.$router.push({name: 'students'})
                Notification.success();

            }





                    this.preloader = false;

        }


	},
	mounted(){



       if(this.$route.params.id){

           this.editid = this.$route.params.id;

       }else{

              this.preloader = false;
              this.checkRoll();
       }
       if(this.editid!=''){

           this.getstudent();
           this.classdisable  = true
       }


	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
