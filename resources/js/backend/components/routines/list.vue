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

             <router-link v-if="routinecount<1 && looding==false" :to="{name:'routinescreateupdate', params:{create:'create',classname:student_class,school_id:school_id,year:year}}" class="btn-fill-lmd text-light gradient-dodger-blue" style="float:right;margin-bottom:10px"  rel="noopener noreferrer">Create New</router-link>


                </div>
            </div>


                <div class="">
                    <div class="form-group">
                        <font style="font-size: 17px;margin-right: 16px;" class="font_size float-left">
                            Class:
                        </font>
                        <select  class="form-control" v-model="student_class" @change="filter"
                            id="student_class" required>
                            <option value="">
                                SELECT
                            </option>
                        <option v-for="classlist in classess">{{ classlist }}</option>

                        </select>
                        <br />
                        <br />
                    </div>
                </div>



            <div class="row">

                    <div class="col-md-12 mt-5">
                        <h5>
                            <center class="mobilefonthead">{{ student_class }} ROUTION LIST</center>
                            </center>
                        </h5>
                        <div class="table-responsive">
                        <table  class="table text-nowrap"  >
                            <thead>
                                <tr>
                                    <th scope="col">SERIAL NO.</th>
                                    <th scope="col">Year</th>
                                    <th class="" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
<tr v-if="looding">
    <td colspan="3" style="    text-align: center;
    background: #042954;
    color: wheat;">Looding...</td>
</tr>
                                    <tr v-else v-for="(routine,index) in routines" :key="routine.id">
                                        <td scope="col">{{ index+1 }}</td>
                                        <td scope="col">{{ routine.year }}</td>

                                        <td scope="col">

                                            <router-link :to="{name:'routinescreateupdate', params:{create:'edit',classname:student_class,school_id:school_id,year:routine.year}}" id="update_routine" class="btn-fill-lg font-normal no-radius text-light gradient-orange-peel">UPDATE DATA</router-link>
                                            <a :href="'/routines/'+school_id+'/'+student_class+'/'+year+'/download'" id="update_routine" class="btn-fill-lg font-normal text-light gradient-pastel-green">Download Routine</a>
                                        </td>
                                    </tr>

                            </tbody>
                        </table>
                    </div>
                        <input type="hidden" id="value" value="" />

                    </div><!-- col-md-12 -->


            </div> <!-- row -->




</div>
</div>



	</div>
</template>

<script>
export default {

    created() {

    },
	data () {
		return {
			routines: [],


			student_class:"",
			routinecount:"",
			year:"",
			looding:true,
            preloader: true,

		}
	},

	methods: {
            filter(){
                this.preloader = true;
                this.looding=true;
                if(this.$router.currentRoute.path==`/school/routines/${this.student_class}/${this.school_id}`){

                }else{

                  this.$router.push({name:'routineslist', params: { classname: this.student_class, school_id: this.school_id }})

                }

                this.allroutine();
                this.checkroutine();
            },


            allroutine(){
                axios.get(`/api/routines?filter[class]=${this.student_class}&filter[school_id]=${this.school_id}`)
                .then(({data}) => {
                    // console.log(data)
                    this.routines = data
                    this.looding=false;
                    this.preloader = false;
                })
                .catch()
            },

            checkroutine(){
                axios.get(`/api/routines/check?filter[class]=${this.student_class}&filter[school_id]=${this.school_id}&filter[year]=${this.year}`)
                .then(({data}) => {
                    // console.log(data)
                    this.routinecount = data
                })
                .catch()
            },




	},
	mounted(){

         this.student_class = this.$route.params.classname

		this.year =  User.dateformat()[5];

            this.checkroutine();



            this.allroutine();



	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
