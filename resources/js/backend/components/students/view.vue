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
                    <router-link :to="{name:'students'}">Student</router-link>
                </li>
                <li>{{ form.StudentName }}</li>
            </ul>
        </div>
        <!-- Breadcubs Area End Here -->

   <!-- Student Details Area Start Here -->
  <div class="card height-auto">
    <div class="card-body">
                        <router-link  class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                             to="">
                            GO BACK
                        </router-link>
        <div class="heading-layout1">


            <div class="item-title">
                <h3>About Student</h3>
            </div>

        </div>
        <div class="single-info-details">
            <div class="item-img">



                    <div class="form-input" style="width: 100%;">
                        <div class="preview">
                        <img :src="$asseturl+form.StudentPicture" id="file-ip-1-preview">
                        </div>
                        <label for="file-ip-1">Choose File</label>
                        <input type="file" id="file-ip-1"  @change="studentimage">

                    </div>





                <!-- <img :src="ASSETURL+form.StudentPicture" alt="student"> -->
            </div>
            <div class="item-content">
                <div class="header-inline item-header">
                    <h3 class="text-dark-medium font-medium">{{ form.StudentName }}</h3>
                    <div class="header-elements">

                    </div>
                </div>

                <div class="info-table table-responsive">
                    <table class="table text-nowrap">
                        <tbody>
                            <tr>
                                <td>Name:</td>
                                <td class="font-medium text-dark-medium">{{ form.StudentName }}</td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td class="font-medium text-dark-medium">{{ form.StudentGender }}</td>
                            </tr>
                            <tr>
                                <td>Application Date:</td>
                                <td class="font-medium text-dark-medium">{{ dateformatGlobal(form.created_at)[3]	 }}</td>
                            </tr>
                            <tr>
                                <td>Class:</td>
                                <td class="font-medium text-dark-medium">{{ form.StudentClass }}</td>
                            </tr>

                            <tr>
                                <td>Roll:</td>
                                <td class="font-medium text-dark-medium">{{ form.StudentRoll }}</td>
                            </tr>
                            <tr>
                                <td>Aplication Id:</td>
                                <td class="font-medium text-dark-medium">{{ form.AdmissionID }}</td>
                            </tr>
                            <tr>
                                <td>Student Id:</td>
                                <td class="font-medium text-dark-medium">{{ form.StudentID }}</td>
                            </tr>
                            <tr>
                                <td>Father Name:</td>
                                <td class="font-medium text-dark-medium"  style="text-transform: uppercase;">{{ form.StudentFatherName }}</td>
                            </tr>
                            <tr>
                                <td>Mother Name:</td>
                                <td class="font-medium text-dark-medium"  style="text-transform: uppercase;">{{ form.StudentMotherName }}</td>
                            </tr>
                            <tr>
                                <td>Date Of Birth:</td>
                                <td class="font-medium text-dark-medium">{{ dateformatGlobal(form.StudentDateOfBirth)[3] }}</td>
                            </tr>
                            <tr>
                                <td>Religion:</td>
                                <td class="font-medium text-dark-medium">{{ form.StudentReligion }}</td>
                            </tr>
                            <tr>
                                <td>Father Occupation:</td>
                                <td class="font-medium text-dark-medium">{{ form.StudentFatherOccupation }}</td>
                            </tr>
                            <tr>
                                <td>E-mail:</td>
                                <td class="font-medium text-dark-medium">{{ form.StudentEmail }}</td>
                            </tr>

                            <tr>
                                <td>Address:</td>
                                <td class="font-medium text-dark-medium">{{ form.StudentAddress }}</td>
                            </tr>
                            <tr>
                                <td>Postal Code:</td>
                                <td class="font-medium text-dark-medium">{{ form.AreaPostalCode }}</td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td class="font-medium text-dark-medium">{{ form.StudentPhoneNumber }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
        this.ASSETURL = ASSETURL
	},

	data () {
		return {
            form:{},

            editid:'',
            ASSETURL: '',
            classdisable:false,
               preloader: true,
		}
	},

	methods: {



	studentimage(event){

			let file = event.target.files[0];
			if (file.size > 5048576) {
				Notification.image_validation();
			} else {
				let reader = new FileReader;
				reader.onload = event => {
					this.form.StudentPicture = event.target.result
					// console.log(event.target.result);
 this.preloader = true;
                axios.post('/api/students/image/upload',this.form)
                .then(({ data }) => {



                        // this.$router.push({ path: $routerHistory.previous().path })
                        Notification.success();
                        // this.preloader = false;
                        // return this.$router.go(-1)
                        this.getstudent();


                })
                .catch()



				};
				reader.readAsDataURL(file)
			}
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




	},
	mounted(){




           this.editid = this.$route.params.id;
           this.getstudent();

// console.log(this.$router.go(-1))


	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
