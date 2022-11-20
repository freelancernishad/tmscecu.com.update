<template>
	<div>
    <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>

    <div class="breadcrumbs-area">
        <h3>Routine</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>Routine</li>
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




                </div>
            </div>






            <div class="row">

                    <div class="col-md-12 mb-5">
                        <div id="success"></div>
                        <form id="form" enctype="multipart/form-data" method="POST" v-on:submit.prevent="formsubmit" >

                            <h5>
                                <center v-if="this.$route.params.create=='edit'" class="mobilefonthead">EDIT CLASS {{ student_class }} ROUTION </center>
                                <center v-if="this.$route.params.create=='view'" class="mobilefonthead"> {{ student_class }} ROUTION </center>
                                <center v-else  class="mobilefonthead">ADD NEW CLASS {{ student_class }} ROUTION </center>

                            </h5>
                            <div class="table-responsive">
                            <table  class="table text-nowrap"  >
                                <thead>

                                    <tr>
                                        <th scope="col">Day</th>
                                        <th scope="col">1st period</th>
                                        <th scope="col">2nd period</th>
                                        <th scope="col">3rd period</th>
                                        <th scope="col">4th period</th>
                                        <th scope="col">5th period</th>
                                        <th scope="col">6th period</th>
                                        <th scope="col">7th period</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(day,index) in days[0]">
                                        <td scope="col">
                                            <input type="hidden" name="class" value="<?php echo $class; ?>" />
                                            <input type="hidden" name="year" value="<?php echo date('Y'); ?>" />

                                                <input type="hidden" name="week_name" :value="day">{{ day }}


                                        </td>

                                        <td scope="col" v-for="formsubjectsInput in formsubjectsInputs" v-show="form[formsubjectsInput][day]!='' ? true : false" >




                                            <select class="form-control" v-model="form[formsubjectsInput][day]" v-if="$route.params.create=='edit'">
                                                <option value="">
                                                    SELECT
                                                </option>
                                                <option v-for="subject in subjects[0]">{{ subject }}</option>
                                            </select>

                                            <span v-else>{{ form[formsubjectsInput][day] }}</span>

                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                            <input v-if="$route.params.create=='edit'" class="btn btn-success" type="submit" value="SUBMIT" id="save_btn" />
                        </form>
                    </div><!-- col-md-12 -->


            </div> <!-- row -->




</div>
</div>



	</div>
</template>

<script>
export default {
created(){
          this.student_class = this.$route.params.classname

       this.form.school_id = this.school_id
if(this.$route.params.create=='edit'){
    this.allroutine()
}else if(this.$route.params.create=='view'){
 this.allroutine()
}else {
    this.preloader = false;
}



},

	data () {
		return {
			routines: [],
			days: {},
			subjects: {},

			student_class:"",
            preloader: true,
            form:{
                school_id:null,
                routne_id:null,
                year:null,
                class:null,
                status:null,
                first_period:{},
                second_period:{},
                thard_period:{},
                fourth_period:{},
                fith_period:{},
                sixth_period:{},
                seventh_period:{},
            },
            editform:[],
            formsubjectsInputs:['first_period','second_period','thard_period','fourth_period','fith_period','sixth_period','seventh_period',],

		}
	},

	methods: {


        async getDays(){
            var res = await this.callApi('get',`/api/years/list?type=days`,[]);
            this.days - res.data;
        },
        async getSubjects(){
            var res = await this.callApi('get',`/api/years/list?type=subjects&class=${this.student_class}`,[]);
            this.subjects - res.data;
        },

            allroutine(){




                    this.form.first_period = {}
                    this.form.second_period = {}
                    this.form.thard_period = {}
                    this.form.fourth_period = {}
                    this.form.fith_period = {}
                    this.form.sixth_period = {}
                    this.form.seventh_period = {}


                axios.get(`/api/routines/get?filter[class]=${this.student_class}&filter[school_id]=${this.school_id}`)
                .then(({data}) => {
                    // this.form = data;


                data.forEach(element => {
                    this.form.first_period[element.week_name] = element.first_period
                    this.form.second_period[element.week_name] = element.second_period
                    this.form.thard_period[element.week_name] = element.thard_period
                    this.form.fourth_period[element.week_name] = element.fourth_period
                    this.form.fith_period[element.week_name] = element.fith_period
                    this.form.sixth_period[element.week_name] = element.sixth_period
                    this.form.seventh_period[element.week_name] = element.seventh_period

            });
                    this.preloader = false;

                })
                .catch()
            },



        formsubmit(){
            this.preloader = true;
                axios.post(`/api/routines/submit`,this.form)
                                .then(({data}) => {
                                    //  console.log(data)
                                this.$router.push({name: 'routineslist',params:{classname:this.student_class,school_id:this.school_id}})
                                Notification.success();
                                this.preloader = false;
                                })
                                .catch(() => {
                                    // this.$router.push({name: 'supplier'})
                                })
        }



	},
	mounted(){

this.getDays();
this.getSubjects();









this.form.school_id =  this.school_id;
this.form.year =  User.dateformat()[5];
this.form.class =  this.student_class;
this.form.status =  'active';





	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>

