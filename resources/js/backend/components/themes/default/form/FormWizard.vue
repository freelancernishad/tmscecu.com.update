<template>
    <div>
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


 <tab name="Step 1" info="Your name and Email" :selected="true">



 <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Admission ID:</label>
                        <input class="form-control" type="text"  placeholder="Enter Admission ID" v-model="formData.form.AdmissionID" name="AdmissionID" readonly v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.AdmissionID')">
                             {{ errors.first('step1.AdmissionID') }}
                          </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Class:</label>


                            <select  class="form-control"  style="width: 100%;" v-model="formData.form.StudentClass" name="StudentClass" @change="checkstudent"  v-validate="'required'" data-vv-scope="step1">
                                <option value="">
                                    SELECT
                                </option>
                                <option v-for="classlist in formData.classes[0]">{{ classlist }}</option>
                            </select>
                         <p class="help is-danger" v-show="errors.has('step1.StudentClass')">
                             {{ errors.first('step1.StudentClass') }}
                          </p>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Gender:</label>
                        <select class="form-control" style="width: 100%;" v-model="formData.form.StudentGender" name="StudentGender" v-validate="'required'" data-vv-scope="step1">
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Religion:</label>
                        <select class="form-control" style="width: 100%;" v-model="formData.form.StudentReligion" name="StudentReligion" v-validate="'required'" data-vv-scope="step1">
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Name:</label>
                        <input class="form-control" type="text"  placeholder="Enter StudentName" v-model="formData.form.StudentName" name="StudentName" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentName')">
                             {{ errors.first('step1.StudentName') }}
                          </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Email:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Email" v-model="formData.form.StudentEmail" name="StudentEmail" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentEmail')">
                             {{ errors.first('step1.StudentEmail') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Password:</label>
                        <input class="form-control" type="password" name="StudentPassword"  placeholder="Enter Student Password" v-model="formData.form.StudentPassword"  v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentPassword')">
                             {{ errors.first('step1.StudentPassword') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Date Of Birth:</label>
                        <input class="form-control" type="date"  placeholder="Enter Student Date Of Birth" v-model="formData.form.StudentDateOfBirth" name="StudentDateOfBirth" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentDateOfBirth')">
                             {{ errors.first('step1.StudentDateOfBirth') }}
                          </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Birth Certificate No:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Birth Certificate No" v-model="formData.form.StudentBirthCertificateNo" name="StudentBirthCertificateNo" maxlength="17" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentBirthCertificateNo')">
                             {{ errors.first('step1.StudentBirthCertificateNo') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4" v-if="formData.form.StudentClass=='Nine' || formData.form.StudentClass=='Ten'" id="Sgroup" >
                    <div class="form-group">
                        <label>Student Group:</label>
                        <select class="form-control" style="width: 100%;" v-model="formData.form.StudentGroup" name="StudentGroup" v-validate="'required'" data-vv-scope="step1" >
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

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Address:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Address" v-model="formData.form.StudentAddress" name="StudentAddress" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentAddress')">
                             {{ errors.first('step1.StudentAddress') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Phone Number:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Phone Number" v-model="formData.form.StudentPhoneNumber" name="StudentPhoneNumber" maxlength="11" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentPhoneNumber')">
                             {{ errors.first('step1.StudentPhoneNumber') }}
                          </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Area Postal Code:</label>
                        <input class="form-control" type="text"  placeholder="Enter Area Postal Code" v-model="formData.form.AreaPostalCode" name="AreaPostalCode" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.AreaPostalCode')">
                             {{ errors.first('step1.AreaPostalCode') }}
                          </p>
                    </div>
                </div>



                </div>











          </tab>
          <tab name="Step 2" info="Basic Info about you" data-vv-scope="step2">
              <div id="form-step-2">
                      <div class="field">
                              <label class="label">About you</label>
                              <div class="control">
                                <textarea class="textarea" name="about"  v-model="formData.form.about" placeholder="Something about you.." v-validate="'required'" data-vv-scope="step2"></textarea>
                                <p class="help is-danger" v-show="errors.has('step2.about')">
                                      {{ errors.first('step2.about') }}
                                </p>
                              </div>
                        </div>
                        <div class="field">
                              <div class="control">
                                  <strong>Gender</strong><br/>
                                <label class="radio">
                                  <input type="radio" name="gender" v-model="formData.form.gender" v-validate="'required'" data-vv-scope="step2" value="Male">
                                  Male
                                </label>
                                <label class="radio">
                                  <input type="radio" name="gender" v-model="formData.form.gender" data-vv-scope="step2" value="Female">
                                  Female
                                </label>
                                <p class="help is-danger" v-show="errors.has('step2.gender')">
                                      {{ errors.first('step2.gender') }}
                                </p>
                              </div>
                        </div>
              </div>
          </tab>
          <tab name="Step 3" info="Finishing Up" >
              <div id="form-step-3">
                      <div class="field">
                              <label class="label">Where did you hear about us?</label>
                              <div class="control">
                                <div class="select" name="reference">
                                  <select v-model="formData.form.reference" v-validate="'required'" name="reference" data-vv-scope="step3">
                                    <option value="">Select</option>
                                    <option value="newspaper">Newspaper</option>
                                    <option value="social-media">Social Media</option>
                                    <option value="other">Other</option>
                                  </select>
                                </div>
                              </div>
                              <p class="help is-danger" v-show="errors.has('step3.reference')">
                                      {{ errors.first('step3.reference') }}
                              </p>
                      </div>
                      <div class="field">
                              <div class="control">
                                <label class="checkbox">
                                  <input type="checkbox" name="terms" v-model="formData.form.terms" data-vv-scope="step3" v-validate="'required'">
                                  I agree to the <a href="#">terms and conditions</a>
                                </label>
                              </div>
                              <p class="help is-danger" v-show="errors.has('step3.terms')">
                                      {{ errors.first('step3.terms') }}
                              </p>
                      </div>
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


export default {
  name: 'form-wizard',

  data(){
    return{
        tabs: [],

        currentActive: 0,
        totalTabs: 0,
        formData:{
            classes: [],

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

    }
   },

    created(){
        this.tabs = this.$children;

            this.formData.classes =  User.classlist();
            this.formData.form.school_id = getschoolid


    },

    mounted(){
        this.totalTabs = this.tabs.length;
    },

    methods:{


            checkstudent(){
                console.log(this.form)
// if(this.formData.form.StudentClass!='Nine' || this.formData.form.StudentClass!='Ten') this.formData.form.StudentGroup=''


// 		axios.get(`/api/student/admissionid/genarate?school_id=${this.form.school_id}`)
// 			.then(({data}) => {
//                 this.form.AdmissionID = data;

//             })
// 			.catch()
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
                if (valid){
                    this.currentActive++;
                    this.tabs.forEach(tab => {
                        tab.isActive = false;
                    });

                    this.tabs[this.currentActive].isActive = true;
                }
            });

        },









        submit(){

            this.$root.$validator.validate('step'+this.totalTabs+'.*').then(valid => {
                if (valid){
                    alert("Everything passes ! Ready to Submit")
                }
            });
        }
    }
}
</script>


<style>
</style>
