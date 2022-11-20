<template>
	<div>
                        <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
  <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Staffs Attendence</h3>
        <ul>
            <li>
                <router-link :to="{name:'home'}">Home</router-link>
            </li>
            <li>Staffs Attendence</li>
        </ul>
    </div>



    <div class="card height-auto">
        <div class="card-body">

  <form  enctype="multipart/form-data" v-on:submit.prevent="formsubmit" >

            <div class="heading-layout1">
                <div class="item-title">
                    <router-link  class="btn-fill-md radius-4 text-light bg-orange-red"
                             to="">
                            GO BACK
                        </router-link>
                </div>
                <div class="dropdown">


                </div>
            </div>

            <div class="row gutters-8">


                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    <div class="form-group student_class">
                        <label>View :</label>
                        <select class="form-control" style="width: 100%;" v-model="veiwtype"
                             id="view" required>
                            <option value="">select</option>
                            <option>Monthly</option>
                            <option>Daily</option>
                        </select>
                    </div>
                </div>


                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group" v-if="veiwtype=='Monthly'">
                <div class='form-group' ><label>Month:</label>
                <input type='month' class='form-control' style='width: 100%;' v-model="dateormonth"  required /></div>
                </div>

                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group" v-else-if="veiwtype=='Daily'">
                <div class='form-group' ><label>Date:</label>
                <input type='date' class='form-control' style='width: 100%;' v-model="dateormonth"  required /></div>
                </div>


                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group customFlex" style="margin-top:11px">
                    <div class="form-group student_class">
                        <label></label>
                        <br>
                        <input type="button" @click="filter" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Filter" id="submit" />
                    </div>
                </div>
            </div>




            <h5>
                <div class="well tex-center">DATE :

                </div>
            </h5>
            <h5>
                <center> STAFFS ATTENDANCE</center>

            </h5>
            <div class="table-responsive">

              <table class="table display text-nowrap">



                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th class="" scope="col" v-if="counttype==1">Edit Attendance</th>
                        <th class="" scope="col" v-else>Attendance</th>
                        <!-- <th class="" scope="col" v-if="counttype==1"></th> -->
                    </tr>
                </thead>


                <tbody>
                        <tr v-for="(att,index) in dailyatten">




                            <td scope="col">{{ att.TeacherName }}


                            </td>
                            <td scope="col" v-if="counttype==1">
                                <input @click="updateattendance(att.id)"  type="radio"  class="Present d-none" :id="'Present'+att.id" value="Present" v-model="form.attendence[att.id]"  :disabled="disabled[att.id]" />
                                <label class="Present att" :for="'Present'+att.id">Present</label>
                                <input  @click="updateattendance(att.id)" type="radio" class="d-none" :id="'Absent'+att.id" value="Absent" v-model="form.attendence[att.id]" :disabled="disabled[att.id]"/>
                                <label class="att" :for="'Absent'+att.id">Absent</label>
                            </td>
                            <td scope="col" v-else>
                                <input  type="radio"  class="Present d-none" :id="'Present'+att.id" value="Present" v-model="form.attendence[att.id]"  :disabled="disabled[att.id]" />
                                <label class="Present att" :for="'Present'+att.id">Present</label>
                                <input  type="radio" class="d-none" :id="'Absent'+att.id" value="Absent" v-model="form.attendence[att.id]" :disabled="disabled[att.id]"/>
                                <label class="att" :for="'Absent'+att.id">Absent</label>
                            </td>
                            <!-- <td scope="col" v-if="counttype==1">
                                <router-link   :to="{name:'staffs_attendance_edit', params: {date:dateormonth,id:att.id } }"
                                    class="btn-fill-lmd text-light gradient-dodger-blue">edit</router-link>
                            </td> -->
                        </tr>
                </tbody>
            </table>



         </div>
            <div class="form-group">
                <div v-if="counttype==1"></div>
               <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" v-else>SAVE DATA</button>
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
                id:'',
                school_id:'',
                date:'',
                attendence:[],
                data:[],
            },
             preloader: true,

            dailyatten:{},
 
            veiwtype:'',

            counttype:'',
            dateormonth:'',
            disabled:[],




		}
	},

	methods: {

            filter(){
                this.preloader = true;
                if(this.$router.currentRoute.path===`/school/staffs/attendance/${this.veiwtype}/${this.dateormonth}`){

                }else{
                    if(this.veiwtype=='Daily'){

                        this.$router.push({name:'staffs_attendance_daily', params: { type: this.veiwtype, date:this.dateormonth }})
                    }else if(this.veiwtype=='Monthly'){

                        this.$router.push({name:'staffs_attendance_monthly', params: { type: this.veiwtype, date:this.dateormonth }})
                    }
                    }
                    this.getdata()
            },

            getdata(){
                this.form.date = this.dateormonth;

               this.form.attendence = [];
                this.disabled = [];

                axios.get(`/api/staff/attendance?veiwtype=${this.veiwtype}&dateormonth=${this.dateormonth}&school_id=${this.school_id}`)
                    .then(({data}) => {
                        this.preloader = false;
                        this.counttype = data.counttype;
                        if(data.counttype==1){
                            this.dailyatten = JSON.parse(data.data[0].attendance);
                            this.dailyatten.forEach((value, index) => {
                                 this.form.attendence[value.id]=value.attendence;
                                  this.disabled[value.id]=false;

                            });
                        }else{

                            this.dailyatten = data.data;
                            this.dailyatten.forEach((value, index) => {
                                this.disabled[value.id]=false;

                            });
                        }




                    })
                    .catch(() => {
                        // this.$router.push({name: 'supplier'})
                    })
            },
            formsubmit(){
                this.preloader = true;
                axios.post(`/api/staff/attendance/submit`,this.form)
                .then(({data}) => {
                    this.getdata();
                    this.form.id = '';
                   Notification.success();
                   this.preloader = false;
                })
                .catch(() => {
                    // this.$router.push({name: 'supplier'})
                })
        },
        updateattendance(id){
            this.preloader = true;
            this.form.id = id;
                this.dailyatten.forEach((value, index) => {
                    // console.log(value.TeacherId)
                    this.disabled[value.id]=true;

                });
            setTimeout(() => {

                this.formsubmit()
            }, 1000);
        }




	},
	mounted(){


       this.veiwtype = 'Daily'
       this.dateormonth = this.$route.params.date

       this.getdata();



	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
