<template>
   <div>
 <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Dashboard</h3>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>

                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Dashboard summery Start Here -->
                <div class="row gutters-20"  v-show="$localStorage.getItem('role')=='admin' || $localStorage.getItem('role')=='teacher' ? true : false " style="display:none">




                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-red">
                                        <i class="flaticon-money text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Balance</div>
                                        <div class="item-number"><span>৳</span><span  >{{totalearns}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-couple text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">SMS BALANCE</div>
                                        <div class="item-number"><span  >{{smsDetails.remaining_unit}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="flaticon-multiple-users-silhouette text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Staffs</div>
                                        <div class="item-number"><span  >{{totalteachers}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="flaticon-classmates text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Students</div>
                                        <div class="item-number"><span  >{{ totalstudents }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>










                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-couple text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Marksheet Download</div>
                                        <div class="item-number"><span  >{{marksheetDownload}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-couple text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">New Applications</div>
                                        <div class="item-number"><span  >{{newstudents}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-couple text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Visitors</div>
                                        <div class="item-number"><span  >{{visitorcount}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>


                <!-- Dashboard summery Start Here -->
                <div class="row gutters-20"  v-show="$localStorage.getItem('role')=='student' || $localStorage.getItem('role')=='parent' ? true : false " style="display:none">
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="flaticon-classmates text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Present</div>
                                        <div class="item-number"><span  >{{ totalpresent }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="flaticon-multiple-users-silhouette text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Total Absent</div>
                                        <div class="item-number"><span  >{{totalabsent}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>

                <div class="row">

                    <div class="col-md-12 mb-3">
                        <a target="_blank" style="float: right;font-size: 18px;margin-bottom: 10px;" href="/dashboard/student/paymnetsheet/annual?school_id=125983" class="btn btn-info">Download Annual Reports</a>


                        <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-9">
                                    <select class="form-control" v-model="paymentYear">
                                        <option>2024</option>
                                        <option>2023</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-info" @click="changePaymentYear">Search</button>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="table-responsive" ref="annuallyReportsContainer"></div>
                    </div>
                    <div class="col-md-12">

                        <a target="_blank" style="float: right;font-size: 18px;margin-bottom: 10px;" :href="'/dashboard/download/student/reports?school_id='+school_id+'&type=pdf'" class="btn btn-info">Download Reports</a>





<div class="table-responsive">

<table class="mb-5" width="100%" border="1">


<tr align="center">

    <th colspan="14" style="vertical-align: middle;font-size: 22px;"> <span>অধ্যয়নরত শিক্ষার্থীর তথ্য</span></th>
</tr>

<tr align="center">
    <td rowspan="2" style="vertical-align: middle;">শ্রেণী</td>
    <td rowspan="2" style="vertical-align: middle;">ছাত্র</td>
    <td rowspan="2" style="vertical-align: middle;">ছাত্রী</td>
    <td colspan="3">ইসলাম</td>
    <td colspan="3">হিন্দু</td>
    <td colspan="3">উপবৃত্তি</td>
    <td rowspan="2" style="vertical-align: middle;">মোট</td>
</tr>

<tr align="center">




    <td>ছাত্র</td>
    <td>ছাত্রী</td>
    <td>মোট</td>

    <td>ছাত্র</td>
    <td>ছাত্রী</td>
    <td>মোট</td>

    <td>ছাত্র</td>
    <td>ছাত্রী</td>
    <td>মোট</td>

</tr>




<tr align="center" v-for="(report,key) in reports.data">
    <td>{{ key }}</td>
    <td>{{ report.maleStudent }}</td>
    <td>{{ report.FemaleStudent }}</td>
    <td>{{ report.IslamStudentMale }}</td>
    <td>{{ report.IslamStudentFemale }}</td>
    <td>{{ report.IslamStudent }}</td>
    <td>{{ report.HinduStudentMale }}</td>
    <td>{{ report.HinduStudentFemale }}</td>
    <td>{{ report.HinduStudent }}</td>
    <td>{{ report.stipendStudentMale }}</td>
    <td>{{ report.stipendStudentFemale }}</td>
    <td>{{ report.stipendStudent }}</td>
    <td>{{ report.totalStudent }}</td>
</tr>
<tr align="center">
    <td>মোট</td>
    <td>{{ reports.maleStudent }}</td>
    <td>{{ reports.FemaleStudent }}</td>
    <td>{{ reports.IslamStudentMale }}</td>
    <td>{{ reports.IslamStudentFemale }}</td>
    <td>{{ reports.IslamStudent }}</td>
    <td>{{ reports.HinduStudentMale }}</td>
    <td>{{ reports.HinduStudentFemale }}</td>
    <td>{{ reports.HinduStudent }}</td>
    <td>{{ reports.stipendStudentMale }}</td>
    <td>{{ reports.stipendStudentFemale }}</td>
    <td>{{ reports.stipendStudent }}</td>
    <td>{{ reports.totalStudent }}</td>
</tr>
</table>
</div>


<!--
<div class="table-responsive">
<table class="table mb-5">
<tr align="center">
    <td colspan="7"><h4 class="mb-0">শিক্ষার্থীর ধরন</h4></td>

</tr>
<tr align="center">
    <td>শ্রেণী</td>
    <td>কর্মজীবী শিক্ষার্থী</td>
    <td>ভূমিহীন অভিভাবকের সন্তান</td>
    <td>ক্ষুদ্র নৃ-গোষ্ঠী শিক্ষার্থী</td>
    <td>বিশেষ চাহিদা সম্পন্ন শিক্ষার্থী</td>
    <td>অনাথ/এতিম শিক্ষার্থী</td>
    <td>অন্যান্য</td>
</tr>
<tr align="center" v-for="(report,key) in reports.data">
    <td>{{ key }}</td>
    <td>{{ report.WorkingStudent }}</td>
    <td>{{ report.landless_guardiansStudent }}</td>
    <td>{{ report.MinorityStudent }}</td>
    <td>{{ report.special_needsStudent }}</td>
    <td>{{ report.OrphanStudent }}</td>
    <td>{{ report.categoryOtherStudent }}</td>
</tr>
<tr align="center">
    <td>মোট</td>
    <td>{{ reports.WorkingStudent }}</td>
    <td>{{ reports.landless_guardiansStudent }}</td>
    <td>{{ reports.MinorityStudent }}</td>
    <td>{{ reports.special_needsStudent }}</td>
    <td>{{ reports.OrphanStudent }}</td>
    <td>{{ reports.categoryOtherStudent }}</td>
</tr>
</table>

</div>


<div class="table-responsive">
<table class="table mb-5">
<tr align="center">
    <td colspan="5"><h4 class="mb-0">কোটা</h4></td>

</tr>
<tr align="center">
    <td>শ্রেণী</td>
    <td>মুক্তিযোদ্ধার সন্তান/নাতী-নাতনী</td>
    <td>অত্র বিদ্যালয়ে কর্মরত শিক্ষক, কর্মচারী ও ম্যানেজিং কমিটির সন্তান</td>
    <td>প্রতিবন্ধী</td>
    <td>কোনো কোটা নেই</td>

</tr>
<tr align="center" v-for="(report,key) in reports.data">
    <td>{{ key }}</td>
    <td>{{ report.freedom_fightersStudent }}</td>
    <td>{{ report.committeeStudent }}</td>
    <td>{{ report.disabledStudent }}</td>
    <td>{{ report.There_is_no_quotaStudent }}</td>
</tr>
<tr align="center">
    <td>মোট</td>
    <td>{{ reports.freedom_fightersStudent }}</td>
    <td>{{ reports.committeeStudent }}</td>
    <td>{{ reports.disabledStudent }}</td>
    <td>{{ reports.There_is_no_quotaStudent }}</td>
</tr>
</table>

</div>


<div class="table-responsive">
<table class="table mb-5">
<tr align="center">
    <td colspan="13"><h4 class="mb-0">অভিভাবকের পেশা</h4></td>

</tr>
<tr align="center">
    <td>শ্রেণী</td>
    <td>ব্যবসায়ি</td>
    <td>কৃষক</td>
    <td>কৃষি শ্রমিক</td>
    <td>ডাক্তার</td>
    <td>জেলে</td>
    <td>সরকারি চাকুরি</td>
    <td>কামার/কুমোর</td>
    <td>প্রবাসি</td>
    <td>ক্ষুদ্র ব্যবসায়ি</td>
    <td>শিক্ষক</td>
    <td>অকৃষি শ্রমিক</td>
    <td>অন্যান্য</td>

</tr>
<tr align="center" v-for="(report,key) in reports.data">
    <td>{{ key }}</td>
    <td>{{ report.businessmanStudent }}</td>
    <td>{{ report.farmerStudent }}</td>
    <td>{{ report.agricultural_laborerStudent }}</td>
    <td>{{ report.doctorStudent }}</td>
    <td>{{ report.fishermanStudent }}</td>
    <td>{{ report.Government_jobStudent }}</td>
    <td>{{ report.blacksmith_potterStudent }}</td>
    <td>{{ report.expatriateStudent }}</td>
    <td>{{ report.small_businessStudent }}</td>
    <td>{{ report.teacherStudent }}</td>
    <td>{{ report.Non_agricultural_workersStudent }}</td>
    <td>{{ report.Occupation_of_guardian_otherStudent }}</td>
</tr>
<tr align="center">
    <td>মোট</td>
    <td>{{ reports.businessmanStudent }}</td>
    <td>{{ reports.farmerStudent }}</td>
    <td>{{ reports.agricultural_laborerStudent }}</td>
    <td>{{ reports.doctorStudent }}</td>
    <td>{{ reports.fishermanStudent }}</td>
    <td>{{ reports.Government_jobStudent }}</td>
    <td>{{ reports.blacksmith_potterStudent }}</td>
    <td>{{ reports.expatriateStudent }}</td>
    <td>{{ reports.small_businessStudent }}</td>
    <td>{{ reports.teacherStudent }}</td>
    <td>{{ reports.Non_agricultural_workersStudent }}</td>
    <td>{{ reports.Occupation_of_guardian_otherStudent }}</td>
</tr>
</table>

</div> -->


</div>

                </div>






<!--
<div class="row" v-show="$localStorage.getItem('role')=='admin' || $localStorage.getItem('role')=='teacher' ? true : false " style="display:none">
    <div class="col-md-12">
    <div class="form-group" >

                        <select class="form-control" v-model="month" id="month" @change="filteratten" required>
                            <option value="">
                                SELECT
                            </option>
                  <option v-for="monthlist in months">{{ monthlist }}</option>

                        </select>
    </div>

    <h3 style="text-align:center">{{ month }} Report</h3>
 <Bar :chart-options="chartOptions" :chart-data="chartData" :chart-id="chartId"
                    :dataset-id-key="datasetIdKey" :plugins="plugins" :css-classes="cssClasses" :styles="styles"
                    :width="width" :height="height" />
    </div>
</div> -->







    </div>
</template>
<script>
// import { mapState,mapActions } from 'vuex';
export default {
    computed: {

    },
    async created() {
        this.getSmsNoc();
        this.getReports();
        this.getmonth();
         this.totalstudent();
         this.newstudent();
         this.marksheet();
         this.totalteacher();
         this.totalearn();
         this.visitors();
         this.attendacereport();
         this.getAnnualReport();
    },

    props: {
        chartId: {
            type: String,
            default: "bar-chart",
        },
        datasetIdKey: {
            type: String,
            default: "label",
        },
        width: {
            type: Number,
            default: 400,
        },
        height: {
            type: Number,
            default: 300,
        },
        cssClasses: {
            default: "",
            type: String,
        },
        styles: {
            type: Object,
            default: () => { },
        },
        plugins: {
            type: Object,
            default: () => { },
        },
        chartId2: {
            type: String,
            default: "bar-chart2",
        },
        datasetIdKey2: {
            type: String,
            default: "label2",
        },
        width2: {
            type: Number,
            default: 400,
        },
        height2: {
            type: Number,
            default: 300,
        },
        cssClasses2: {
            default: "",
            type: String,
        },
        styles2: {
            type: Object,
            default: () => { },
        },
        plugins2: {
            type: Object,
            default: () => { },
        },
    },

    data() {
        return {
            paymentYear:2024,
            year:new Date().getFullYear(),
            totalstudents:0,
            marksheetDownload:0,
            newstudents:0,
            totalteachers:0,
            totalearns:0,
            totalpresent:0,
            totalabsent:0,
            visitorcount:0,
            month:'',
            year:new Date().getFullYear(),
            chartData: {
                labels: [],
                datasets: [ { data: [40, 20, 12] } ]
            },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
            },
            reports:{},
            smsDetails:{},
            annuallyReports:{},


        };
    },

    methods: {
        filteratten(){
            this.attendacereport();
        },

        async getSmsNoc(){
            var res = await this.callApi('get','/api/get/balance',[]);
            this.smsDetails = res.data.data;
        },

        changePaymentYear(){
            this.getAnnualReport();
        },
        async getAnnualReport(){

            var res = await this.callApi('get',`/api/get/annually/report?year=${this.paymentYear}`,[]);
            this.annuallyReports = res.data;
            this.renderHTML();


        },
        renderHTML() {
            this.$refs.annuallyReportsContainer.innerHTML = this.annuallyReports;
        },



            getmonth(){
                const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];

            const d = new Date();
            this.month = month[d.getMonth()];
            },

        totalstudent() {
            axios
                .get(`/api/students/list?filter[school_id]=${this.school_id}&filter[StudentStatus]=Active&datatype=count`)
                .then(({ data }) => (this.totalstudents = data))
                .catch();
        },
        newstudent() {
            axios
                .get(`/api/students/list?filter[school_id]=${this.school_id}&filter[StudentStatus]=Pending&datatype=count`)
                .then(({ data }) => (this.newstudents = data))
                .catch();
        },
        marksheet() {
            axios
                .get(`/api/payment/counting?type=marksheet&status=Paid`)
                .then(({ data }) => (this.marksheetDownload = data))
                .catch();
        },

        totalteacher() {
            axios
                .get(`/api/staffs/list?filter[school_id]=${this.school_id}&filter[TeacherStatus]=Active&datatype=count`)
                .then(({ data }) => (this.totalteachers = data))
                .catch();
        },

        totalearn() {
            axios
                .get(`/api/students/payments?filter[school_id]=${this.school_id}&datatype=count`)
                .then(({ data }) => (this.totalearns = data))
                .catch();
        },

        visitors() {
            axios
                .get(`/api/visitorcount`)
                .then(({ data }) => (this.visitorcount = data))
                .catch();
        },

        attendacereport() {
var url;
            if(this.$localStorage.getItem('role')=='admin' || this.$localStorage.getItem('role')=='teacher'){
url =`api/student/attendance/count?month=${this.month}&year=${this.year}&school_id=${this.school_id}`;
            }else{
url =`api/student/attendance/count?month=${this.month}&year=${this.year}&student_id=${this.$localStorage.getItem('teacherOrstudent')}&school_id=${this.school_id}&type=student`;

            }


            axios
                .get(url)
                .then(({ data }) => {

                    this.chartData.labels = data.dates
                    this.chartData.datasets = [data.present,data.absent]

                    this.totalpresent = data.present.data.reduce((a, b) => a + b, 0);
                    this.totalabsent = data.absent.data.reduce((a, b) => a + b, 0);





                })
                .catch();
        },

        async getReports(){
            var res = await this.callApi('get',`/api/student_at_a_glance?school_id=${this.school_id}&front=front`,[]);
            this.reports = res.data;






        },




    },
};
</script>
<style lang="css" scoped>
</style>
