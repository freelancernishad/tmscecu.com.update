<template>
  <div class="container my-5">
     <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>

        <ul class="steps has-content-centered">
            <li class="steps-segment" v-for="tab in tabs" :class="{ 'is-active': tab.isActive }" v-bind:key="tab.name">
                <span class="steps-marker"></span>
                <div class="steps-content">
                    <p class="is-size-4">{{tab.name}}</p>
                    <p>{{tab.info}}</p>
                </div>
            </li>
        </ul>
        <div class="tab-details">


 <tab name="Student Details"  :selected="true">



 <div class="row">
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label>Admission ID:</label>
                        <input class="form-control" type="text"  placeholder="Enter Admission ID" v-model="form.AdmissionID" name="AdmissionID" readonly v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.AdmissionID')">
                             {{ errors.first('step1.AdmissionID') }}
                          </p>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label>Student Class:</label>


                            <select  class="form-control"  style="width: 100%;" v-model="form.StudentClass" name="StudentClass" @change="checkstudent"  v-validate="'required'" data-vv-scope="step1">
                                <option value="">
                                    SELECT
                                </option>
                                <option v-for="classlist in classes[0]">{{ classlist }}</option>
                            </select>
                         <p class="help is-danger" v-show="errors.has('step1.StudentClass')">
                             {{ errors.first('step1.StudentClass') }}
                          </p>
                    </div>


                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label>Student Gender:</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGender" name="StudentGender" v-validate="'required'" data-vv-scope="step1">
                            <option value="">
                                SELECT
                            </option>
                            <option>
                                Male
                            </option>
                            <option>
                                Female
                            </option>
                            <option>
                                Other
                            </option>
                        </select>
                         <p class="help is-danger" v-show="errors.has('step1.StudentGender')">
                             {{ errors.first('step1.StudentGender') }}
                          </p>
                    </div>


                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label>Student Religion:</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentReligion" name="StudentReligion" v-validate="'required'" data-vv-scope="step1">
                            <option value="">
                                SELECT
                            </option>
                            <option>
                                Islam
                            </option>
                            <option>
                                Hindu
                            </option>
                            <option>
                                Other
                            </option>
                        </select>
                         <p class="help is-danger" v-show="errors.has('step1.StudentReligion')">
                             {{ errors.first('step1.StudentReligion') }}
                          </p>
                    </div>


                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label>Student Name:</label>
                        <input class="form-control" type="text"  placeholder="Enter StudentName" v-model="form.StudentName" name="StudentName" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentName')">
                             {{ errors.first('step1.StudentName') }}
                          </p>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label>Student Email:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Email" v-model="form.StudentEmail" name="StudentEmail" v-validate="'required'" data-vv-scope="step1"  />
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
                        <label>Student Password:</label>
                        <input class="form-control" type="password" name="StudentPassword"  placeholder="Enter Student Password" v-model="form.StudentPassword"  v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentPassword')">
                             {{ errors.first('step1.StudentPassword') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label>Student Date Of Birth:</label>
                        <input class="form-control" type="date"  placeholder="Enter Student Date Of Birth" v-model="form.StudentDateOfBirth" name="StudentDateOfBirth" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentDateOfBirth')">
                             {{ errors.first('step1.StudentDateOfBirth') }}
                          </p>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label>Student Birth Certificate No:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Birth Certificate No" v-model="form.StudentBirthCertificateNo" name="StudentBirthCertificateNo" maxlength="17" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentBirthCertificateNo')">
                             {{ errors.first('step1.StudentBirthCertificateNo') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4 mt-3" v-if="form.StudentClass=='Nine' || form.StudentClass=='Ten'" id="Sgroup" >
                    <div class="form-group">
                        <label>Student Group:</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGroup" name="StudentGroup" v-validate="'required'" data-vv-scope="step1" >
                            <option value="">
                                SELECT
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
                         <p class="help is-danger" v-show="errors.has('step1.StudentGroup')">
                             {{ errors.first('step1.StudentGroup') }}
                          </p>
                    </div>







                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label>Student Address:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Address" v-model="form.StudentAddress" name="StudentAddress" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentAddress')">
                             {{ errors.first('step1.StudentAddress') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label>Student Phone Number:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Phone Number" v-model="form.StudentPhoneNumber" name="StudentPhoneNumber" maxlength="11" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentPhoneNumber')">
                             {{ errors.first('step1.StudentPhoneNumber') }}
                          </p>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label>Area Postal Code:</label>
                        <input class="form-control" type="text"  placeholder="Enter Area Postal Code" v-model="form.AreaPostalCode" name="AreaPostalCode" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.AreaPostalCode')">
                             {{ errors.first('step1.AreaPostalCode') }}
                          </p>
                    </div>
                </div>



                </div>











          </tab>
          <tab name="Parent Details" data-vv-scope="step2">
           <div class="row">





                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Father Name:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Father Name" v-model="form.StudentFatherName" name="StudentFatherName"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.StudentFatherName')">
                             {{ errors.first('step2.StudentFatherName') }}
                          </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Mother Name:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Mother Name" v-model="form.StudentMotherName" name="StudentMotherName"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.StudentMotherName')">
                             {{ errors.first('step2.StudentMotherName') }}
                          </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Father Occupation:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Father Occupation" v-model="form.StudentFatherOccupation" name="StudentFatherOccupation"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.StudentFatherOccupation')">
                             {{ errors.first('step2.StudentFatherOccupation') }}
                          </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Mother Occupation:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Mother Occupation" v-model="form.StudentMotherOccupation" name="StudentMotherOccupation"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.StudentMotherOccupation')">
                             {{ errors.first('step2.StudentMotherOccupation') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Parent Email:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Email" v-model="form.ParentEmail" name="ParentEmail"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.ParentEmail')">
                             {{ errors.first('step2.ParentEmail') }}
                          </p>

                            <p class="help is-danger" v-show="parentEmailerror!=''">
                             {{ parentEmailerror }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Parent Password:</label>
                        <input class="form-control" type="password"  placeholder="Enter Student Password" v-model="form.ParentPassword" name="ParentPassword"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.ParentPassword')">
                             {{ errors.first('step2.ParentPassword') }}
                          </p>
                    </div>
                </div>


                </div>
          </tab>
          <tab name="Preview" info="Finishing Up" >
                <div class="row">

                    <div class="col-md-12"><h2 class="previewHead">Student Details</h2></div>
                    <div class="col-md-6"><b>AdmissionID : </b>{{ this.form.AdmissionID }}</div>
                    <div class="col-md-6"><b>StudentClass : </b>{{ this.form.StudentClass }}</div>
                    <div class="col-md-6"><b>StudentGender : </b>{{ this.form.StudentGender }}</div>
                    <div class="col-md-6"><b>StudentReligion : </b>{{ this.form.StudentReligion }}</div>
                    <div class="col-md-6"><b>StudentName : </b>{{ this.form.StudentName }}</div>
                    <div class="col-md-6"><b>StudentEmail : </b>{{ this.form.StudentEmail }}</div>
                    <div class="col-md-6"><b>StudentPassword : </b>{{ this.form.StudentPassword }}</div>
                    <div class="col-md-6"><b>StudentDateOfBirth : </b>{{ this.form.StudentDateOfBirth }}</div>
                    <div class="col-md-6"><b>StudentBirthCertificateNo : </b>{{ this.form.StudentBirthCertificateNo }}</div>
                    <div class="col-md-6"><b>StudentAddress : </b>{{ this.form.StudentAddress }}</div>
                    <div class="col-md-6"><b>StudentPhoneNumber : </b>{{ this.form.StudentPhoneNumber }}</div>
                    <div class="col-md-6"><b>AreaPostalCode : </b>{{ this.form.AreaPostalCode }}</div>

                    <div class="col-md-12"><h2 class="previewHead">Parent Details</h2></div>
                    <div class="col-md-6"><b>StudentFatherName : </b>{{ this.form.StudentFatherName }}</div>
                    <div class="col-md-6"><b>StudentMotherName : </b>{{ this.form.StudentMotherName }}</div>
                    <div class="col-md-6"><b>StudentFatherOccupation : </b>{{ this.form.StudentFatherOccupation }}</div>
                    <div class="col-md-6"><b>StudentMotherOccupation : </b>{{ this.form.StudentMotherOccupation }}</div>
                    <div class="col-md-6"><b>ParentEmail : </b>{{ this.form.ParentEmail }}</div>
                    <div class="col-md-6"><b>ParentPassword : </b>{{ this.form.ParentPassword }}</div>


                </div>
          </tab>







        </div>
        <br/>
        <div class="field is-grouped">
            <div class="control" v-if="currentActive > 0">
                <button @click="previousTab()" class="button is-primary">Previous</button>
            </div>
            <div class="control" v-if="currentActive < totalTabs - 1">
                <button @click="nextTab()" class="button is-link">Next</button>
            </div>
            <div class="control" v-if="currentActive == totalTabs -1" >
                <button @click="submit()" class="button is-success">Submit</button>
            </div>
        </div>

    </div>
</template>

<script>
import Vue from 'vue';
import VeeValidate from 'vee-validate';
// import FormWizard from './form/FormWizard.vue';
import Tab from './form/Tab.vue';
// import 'bulma/css/bulma.css'

Vue.use(VeeValidate);

export default {
  name: 'app',

  components: {
     Tab
  },


  data(){
    return{
        tabs: [],

        currentActive: 0,
        studentEmailerror: '',
        studentEmailstatus:false,
        parentEmailerror: '',
        parentEmailstatus:false,
        totalTabs: 0,
        classes: [],
        preloader:false,
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
            StudentFatherName:null,
            StudentMotherName:null,
            StudentFatherOccupation:null,
            StudentMotherOccupation:null,
            ParentEmail:null,
            StudentPassword:null,
            StudentEmail:null,
            StudentPassword:null,
            StudentDateOfBirth:null,
            StudentBirthCertificateNo:null,
            StudentGroup:null,
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
            status:null,
        }



    }
   },

    created(){
        this.tabs = this.$children;

            this.classes =  User.classlist();
            this.form.school_id = getschoolid
            //  console.log(this.$router.history.current.query.step);



    },

    mounted(){
        this.totalTabs = this.tabs.length;

    },

  watch: {

        'form.StudentEmail'(value){

                axios.post(`/api/users/checks`,{'email':value})
                    .then(({data}) => {
                        // console.log(data)
                        if(data.response.errors.email[0]==''){
                            this.studentEmailstatus = true
                        }else{
                            this.studentEmailstatus = false
                        }
                        this.studentEmailerror = data.response.errors.email[0]

                    })
                     .catch(error => {
                        console.log(error)
                        // this.errored = true
                    })
                },

        'form.ParentEmail'(value){

                axios.post(`/api/users/checks`,{'email':value})
                    .then(({data}) => {
                        // console.log(data)

                        if(data.response.errors.email[0]==''){

                            this.parentEmailerror = data.response.errors.email[0]

                            if(this.form.StudentEmail==this.form.ParentEmail){
                                this.parentEmailstatus = false
                                this.parentEmailerror = 'Student And Parent Email Must be defarent'

                            }else{

                                this.parentEmailstatus = true
                                 this.parentEmailerror = ''
                            }

                            // this.parentEmailstatus = true



                        }else{
                            this.parentEmailstatus = false
                             this.parentEmailerror = data.response.errors.email[0]
                        }



                    })
                     .catch(error => {
                        console.log(error)
                        // this.errored = true
                    })
                }




  },
    methods:{


            checkstudent(){

if(this.form.StudentClass!='Nine' || this.form.StudentClass!='Ten') this.form.StudentGroup=''


		axios.get(`/api/student/admissionid/genarate?school_id=${this.form.school_id}`)
			.then(({data}) => {
                this.form.AdmissionID = data;

            })
			.catch()
        },



        previousTab(){
            this.currentActive--;
            this.tabs.forEach(tab => {
                tab.isActive = false;
            });
                this.tabs[this.currentActive].isActive = true;

        },

        nextTab(){
            //Validate input
            this.$root.$validator.validate('step'+(this.currentActive+ 1)+'.*').then(valid => {

                // console.log(valid)


    if(this.currentActive==0){
                if (valid && this.studentEmailstatus){
                    this.currentActive++;
                    this.tabs.forEach(tab => {
                        tab.isActive = false;
                    });

                    this.tabs[this.currentActive].isActive = true;
                }
         }else if(this.currentActive==1){
                if (valid && this.parentEmailstatus){
                    this.currentActive++;
                    this.tabs.forEach(tab => {
                        tab.isActive = false;
                    });

                    this.tabs[this.currentActive].isActive = true;
                }
    }






            });





        },







       submit() {

                      this.preloader = true;
                axios.post(`/api/students/form/submit`,this.form)
                .then(({data}) => {
                    //  console.log(data)
                        // this.$router.push({name: 'students'})
                        Notification.success();
                                  this.preloader = false;
                })
                .catch(() => {
                    // this.$router.push({name: 'supplier'})
                })

       }

        // submit(){

        //     this.$root.$validator.validate('step'+this.totalTabs+'.*').then(valid => {
        //         if (valid){
        //             alert("Everything passes ! Ready to Submit")
        //         }
        //     });
        // }
    }






}
</script>

<style lang="scss">

@import "~bulma/bulma.sass";
@import "~bulma-steps-component/bulma-steps.sass";


[v-cloak] { display: none; }


.previewHead{
    font-size: 30px;
    font-weight: 500;
    border-bottom: 3px solid #00d1b2;
    line-height: 2;
    margin: 25px 0;
}

</style>
