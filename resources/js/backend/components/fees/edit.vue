<template>
    <div>
        <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <div class="breadcrumbs-area">
            <h3>Fees Edit</h3>
            <ul>
                <li>
                    <router-link to="/dashboard">Home</router-link>
                </li>
                <li>Fees Edit</li>
            </ul>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="" class="row"  v-on:submit.prevent="formsubmit">


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">শ্রেণি : {{ class_en_to_bn(form.class) }}</label> <br/>
                            <label for="">ফি এর ধরণ : {{ feesconvert(form.type) }}</label> <br/>
                            <label for="">পরীক্ষার নাম : {{ ex_name(form.sub_type) }}</label> <br/>

                        </div>
                    </div>






                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">ফি এর পরিমাণ</label>
                            <input type="text" class="form-control" v-model="form.fees">
                        </div>
                    </div>


                    <div class="col-md-6">

                        <label for="">ফি স্ট্যাটাস</label> <br/>
                        <label class="switch">
                            <input type="checkbox" v-model="form.status" >
                            <span class="slider round"></span>
                        </label>

                    </div>


                    <div class="col-md-12">
                        <button class="btn btn-info py-3 px-5">Update</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
</template>

<script>
export default {
    data() {
        return {
            form:{
                fees:0,
                status:0,
            },
            preloader:true,
        }
    },
    methods: {
        async getData(){
            var res = await this.callApi('get',`/api/school/fees/${this.$route.params.id}`,[]);
            this.form = res.data

            if(res.data.status=='0'){
                this.form['status'] = false
            }else{

                this.form['status'] = true
            }


            this.preloader = false;
        },

        formsubmit(){

            this.preloader = true;
                this.form['id'] = this.$route.params.id;
                axios.post(`/api/school/update/fees`,this.form)
                .then(({data}) => {

                    this.$router.go(-1)
                })
                .catch(() => {})
        }


    },
    mounted() {
        this.getData();
    },
}
</script>

<style scoped>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
