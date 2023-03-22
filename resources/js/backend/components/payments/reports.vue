<template>
	<div>

 <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Accounts</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>Fees Collection</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Fees Table Area Start Here -->
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


                <div class="row gutters-8">


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <select class="form-control" v-model="form.class" required>
                            <option value="">SELECT CLASS</option>
                            <option value="all">All</option>
     <option v-for="classlist in classess">{{ classlist }}</option>
                        </select>


                    </div>
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <select class="form-control" v-model="form.type">
                                <option value="">নির্বাচন করুন</option>
                                <option value="all">সকল</option>
                                <option value="Admission_fee">ভর্তি ফরম ফি</option>
                                <option value="session_fee">ভর্তি/সেশন ফি</option>
                                <option value="monthly_fee">মাসিক বেতন</option>
                                <option value="exam_fee">পরীক্ষার ফি</option>
                                <option value="marksheet">মার্কশীট</option>
                                <option value="registration_fee">রেজিস্ট্রেশন ফি</option>
                                <option value="form_filup_fee">ফরম পূরণ ফি</option>
                            </select>


                    </div>

                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="date" v-model="form.from" class="form-control">
                    </div>


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="date" v-model="form.to" class="form-control">
                    </div>









                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <button type="submit" @click="filter" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                    </div>
                </div>


                <a v-if="search" :href="'/dashboard/payment/report?class='+form.class+'&type='+form.type+'&from='+form.from+'&to='+form.to" style="float: right;font-size: 20px;margin-bottom: 15px;" target="_blank" class="btn btn-info">Report Download</a>



            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>

                            <th  class="tablecolhide" scope="col">Date</th>
                            <th scope="col">Transition Id</th>
                            <th scope="col">Roll</th>
                            <th scope="col">Name</th>
                            <th scope="col">Class</th>
                            <th  class="tablecolhide" scope="col">Type</th>
                            <th scope="col">status</th>
                            <th  class="tablecolhide" scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(report,index) in reports" :key="index">
                            <th scope="col">{{ index+1 }}</th>

                            <td>{{ dateformatGlobal(report.created_at)[12] }}</td>

                            <td>{{ report.trxid }}</td>
                            <td>{{ report.studentRoll }}</td>
                            <td>{{ report.Name }}</td>
                            <td>{{ report.studentClass }}</td>
                            <td>{{ report.type }}</td>
                            <td>{{ report.status }}</td>
                            <td>{{ report.amount }}</td>
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
created() {
    this.yearslist();
       this.monthslist();
       this.all_list('exams');
},

	data () {
		return {
            form: {
                class:'',
                from:'',
                to:'',
            },
            reports:{},
            search:false,

		}
	},

	methods: {
           async filter(){

                var res = await this.callApi('post',`/api/payment/report`,this.form);
                this.reports = res.data;
                this.search = true
            },


	},
	mounted(){
        const sevenDaysAgo  = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000);
        // console.log(sevenDaysAgo);
        this.form.from =  User.dateformat(sevenDaysAgo)[0];
        this.form.to =  User.dateformat()[0];


	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
