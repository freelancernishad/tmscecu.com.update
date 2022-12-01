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
                    <router-link :to="{name:'staffs'}">Staff</router-link>
                </li>
                <li>{{ form.TeacherName }}</li>
            </ul>
        </div>
        <!-- Breadcubs Area End Here -->

   <!-- Staff Details Area Start Here -->
  <div class="card height-auto">
    <div class="card-body">
                        <router-link  class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                             to="">
                            GO BACK
                        </router-link>
        <div class="heading-layout1">


            <div class="item-title">
                <h3>About Staff</h3>
            </div>

        </div>
        <div class="single-info-details">

            <div class="item-img">



<div class="form-input" style="width: 100%;">
    <div class="preview">
    <img :src="$asseturl+form.ProfilePicture" id="file-ip-1-preview">
    </div>
    <label for="file-ip-1">Choose File</label>
    <input type="file" id="file-ip-1"  @change="studentimage">

</div>

</div>




                <!-- <div class="item-img">
                    <img :src="ASSETURL+form.ProfilePicture" alt="teacher">
                </div> -->


                <div class="item-content">
                    <div class="header-inline item-header">
                        <h3 class="text-dark-medium font-medium">{{ form.TeacherName }}</h3>
                        <div class="header-elements">

                        </div>
                    </div>

                    <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td class="font-medium text-dark-medium">{{ form.TeacherName }}</td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td class="font-medium text-dark-medium">{{ form.TeacherGender }}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth:</td>
                                    <td class="font-medium text-dark-medium">{{ dateformatGlobal(form.TeacherDateOfBirth)[3] }}</td>
                                </tr>

                                <tr>
                                    <td>Teacher Id:</td>
                                    <td class="font-medium text-dark-medium">{{ form.TeacherId }}</td>
                                </tr>


                                <tr>
                                    <td>Joining Date:</td>
                                    <td class="font-medium text-dark-medium">{{ dateformatGlobal(form.TeacherJoiningDate)[3] }}</td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td class="font-medium text-dark-medium">{{ form.TeacherEmail }}</td>
                                </tr>
                                <tr>
                                    <td>Subject:</td>
                                    <td class="font-medium text-dark-medium">{{ form.TeacherSubjectHandling }}</td>
                                </tr>
                                <tr>
                                    <td>Class:</td>
                                    <td class="font-medium text-dark-medium">{{ form.InchargeClass }}</td>
                                </tr>


                                <tr>
                                    <td>Phone:</td>
                                    <td class="font-medium text-dark-medium">{{ form.TeacherPhoneNumber }}</td>
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
                           preloader: true,
            classdisable:false
		}
	},

	methods: {



        getstaff(){
                axios.get(`/api/staffs/single?filter[id]=${this.editid}`)
                                .then(({data}) => {
                                    //  console.log(data)
                                    this.form = data
                                                  this.preloader = false;
                                })
                                .catch(() => {
                                    // this.$router.push({name: 'supplier'})
                                })
        },



        studentimage(event){

let file = event.target.files[0];
if (file.size > 5048576) {
    Notification.image_validation();
} else {
    let reader = new FileReader;
    reader.onload = event => {
        this.form.ProfilePicture = event.target.result
        // console.log(event.target.result);
this.preloader = true;
    axios.post('/api/staffs/image/upload',this.form)
    .then(({ data }) => {



            // this.$router.push({ path: $routerHistory.previous().path })
            Notification.success();
            // this.preloader = false;
            // return this.$router.go(-1)
            this.getstaff();



    })
    .catch()



    };
    reader.readAsDataURL(file)
}
},






	},
	mounted(){




           this.editid = this.$route.params.id;
           this.getstaff();

// console.log(this.$router.go(-1))


	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
