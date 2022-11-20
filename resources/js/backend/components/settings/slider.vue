<template>
	<div>
                    <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
    <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Settings</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Settings</li>
            </ul>
        </div>
        <!-- Breadcubs Area End Here -->
  <!-- Admit Form Area Start Here -->
  <div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">

            </div>
            <div class="dropdown">



            </div>
        </div>



        <form  enctype="multipart/form-data" method="POST" v-on:submit.prevent="formsubmit"  >



            <div class="row">


                 <div class="col-md-12">
                    <div class="form-group">
                        <label>Slider:</label>
                             <vue-upload-multiple-image @upload-success="uploadImageSuccess" @before-remove="beforeRemove"
                            @edit-image="editImage" :data-images="form.slider" dragText="Drag images (multiple)"
                            browseText="(or) Select" primaryText="Default" markIsPrimaryText="Set as default"
                            popupText="This image will be displayed as default" dropText="Drop your files here..."
                            :maxImage="maxImage"></vue-upload-multiple-image>

                    </div>
                </div>







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

	},

	data () {
		return {
        
            maxImage:10,
            form:{},
            preloader: true,

		}
	},

	methods: {

          uploadImageSuccess(formData, index, fileList) {
            //   console.log('data', formData, index, fileList)
            // console.log(formData)
            this.form.slider = fileList
        },
        beforeRemove(index, done, fileList) {
            //   console.log('index', index, fileList)
            var r = confirm("remove image")
            if (r == true) {
                done()
                this.form.slider = fileList
            } else {
            }
        },
        editImage(formData, index, fileList) {
            //   console.log('edit data', formData, index, fileList)
            this.form.slider = fileList
        },



        getSchoolData(){
            axios.get(`/api/school/settings?school_id=${this.school_id}`)
                .then(({ data }) => {
                    this.form = data;
                    this.preloader = false;

                })
                .catch()
        },
        formsubmit(){
            this.preloader = true;
                axios.post(`/api/school/settings/submit`,this.form)
                .then(({data}) => {
                    //  console.log(data)
                        // this.$router.push({name: 'students'})
                        this.getSchoolData();
                        Notification.success();
                        this.preloader = false;
                })
                .catch(() => {
                    // this.$router.push({name: 'supplier'})
                })
        }




	},
	mounted(){
this.getSchoolData();
	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
