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
                                <router-link :to="{name:'staffs_attendance_daily', params: { type: 'Daily', date:att.date } }"
                                    class="btn-fill-lmd text-light gradient-dodger-blue">View Full Data</router-link>
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

            veiwtype:'',
            dateormonth:'',

             preloader: true,
		}
	},

	methods: {

            filter(){
                this.preloader = true;

// console.log(this.$router.currentRoute.path)
// console.log(`/school/staffs/attendance/${this.veiwtype}/${this.dateormonth}`)

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
                axios.get(`/api/staff/attendance?veiwtype=${this.veiwtype}&dateormonth=${this.dateormonth}&school_id=${this.school_id}`)
                    .then(({data}) => {
                            this.attreport = data
                            this.preloader = false;
                        })
                    .catch(() => {
                        // this.$router.push({name: 'supplier'})
                    })
            },



	},
	mounted(){

       this.veiwtype = 'Monthly'
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
