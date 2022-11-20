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



        <form  enctype="multipart/form-data" method="POST" v-on:submit.prevent="formsubmit" >



            <div class="row">


                 <div class="col-md-12">
                    <div class="form-group">
                        <label>Meta keywords:</label>
                        <textarea v-model="form.meta_keywords" id="meta_keywords" cols="30" rows="4" class="form-control"  placeholder="Address" style="height:100px" required></textarea>

                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label>Meta Description:</label>
                        <textarea v-model="form.meta_description" id="meta_description" cols="30" rows="4" class="form-control"  placeholder="History Of The Organization" style="resize: none;height:100px" required></textarea>

                    </div>
                </div>




                <div class="col-md-12">
                    <div class="form-group">
                        <label>Meta Author:</label>
                        <textarea v-model="form.meta_author" id="meta_author" cols="30" rows="4" class="form-control"  placeholder="History Of The Organization" style="resize: none;height:100px" required></textarea>

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

            form:{},
            preloader: true,

		}
	},

	methods: {


        getSchoolData(){
            axios.get(`/api/school/settings?school_id=${this.school_id}`)
                .then(({ data }) => {
                    // console.log(data)
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
