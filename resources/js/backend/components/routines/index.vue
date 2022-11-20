<template>
	<div>


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
                    <h3>Routine</h3>
                </div>
                <div class="dropdown">
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
                            <center class="mobilefonthead" >{{ student_class }} ROUTION LIST</center>
                            </center>
                        </h5>
                        <div class="table-responsive">
                        <table  class="table text-nowrap"  >
                                <tr>
                                    <th scope="col">SERIAL NO.</th>
                                    <th scope="col">Year</th>
                                    <th class="" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                    <tr>
                                        <td colspan="3" style="    text-align: center;
                                        background: red;
                                        color: wheat;">No Data Found</td>

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



	</div>
</template>

<script>
export default {
    created() {

    },

	data () {
		return {


			student_class:"",

		}
	},

	methods: {
            filter(){
                if(this.$router.currentRoute.path==`/school/routines/${this.student_class}/${this.school_id}`){

                }else{

                  this.$router.push({name:'routineslist', params: { classname: this.student_class, school_id: this.school_id }})

                }

//  this.getdata();
            },



	},
	mounted(){

	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
