<template>
	<div>
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
                            <router-link class="btn btn-danger my-5"

    to="">
    GO BACK
</router-link>
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Staffs Attendence</h3>
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

              <table class="table display text-nowrap" v-if="attreport">
                <thead v-if="afterfilterveiwtype=='Monthly'" >
                    <tr>
                        <th scope="col">SL.</th>
                        <th scope="col">Date</th>
                        <th class="" scope="col">Action</th>
                    </tr>
                </thead>


                <thead  v-else-if="afterfilterveiwtype=='Daily'">
                    <tr>
                        <th scope="col">Full Name</th>
                        <th class="" scope="col">Attendance</th>
                        <th class="" scope="col"></th>
                    </tr>
                </thead>
                <tbody v-if="afterfilterveiwtype=='Monthly'">
                        <tr v-for="(att,index) in attreport">
                            <td scope="col">{{ index+1 }}</td>
                            <td scope="col">{{ att.date }}</td>
                            <td scope="col">
                                <router-link @click.native="getdata" :to="{name:'staffsattendanceview', params: { type: 'Daily', date:att.date } }"
                                    class="btn-fill-lmd text-light gradient-dodger-blue">View Full Data</router-link>
                            </td>
                        </tr>
                </tbody>

                <tbody v-else-if="afterfilterveiwtype=='Daily'">
                        <tr v-for="(att,index) in dailyatten">
                            <td scope="col">{{ att.TeacherName }}</td>
                            <td scope="col">{{ att.attendence }}

                                <input type="radio" class="Present" :id="'Present'+att.id" value="Present" v-model="form.attendence"   />
                                <label class="Present att" :for="'Present'+att.id">Present</label>
                                <input type="radio" :id="'Absent'+att.id" value="Absent" v-model="form.attendence" />
                                <label class="att" :for="'Absent'+att.id">Absent</label>


                            </td>
                            <td scope="col">
                                <router-link   :to="{name:'staffsattendanceview', params: { type: 'Daily', date:att.date } }"
                                    class="btn-fill-lmd text-light gradient-dodger-blue">edit</router-link>
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
            form:{
            attendence:[],
            },
            attreport:{},
            dailyatten:{},

            editid:'',
            veiwtype:'',
            afterfilterveiwtype:'',
            dateormonth:'',

            classdisable:false
		}
	},

	methods: {

            filter(){
if(this.veiwtype=='Daily'){

    this.$router.push({name:'staffs_attendance_daily', params: { type: this.veiwtype, date:this.dateormonth }})
}else if(this.veiwtype=='Monthly'){

    this.$router.push({name:'staffs_attendance_monthly', params: { type: this.veiwtype, date:this.dateormonth }})
}

//  this.getdata();
            },

        //     getdata(){
        //         axios.get(`/api/staff/attendance?veiwtype=${this.veiwtype}&dateormonth=${this.dateormonth}`)
        //             .then(({data}) => {
        //                 console.log(data)
        //                 console.log(data.counttype)
        //                  if(data.counttype==1){
        //                     this.dailyatten = JSON.parse(data.data[0].attendance);
        //                 }else{
        //                     this.dailyatten = data.data;
        //                     this.attreport = data.data
        //                 }

        //                 this.afterfilterveiwtype = this.$route.params.type


        //             })
        //             .catch(() => {
        //                 // this.$router.push({name: 'supplier'})
        //             })
        //     },
        //     routechange(){

        //     this.veiwtype = this.$route.params.type
        //     this.dateormonth = this.$route.params.date
        //     this.afterfilterveiwtype = this.$route.params.type

        //     },

        // getstaffs(){
        //         axios.get(`/api/staffs/single?filter[id]=${this.editid}`)
        //                         .then(({data}) => {
        //                             //  console.log(data)
        //                             this.form = data
        //                         })
        //                         .catch(() => {
        //                             // this.$router.push({name: 'supplier'})
        //                         })
        // },


        // formsubmit(){
        //         axios.post(`/api/staffs/form/submit`,this.form)
        //                         .then(({data}) => {
        //                             //  console.log(data)
        //                                 this.$router.push({name: 'staffs'})
        //                                 Notification.success();
        //                         })
        //                         .catch(() => {
        //                             // this.$router.push({name: 'supplier'})
        //                         })
        // }


	},
	mounted(){

    //    this.classes =  User.classlist();

    //    if(this.$route.params.id){

    //        this.editid = this.$route.params.id;
    //    }
    //    if(this.$route.params.type && this.$route.params.date){
    //         this.routechange()
    //        this.getdata();
    //    }
    //    if(this.editid!=''){

    //        this.getstaffs();
    //        this.classdisable  = true
    //    }


	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
