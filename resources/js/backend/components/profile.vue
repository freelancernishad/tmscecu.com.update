<template>
<div>
 <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>

<div class="breadcrumbs-area">
    <h3>প্রোফাইল</h3>
    <ul>
        <li>
            <router-link :to="{name:'Dashboard'}">ড্যাশবোর্ড</router-link>
        </li>
        <li>প্রোফাইল</li>
    </ul>
</div>

   <form class="row" @submit.stop.prevent="onSubmit">


        <div class="form-group col-md-6">
          <label for="">নাম</label>
          <input type="text" v-model="form.name" class="form-control" placeholder="" aria-describedby="helpId">
        </div>





        <div class="form-group col-md-6">
          <label for="">ইমেইল</label>
          <input type="text" v-model="form.email" class="form-control" placeholder="" aria-describedby="helpId">
        </div>


        <div class="col-md-12">
      <div class="form-check">
            <input type="checkbox" id="checkboxid" v-model="changepass"  class="form-check-input">
            <label for="checkboxid" class="form-check-label">পাসওয়ার্ড পরিবর্তন করতে চাই</label>
        </div>

        </div>



        <div class="form-group col-md-6" v-if="changepass">
          <label for="">পুরাতন পাসওয়ার্ড</label>
          <input type="text" v-model="oldpassword" class="form-control" placeholder="" aria-describedby="helpId">
        </div>


        <div class="form-group col-md-6" v-if="changepass">
          <label for=""> নতুন পাসওয়ার্ড</label>
          <input type="text" v-model="newpassword" class="form-control" placeholder="" aria-describedby="helpId">
        </div>


        <div class="col-md-12">
    <button class="btn btn-info" type="submit">Submit</button>
</div>
    </form>


</div>


</template>



<script>
import axios from 'axios';
export default {
    created() {

    },
    data() {
        return {
             preLooding:true,
             changepass:false,
             oldpassword:'',
             newpassword:'',
              form:{
                id:null,
                unioun:null,
                name:null,
                email:null,
                phone:null,
                email_verified_at:null,
                password:null,
                position:null,
                full_unioun_name:null,
                district:'পঞ্চগড়',
                thana:'',
                gram:null,
                word:null,
                description:null,
                image:null,
                status:null,
                role:1,
                remember_token:null,
                created_at:null,
                updated_at:null,
            }
        }
    },
    methods: {


     async getsonodById(){
        //    var id =  this.Users.id;
        //     var res = await this.callApi('get', `/api/update/users/${id}`, []);
            this.form = this.Users;
            this.preLooding = false
        },


        async onSubmit() {
            this.preLooding = true

            this.form['changepass'] = this.changepass
            this.form['oldpassword'] = this.oldpassword
            this.form['newpassword'] = this.newpassword
            var res = await this.callApi('post', '/api/update/users', this.form);
            if(res.data==0){
                //old password does not match
                  Notification.customError('সঠিক পুরাতন পাসওয়ার্ড প্রদান করুন');

            }else if(res.data==2){
                //naew and old password does not match
                  Notification.customError('পুরাতন পাসওয়ার্ড এবং নতুন পাসওয়ার্ড মিলে নি');
            }else{
                // all ok
                  Notification.customSuccess('User Update Success');
                  this.getsonodById();
                  this.changepass = false
                  this.oldpassword = '';
                  this.newpassword = '';
            }
            //  this.$router.push({ name: 'userlist'})

            this.preLooding = false

        }
    },
    mounted() {
        setTimeout(()=>{
        this.getsonodById();
         }, 2000);
    }
}
</script>
