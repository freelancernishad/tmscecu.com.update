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

            <div class="heading-layout1">
                <div class="item-title">
                                    <router-link  class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                             to="">
                            GO BACK
                        </router-link>
                </div>
                <div class="dropdown">
                 <a target="_blank" :href="'/dashboard/attendence_sheet/pdf/'+school_id+'/'+StudentClass+'/'+veiwtype+'/'+dateormonth" class="btn-fill-lmd text-light gradient-dodger-blue" style="float:right;margin-bottom:10px"  rel="noopener noreferrer" >Download Full Report</a>

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





<div v-html="fullattenReport"></div>



            <div class="table-responsive">

              <table class="table display text-nowrap">
                <thead>
                    <tr>
                        <th scope="col">SL.</th>
                        <th scope="col">Date</th>
                        <th class="" scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                        <tr v-for="(att,index) in attreport">
                            <td scope="col">{{ index+1 }}</td>
                            <td scope="col">{{ att.date }}</td>
                            <td scope="col">
                                <router-link :to="{name:'students_attendance_daily', params: { classname: StudentClass, type: 'Daily', date:att.date } }"
                                    class="btn-fill-lmd text-light gradient-dodger-blue" >View Full Data</router-link>

                                 <span @click="sendAbsentSms(StudentClass,'Daily',att.date,school_id)" v-if="att.message_status=='Pending'" class="btn-fill-lg font-normal no-radius text-light gradient-orange-peel" id="att_class6_msg" >SENT SMS ABSENT STUDENT</span>
                                  <span class="btn-fill-lmd text-light bg-gradient-gplus" v-else>SMS SENT SUCCESSFULLY COMPLETED!</span>

                            </td>
                        </tr>
                </tbody>

            </table>



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




	},

	data () {
		return {

            attreport:{},
            message:{},

            veiwtype:'',

            dateormonth:'',
             StudentClass:'',
             fullattenReport:'',
              classes:[],
            button:'SENT SMS ABSENT STUDENT',
            preloader: true,
		}
	},

	methods: {

            filter(){
                this.preloader = true;

// console.log(this.$router.currentRoute.path)
// console.log(`/school/students/attendance/${this.veiwtype}/${this.dateormonth}`)

if(this.$router.currentRoute.path===`/school/students/attendance/${this.veiwtype}/${this.dateormonth}`){

}else{
if(this.veiwtype=='Daily'){

    this.$router.push({name:'students_attendance_daily', params: {  classname: this.StudentClass,type: this.veiwtype, date:this.dateormonth }})
}else if(this.veiwtype=='Monthly'){

    this.$router.push({name:'students_attendance_monthly', params: {  classname: this.StudentClass,type: this.veiwtype, date:this.dateormonth }})
}
}
     this.getdata()
     this.getfulldata()

            },

            getdata(){
                axios.get(`/api/student/attendance?veiwtype=${this.veiwtype}&dateormonth=${this.dateormonth}&StudentClass=${this.StudentClass}&school_id=${this.school_id}`)
                    .then(({data}) => {
                            this.attreport = data
                            this.preloader = false;
                        })
                    .catch(() => {
                        // this.$router.push({name: 'supplier'})
                    })
            },


            getfulldata(){
                axios.get(`/api/student/attendance/row?date_month=${this.dateormonth}&class=${this.StudentClass}&school_id=${this.school_id}`)
                    .then(({data}) => {
                        // console.log(data)
                             this.fullattenReport = data
                        })
                    .catch(() => {
                        // this.$router.push({name: 'supplier'})
                    })
            },

            sendAbsentSms(classname,view,date,school_id){

// console.log(classname,view,date,school_id);


                axios.get(`/api/attendence_sheet/sms/${classname}/${view}/${date}/${school_id}`)
                    .then(({data}) => {
                        console.log(data)
                       this.message = data[0].data
                        Object.values(this.message).forEach(msg => {
                            // console.log(msg)
                            Notification.customsucess(msg);
                        });

this.getdata();

                        })
                    .catch(() => {
                        // this.$router.push({name: 'supplier'})
                    })
            },


	},
	mounted(){

       this.veiwtype = 'Monthly'
       this.dateormonth = this.$route.params.date
              this.StudentClass = this.$route.params.classname


       setTimeout(() => {
       this.getdata();
       this.getfulldata();

       }, 3000);




	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
