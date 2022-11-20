<template>
	<div>
                        <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
  <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Students Attendence</h3>
        <ul>
            <li>
                <router-link :to="{name:'home'}">Home</router-link>
            </li>
            <li>Students Attendence</li>
        </ul>
    </div>



    <div class="card height-auto">
        <div class="card-body">


  <form  enctype="multipart/form-data" v-on:submit.prevent="formsubmit" >

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

            <div class="row gutters-8">


                <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                    <div class="form-group student_class">
                        <label>Class :</label>
                             <select class="form-control"  style="width: 100%;" v-model="StudentClass" id="StudentClass"  required>
                                <option value="">
                                    SELECT
                                </option>
                                <option v-for="classlist in classess">{{ classlist }}</option>
                            </select>
                    </div>
                </div>


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
                <div class="well tex-center mobilefonthead">DATE : {{ form.date }}

                </div>
            </h5>
            <h5>
                <center class="mobilefonthead"> {{ form.student_class }} ATTENDANCE</center>

            </h5>
            <div class="table-responsive">

              <table class="table display text-nowrap">



                <thead>
                    <tr>
                        <th scope="col">Roll</th>
                        <th scope="col">Full Name</th>
                        <th class="" scope="col" v-if="counttype==1">Edit Attendance</th>
                        <th class="" scope="col" v-else>Attendance</th>
                        <!-- <th class="" scope="col" v-if="counttype==1"></th> -->
                    </tr>
                </thead>


                <tbody>
                        <tr v-for="(att,index) in dailyatten">




                            <td scope="col" v-if="counttype==1">{{ att.stu_roll }}</td>
                            <td scope="col" v-else>{{ att.StudentRoll }}</td>

                            <td scope="col" v-if="counttype==1">{{ att.stu_name }}</td>
                            <td scope="col" v-else>{{ att.StudentName }}</td>



                            <td scope="col" v-if="counttype==1">
                                <input @click="updateattendance(att.id)"  type="radio"  class="Present d-none" :id="'Present'+att.id" value="Present" v-model="form.attendence[att.id]"  :disabled="disabled[att.id]"  />
                                <label class="Present att" :for="'Present'+att.id">Present</label>
                                <input  @click="updateattendance(att.id)" type="radio" class="d-none" :id="'Absent'+att.id" value="Absent" v-model="form.attendence[att.id]" :disabled="disabled[att.id]"/>
                                <label class="att" :for="'Absent'+att.id">Absent</label>
                            </td>
                            <td scope="col" v-else>
                                <input  type="radio"  class="Present d-none" :id="'Present'+att.id" value="Present" v-model="form.attendence[att.id]"  :disabled="disabled[att.id]"  />
                                <label class="Present att" :for="'Present'+att.id">Present</label>
                                <input  type="radio" class="d-none" :id="'Absent'+att.id" value="Absent" v-model="form.attendence[att.id]" :disabled="disabled[att.id]"/>
                                <label class="att" :for="'Absent'+att.id">Absent</label>
                            </td>
                            <!-- <td scope="col" v-if="counttype==1">
                                <router-link   :to="{name:'students_attendance_edit', params: {date:dateormonth,id:att.id } }"
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
                student_class:'',
                attendence:[],
                data:[],
            },

            dailyatten:{},

            veiwtype:'',

            counttype:'',
            dateormonth:'',
            StudentClass:'',
            disabled:[],

            preloader: true,




		}
	},

	methods: {

            filter(){
                this.preloader = true;
                if(this.$router.currentRoute.path===`/school/students/attendance/${this.veiwtype}/${this.dateormonth}`){

                }else{
if(this.veiwtype=='Daily'){

    this.$router.push({name:'students_attendance_daily', params: {  classname: this.StudentClass, type: this.veiwtype, date:this.dateormonth }})
}else if(this.veiwtype=='Monthly'){

    this.$router.push({name:'students_attendance_monthly', params: {  classname: this.StudentClass, type: this.veiwtype, date:this.dateormonth }})
}
                    }
                    this.getdata()
            },

            getdata(){
                this.form.date = this.dateormonth;

               this.form.attendence = [];
                this.disabled = [];

                axios.get(`/api/student/attendance?veiwtype=${this.veiwtype}&dateormonth=${this.dateormonth}&StudentClass=${this.StudentClass}&school_id=${this.school_id}`)
                    .then(({data}) => {
                        // console.log(data)
                        this.counttype = data.counttype;
                        this.form.student_class = this.$route.params.classname
                        if(data.counttype==1){
                            this.dailyatten = JSON.parse(data.data[0].attendance);
                            //  console.log(this.dailyatten)


                            this.dailyatten.forEach((value, index) => {
                            // console.log(value)


                                 this.form.attendence[value.id]=value.attendence;
                                  this.disabled[value.id]=false;

                            });
                        }else{

                            this.dailyatten = data.data;
                            this.dailyatten.forEach((value, index) => {
                                // console.log(value.TeacherId)
                                this.disabled[value.id]=false;
                                this.form.attendence[value.id]='Present';

                            });
                        }

this.preloader = false;


                    })
                    .catch(() => {
                        // this.$router.push({name: 'supplier'})
                    })
            },
            formsubmit(){
                this.preloader = true;
                axios.post(`/api/student/attendance/submit`,this.form)
                .then(({data}) => {
                    this.preloader = false;
                        // console.log(data)
                    this.getdata();
                    this.form.id = '';
                            // this.$router.push({name: 'students_attendance_daily',params:{data:this.dateormonth}})
                        Notification.success();
                })
                .catch(() => {
                    // this.$router.push({name: 'supplier'})
                })
        },
        updateattendance(id){
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
       this.StudentClass = this.$route.params.classname
       this.form.student_class = this.$route.params.classname

       this.getdata();



	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
