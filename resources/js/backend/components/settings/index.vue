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


                <div class="col-md-6">
                    <div class="form-group">
                        <label>School Logo:</label>







                        <input class="form-control" type="file"  placeholder="School Name" name="logo" @change="logochange" />
                    <img  width="100px" id="view_logo" :src="form.logo" />

                    </div>
                </div>


                <div class="col-md-6 d-none">
                    <div class="form-group">
                        <label>Theme:</label>
                        <select v-model="form.theme" id="theme" class="form-control">
                            <option value="">Select</option>
                            <option value="primary">Primary</option>
                            <option value="theme">Theme One</option>
                            <option value="theme1">Theme Two</option>
                            <option value="theme2">Theme Three</option>
                            <option value="theme3">Theme Four</option>
                        </select>


                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label>Application:</label>
                        <select v-model="form.application" id="theme" class="form-control">
                            <option value="">Select</option>
                            <option value="On">On</option>
                            <option value="Off">Off</option>

                        </select>


                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label>School Name:</label>
                        <input class="form-control" type="text" v-model="form.SCHOLL_NAME" placeholder="School Name" id="SCHOLL_NAME" required />
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label>Establishment of school:</label>
                        <input class="form-control" type="text" v-model="form.SCHOLL_BUILD" placeholder="Establishment of school" id="SCHOLL_BUILD" required />
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label>EIIN NO:</label>
                        <input class="form-control" type="text"  placeholder="EIIN NO" v-model="form.SCHOLL_CODE" id="SCHOLL_CODE" required />
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label>Domain (https://example.com):</label>
                        <input class="form-control" type="text"  placeholder="Domain (https://example.com)" v-model="form.school_domain" id="school_domain" required />
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label>Facebook Page Url:</label>
                        <input class="form-control" type="text" placeholder="Facebook Page Url" v-model="form.facebook_page" id="facebook_page" required />
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact Number:</label>
                        <input class="form-control" type="text"  placeholder="Contact Number" v-model="form.contact_number" id="contact_number" required />
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact Email:</label>
                        <input class="form-control" type="text" placeholder="Contact Email" v-model="form.contact_email" id="contact_email" required />
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address:</label>
                        <textarea v-model="form.SCHOLL_ADDRESS" id="SCHOLL_ADDRESS" cols="30" rows="4" class="form-control"  placeholder="Address" style="resize: none;height:100px" required></textarea>

                    </div>
                </div>



            <fieldset class="row col-md-12 mt-3" style="border: 2px solid;">



                <div class="col-md-12">
                    <div class="form-group">
                        <label>History Of The Organization Image:</label>


                        <input class="form-control" type="file" @change="HISTORY_OF_THE_ORGANIZATION_IMAGEchange" />


                    <img  width="100px" id="view_HISTORY_OF_THE_ORGANIZATION_IMAGE" :src="form.HISTORY_OF_THE_ORGANIZATION_IMAGE" alt="">

                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label>History Of The Organization:</label>
                        <textarea v-model="form.HISTORY_OF_THE_ORGANIZATION" id="HISTORY_OF_THE_ORGANIZATION" cols="30" rows="4" class="form-control"  placeholder="History Of The Organization" style="resize: none;height:100px" required></textarea>

                    </div>
                </div>



            </fieldset>

            <fieldset class="row col-md-12 mt-3" style="border: 2px solid;">

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Principals Name:</label>
                        <input class="form-control" type="text" placeholder="Principals Name" v-model="form.Principals_name" id="Principals_name" required />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Principals Image:</label>


                        <input class="form-control" type="file"  @change="PRINCIPALS_IMGAGEchange" />

<img width="100px" id="view_PRINCIPALS_IMGAGE" :src="form.PRINCIPALS_IMGAGE" alt="">



                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Principals Signature:</label>


                        <input class="form-control" type="file"  @change="PRINCIPALS_Signaturechange" />

<img width="100px"  :src="form.PRINCIPALS_Signature" alt="">



                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label>Principals Words:</label>
                        <textarea v-model="form.PRINCIPALS_WORDS" id="PRINCIPALS_WORDS" cols="30" rows="4" class="form-control"  placeholder="History Of The Organization" style="resize: none;height:100px" required></textarea>

                    </div>
                </div>
            </fieldset>
            <fieldset class="row col-md-12 mt-3" style="border: 2px solid;">


                <div class="col-md-12">
                    <div class="form-group">
                        <label>Vice Principals Name:</label>
                        <input class="form-control" type="text" placeholder="Vice Principals Name" v-model="form.Vice_Principals_name" id="Vice_Principals_name" required />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Vice Principals Image:</label>

                        <input class="form-control" type="file" @change="VICE_PRINCIPALS_IMGAGEchange" />
                        <img width="100px" id="view_VICE_PRINCIPALS_IMGAGE" :src="form.VICE_PRINCIPALS_IMGAGE"  alt="">

                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label>Vice Principals Signature:</label>

                        <input class="form-control" type="file" @change="VICE_PRINCIPALS_Signaturechange" />
                        <img width="100px" :src="form.VICE_PRINCIPALS_Signature"  alt="">

                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label>Vice Principals Statement:</label>
                        <textarea v-model="form.VICE_PRINCIPALS_STATEMENT" id="VICE_PRINCIPALS_STATEMENT" cols="30" rows="4" class="form-control"  placeholder="History Of The Organization" style="resize: none;height:100px" required></textarea>

                    </div>
                </div>
            </fieldset>



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

            form:{},
            preloader: true,

		}
	},

	methods: {
        getSchoolData(){
            axios.get(`/api/school/settings?school_id=${this.school_id}`)
                .then(({ data }) => {
                    this.form = data;
this.preloader = false;
                })
                .catch()
        },



    		logochange(event){
			let file = event.target.files[0];
			if (file.size > 5048576) {
				Notification.image_validation();
			} else {
				let reader = new FileReader;
				reader.onload = event => {
					this.form.logo = event.target.result
					// console.log(event.target.result);
				};
				reader.readAsDataURL(file)
			}
		},

    		PRINCIPALS_IMGAGEchange(event){
			let file = event.target.files[0];
			if (file.size > 5048576) {
				Notification.image_validation();
			} else {
				let reader = new FileReader;
				reader.onload = event => {
					this.form.PRINCIPALS_IMGAGE = event.target.result
					// console.log(event.target.result);
				};
				reader.readAsDataURL(file)
			}
		},

    		PRINCIPALS_Signaturechange(event){
			let file = event.target.files[0];
			if (file.size > 5048576) {
				Notification.image_validation();
			} else {
				let reader = new FileReader;
				reader.onload = event => {
					this.form.PRINCIPALS_Signature = event.target.result
					// console.log(event.target.result);
				};
				reader.readAsDataURL(file)
			}
		},

    		HISTORY_OF_THE_ORGANIZATION_IMAGEchange(event){
			let file = event.target.files[0];
			if (file.size > 5048576) {
				Notification.image_validation();
			} else {
				let reader = new FileReader;
				reader.onload = event => {
					this.form.HISTORY_OF_THE_ORGANIZATION_IMAGE = event.target.result
					// console.log(event.target.result);
				};
				reader.readAsDataURL(file)
			}
		},


    		VICE_PRINCIPALS_IMGAGEchange(event){
			let file = event.target.files[0];
			if (file.size > 5048576) {
				Notification.image_validation();
			} else {
				let reader = new FileReader;
				reader.onload = event => {
					this.form.VICE_PRINCIPALS_IMGAGE = event.target.result
					// console.log(event.target.result);
				};
				reader.readAsDataURL(file)
			}
		},

    		VICE_PRINCIPALS_Signaturechange(event){
			let file = event.target.files[0];
			if (file.size > 5048576) {
				Notification.image_validation();
			} else {
				let reader = new FileReader;
				reader.onload = event => {
					this.form.VICE_PRINCIPALS_Signature = event.target.result
					// console.log(event.target.result);
				};
				reader.readAsDataURL(file)
			}
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
