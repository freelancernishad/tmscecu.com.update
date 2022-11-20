<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>

<section class="inner-header divider layer-overlay overlay-theme-colored-7" >
<div class="container">
    <!-- Section Content -->
    <div class="section-content">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-theme-colored2 font-36">Student registration</h1>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="">Home</a></li>
                    <li class="active">Student registration</li>
                </ol>
            </div>
        </div>
    </div>
</div>
</section>
      <div class="container  mt-5 mb-5">
         <div class="panel-group">
            <div class="panel panel-primary">

               <form class="form-horizontal"  v-on:submit.prevent="formsubmit" >
                  <fieldset v-if="step == 1">
                     <div class="panel-body">
                        <h4>Step 1: Student Details</h4>
                        <br>



    <!-- <vue-input type="text" lebel="Input Form"  v-model="model" required="required" />
    <vue-input type="text" lebel="Input Form2"  v-model="model2" required="required" />
 -->


             <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Admission ID:</label>
                        <input class="form-control" type="text"  placeholder="Enter Admission ID" v-model="form.AdmissionID" id="AdmissionID" readonly required />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Class:</label>


                            <select  class="form-control"  style="width: 100%;" v-model="form.StudentClass" id="StudentClass" @change="checkstudent"  required>
                                <option value="">
                                    SELECT
                                </option>
                                <option v-for="classlist in classes[0]">{{ classlist }}</option>
                            </select>

                    </div>


                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Gender:</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGender" id="StudentGender" required>
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
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Religion:</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentReligion" id="StudentReligion" required>
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
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Name:</label>
                        <input class="form-control" type="text"  placeholder="Enter StudentName" v-model="form.StudentName" id="StudentName" required />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Email:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Email" v-model="form.StudentEmail" id="StudentEmail" required />
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Password:</label>
                        <input class="form-control" type="password"  placeholder="Enter Student Password" v-model="form.StudentPassword" id="StudentEmail" required />
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Date Of Birth:</label>
                        <input class="form-control" type="date"  placeholder="Enter Student Date Of Birth" v-model="form.StudentDateOfBirth" id="StudentDateOfBirth" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Birth Certificate No:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Birth Certificate No" v-model="form.StudentBirthCertificateNo" id="StudentBirthCertificateNo" maxlength="17" required />
                    </div>
                </div>



                <div class="col-md-4" v-if="form.StudentClass=='Nine' || form.StudentClass=='Ten'" id="Sgroup" >
                    <div class="form-group">
                        <label>Student Group:</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGroup" id="StudentGroup" >
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
                    </div>







                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Address:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Address" v-model="form.StudentAddress" id="StudentAddress" required />
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Phone Number:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Phone Number" v-model="form.StudentPhoneNumber" id="StudentPhoneNumber" maxlength="11" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Area Postal Code:</label>
                        <input class="form-control" type="text"  placeholder="Enter Area Postal Code" v-model="form.AreaPostalCode" id="AreaPostalCode" required />
                    </div>
                </div>



                </div>




                        <button type="button" @click.prevent="next()" class="btn btn-primary mt-3">Next</button>
                     </div>
                  </fieldset>
                  <fieldset v-if="step == 2">
                     <div class="panel-body">
                        <h4>Step 2: Parent Details</h4>
                        <br>


<div class="row">





                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student Father Name:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Father Name" v-model="form.StudentFatherName" id="StudentFatherName" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Mother Name:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Mother Name" v-model="form.StudentMotherName" id="StudentMotherName" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Father Occupation:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Father Occupation" v-model="form.StudentFatherOccupation" id="StudentFatherOccupation" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Mother Occupation:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Mother Occupation" v-model="form.StudentMotherOccupation" id="StudentMotherOccupation" required />
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Parent Email:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Email" v-model="form.ParentEmail" id="StudentEmail" required />
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Parent Password:</label>
                        <input class="form-control" type="password"  placeholder="Enter Student Password" v-model="form.ParentPassword" id="StudentEmail" required />
                    </div>
                </div>


                </div>




              <button type="button" @click.prevent="prev()" class="btn btn-info">Previous</button>
                        <button type="submit" class="btn btn-success">Save</button>
                     </div>
                  </fieldset>

               </form>
            </div>
         </div>
      </div>
    </div>
</template>
<script>


export default {
        created(){
            this.classes =  User.classlist();
            this.form.school_id = getschoolid
        },
    data() {
            return{
                label:'custom lebel',
                model:'',
                model2:'',
                step:1,
                email:'',
                pwd:'',
                fname:'',
                lname:'',
                mobno:'',
                address:'',
                classes:[],
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
                },
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


       prev() {
           this.step--;
       },

       next() {
           this.step++;
       },

       formsubmit() {

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

    }
}
</script>


