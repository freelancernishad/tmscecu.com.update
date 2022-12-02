<template>
	<div>
        <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
   <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Staffs</h3>
                  <ul>
                <li>
                    <router-link :to="{name:'home'}">Home</router-link>
                </li>
                <li>
                    <router-link  v-if="this.editid!=''" :to="{name:'staffs'}">Staffs</router-link> <span v-else>Admission Form</span>
                </li>
                <li v-if="this.editid!=''">{{ form.TeacherName }}</li>
            </ul>
        </div>
        <!-- Breadcubs Area End Here -->
  <!-- Admit Form Area Start Here -->
  <div class="card height-auto">
    <div class="card-body">

        <div class="heading-layout1">
            <div class="item-title">
                        <router-link  class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                             to="">
                            GO BACK
                        </router-link>
            </div>
            <div class="dropdown">



            </div>
        </div>



        <form  enctype="multipart/form-data" v-on:submit.prevent="formsubmit" >



    <input class="form-control" type="hidden" v-model="form.school_id" id="school_id" />

    <input class="form-control" type="hidden"  v-model="form.id" id="id" />



    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher ID:</label>
                <input class="form-control" type="text"  placeholder="Enter Teacher ID" v-model="form.TeacherId" id="TeacherId" readonly required />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher Name:</label>
                <input class="form-control" type="text"  placeholder="Enter Teacher Name" v-model="form.TeacherName" id="TeacherName" required />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher Gender:</label>

                <select class="form-control" style="width: 100%;" v-model="form.TeacherGender" id="TeacherGender" required>
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
                <label>Teacher Email:</label>


                    <input class="form-control" type="text"  v-model="form.TeacherEmail" required />


            </div>
        </div>



        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher Password:</label>


                    <input class="form-control" type="password"  v-model="form.teacherPassword" required />


            </div>
        </div>



        <div class="col-md-4">
            <div class="form-group">

                <label>Teacher Phone Number:</label>
                <input class="form-control" type="text"  v-model="form.TeacherPhoneNumber"  required />

            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher Address:</label>
                <input class="form-control" type="text" placeholder="Enter Teacher Address" v-model="form.TeacherAddress" id="TeacherAddress" required />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher Position:</label>

                <select v-model="form.TeacherPosition" id="TeacherPosition" class="form-control">
                    <option>Head Master</option>
                    <option>Assistent Head Master</option>
                    <option>Assistent Teacher</option>
                    <option>Office Assistent Cum-Accountent</option>
                    <option>M.L.S.S.</option>
                </select>

            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher Qualification:</label>
                <input class="form-control" type="text" placeholder="Enter Teacher Qualification" v-model="form.TeacherQualification" id="TeacherQualification" required />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Incharge Class:</label>
                <select class="form-control" style="width: 100%;" v-model="form.InchargeClass" id="InchargeClass" required>
                        <option value="">
                            SELECT
                        </option>
   <option v-for="classlist in classess">{{ classlist }}</option>
                    </select>
            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher Date Of Birth:</label>
                <input class="form-control air-datepicker" type="date" placeholder="Enter Teacher Date Of Birth" v-model="form.TeacherDateOfBirth" id="TeacherDateOfBirth" required />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher Joining Date:</label>
                <input class="form-control air-datepicker" type="date" placeholder="Enter Teacher Joining Date" v-model="form.TeacherJoiningDate" id="TeacherJoiningDate"  />
            </div>
        </div>
        <div class="col-md-4 d-none">
            <div class="form-group">
                <label>Teacher Leaving Date:</label>
                <input class="form-control air-datepicker" type="date" placeholder="Enter Teacher Leaving Date" v-model="form.TeacherLeavingDate" id="TeacherLeavingDate"  />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher Working Hours:</label>
                <input class="form-control" type="text" placeholder="Enter Teacher Working Hours" v-model="form.TeacherWorkingHours" id="TeacherWorkingHours" required />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher Subject Handling:</label>

                <input class="form-control" type="text" placeholder="Enter Teacher Subject Handling" v-model="form.TeacherSubjectHandling" id="TeacherSubjectHandling" required />

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Teacher Status:</label>

                <select class="form-control" style="width: 100%;" v-model="form.TeacherStatus" id="TeacherStatus" required>
                    <option>
                        Active
                    </option>
                    <option>
                        Pending
                    </option>

                    <option>
                        Reject
                    </option>
                    <option>
                        Leave
                    </option>
                </select>

            </div>



        </div>

        <div class="col-md-12">
				<div class="fileUpload" style="    position: relative !important;">
				<label for="fileupload" id="fileChoiceLable">
					<img width="100%" height="100%" :src="form.ProfilePicture" v-if="form.ProfilePicture" alt="" />
                    <span style="text-align: center;" v-else >Click Here to Upload Staff Image <br> 300x300</span>

				</label>
					<input type="file" id="fileupload" style="display:none"  @change="FileSelected($event, 'ProfilePicture')" />

				</div>
            </div>


        <div class="col-md-12">
            <div class="form-group">


    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
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
            TeacherName:null,
            TeacherGender:null,
            TeacherDateOfBirth:null,
            TeacherId:null,
            TeacherEmail:null,
            teacherPassword:null,
            TeacherPhoneNumber:null,
            TeacherPosition:null,
            TeacherQualification:null,
            TeacherJoiningDate:null,
            TeacherLeavingDate:null,
            TeacherWorkingHours:null,
            TeacherAddress:null,
            TeacherSubjectHandling:null,
            InchargeClass:null,
            ProfilePicture:null,
            TeacherStatus:null
            },

            editid:'',
            preloader: true,
            classdisable:false
		}
	},

	methods: {


        FileSelected($event, parent_index) {
            let file = $event.target.files[0];
            // console.log(file)
            if (file.size > 5048576) {
                Notification.image_validation();
            } else {
                let reader = new FileReader;
                reader.onload = event => {




                //Initiate the JavaScript Image object.
                var image = new Image();

                //Set the Base64 string return from FileReader as source.
                image.src = event.target.result;

                //Validate the File Height and Width.

                var formThis = this;

                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    //  console.log( width,height)
                    if (height===width) {
                        formThis.form[parent_index] = event.target.result
                        return false;
                    }
                    alert("Uploaded image has valid Height and Width.");
                    return true;
                };











                };
                reader.readAsDataURL(file)
            }
            //   console.log($event.target.result);
        },


        getstaffs(){
                axios.get(`/api/staffs/single?filter[id]=${this.editid}`)
                                .then(({data}) => {
                                    //  console.log(data)
                                    this.form = data
                                    this.form['ProfilePicture'] = this.$asseturl+data.ProfilePicture

                                                  this.preloader = false;
                                })
                                .catch(() => {
                                    // this.$router.push({name: 'supplier'})
                                })
        },


        formsubmit(){
            if(this.form.ProfilePicture){


                          this.preloader = true;
                axios.post(`/api/staffs/form/submit`,this.form)
                                .then(({data}) => {
                                    //  console.log(data)
                                        this.$router.push({name: 'staffs'})
                                        Notification.success();
                                                      this.preloader = false;
                                })
                                .catch(() => {
                                    // this.$router.push({name: 'supplier'})
                                })


                            }else{
                        Notification.customError2('Staffs image is required!');
                          this.preloader = false;
                    }

        }





	},
	mounted(){



       if(this.$route.params.id){

           this.editid = this.$route.params.id;
       }else{
                this.preloader = false;
       }
       if(this.editid!=''){

           this.getstaffs();
           this.classdisable  = true
       }


	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}




.fileUpload {
    width: 195px;
    height: 195px;
    border: 1px solid;
	position: absolute;
    top: 0;
    right: 0;
}
#fileChoiceLable{
	width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}
</style>
