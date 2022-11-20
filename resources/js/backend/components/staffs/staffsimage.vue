<template>
    <div>

<loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Students</h3>
            <ul>
                <li>
                    <router-link :to="{ name: 'home' }">Home</router-link>
                </li>
                <li>All Students</li>
            </ul>
        </div>
        <!-- Breadcubs Area End Here -->
        <!-- Student Table Area Start Here -->
        <div class="card height-auto">
            <div class="card-body">

                <div class="heading-layout1">
                    <div class="item-title">
                        <router-link  class="btn-fill-md radius-4 text-light bg-orange-red"
                            v-if="$routerHistory.hasPrevious()" :to="{ path: $routerHistory.previous().path }">
                            GO BACK
                        </router-link>
                    </div>
                    <div class="dropdown">





                    </div>
                </div>

                    <div class="center">
                    <div class="form-input">
                        <div class="preview">
                        <img :src="form.image" id="file-ip-1-preview">
                        </div>
                        <label for="file-ip-1">Choose File</label>
                        <input type="file" id="file-ip-1"  @change="studentimage">

                    </div>
                    </div>

    <button class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" @click="imageupload">Upload file</button>
                </div>
                </div>









    </div>
</template>

<script>
export default {
  props: {
    text:[Number, String],

  },
    created() {
        this.form.id = this.$route.params.id
this.imageget();

    },

    data() {
        return {
            form:{
                id:null,
                image:null,
            },
                preloader: false,
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
					this.form.image = event.target.result
					// console.log(event.target.result);
				};
				reader.readAsDataURL(file)
			}
		},

            imageget(){
                this.preloader = true;
                axios.get('/api/staffs/image/get?id='+this.form.id,this.form)
                .then(({ data }) => {


this.form.image = data
                        // this.$router.push({name: 'students'})
                        // Notification.success();
                        this.preloader = false;


                })
                .catch()
            },


            imageupload(){
                this.preloader = true;
                axios.post('/api/staffs/image/upload',this.form)
                .then(({ data }) => {



                        // this.$router.push({name: 'staffs'})
                        Notification.success();
                        this.preloader = false;
                         return this.$router.go(-1)


                })
                .catch()
            }


    },
    mounted() {


    }
}
</script>
<style>

.center {
  height:100%;
  display:flex;
  align-items:center;
  justify-content:center;

}
.form-input {
  width:350px;
  padding:20px;
  background:#fff;
  box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
              3px 3px 7px rgba(94, 104, 121, 0.377);
}
.form-input input {
  display:none;

}
.form-input label {
  display:block;
  width:45%;
  height:45px;
  margin-left: 25%;
  line-height:50px;
  text-align:center;
  background:#1172c2;

  color:#fff;
  font-size:15px;
  font-family:"Open Sans",sans-serif;
  text-transform:Uppercase;
  font-weight:600;
  border-radius:5px;
  cursor:pointer;
}

.form-input img {
  width:100%;
  /* display:none; */

  margin-bottom:30px;
}

</style>
