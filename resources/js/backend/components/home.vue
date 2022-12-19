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
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-couple text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Visitor</div>
                                        <div class="item-number"><span  >{{visitorcount}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





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
                                    <div class="item-icon bg-light-blue">
                                        <i class="flaticon-multiple-users-silhouette text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Teachers</div>
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


                <table cellspacing="0" cellpadding="3" style="font-family:Noto Sans Bengali;font-size:11pt;border-collapse:collapse;margin: 0 auto;width:100%;margin-bottom: 30px;">

                        <tr align="center" valign="middle" style="color:#0C090A;background-color:#F2F2F2;border-color:#CCCCCC;border-width:1px;border-style:Solid;font-family:Noto Sans Bengali;font-size:9pt;">
                            <td align="center" valign="middle" scope="col">শ্রেণী</td>
                            <td align="center" valign="middle" scope="col" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;">ছাত্র</td>
                            <td align="center" valign="middle" scope="col" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;">ছাত্রী</td>
                            <td align="center" valign="middle" scope="col" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;">মোট</td>
                        </tr>

                        <tr v-for="(report,key) in reports.data">
                            <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-family:Century Gothic;font-size:9pt;width:75px;">{{ key }}</td>
                            <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-size:9pt;width:30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txtmale_0">{{ report.maleStudent }}</span>
                            </td>
                            <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-size:9pt;width:30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txtfemale_0">{{ report.FemaleStudent }}</span>
                            </td>
                            <td align="center" style="border-color:#CCCCCC;border-width:1px;border-style:Solid;font-size:9pt;width:30px;">
                                <span id="ContentPlaceHolder1_grdvTeachers_txttotal_0">{{ report.totalStudent }}</span>
                            </td>
                        </tr>




                    </table>






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
        this.getReports();
        this.getmonth();
         this.totalstudent();
         this.newstudent();
         this.totalteacher();
         this.totalearn();
         this.visitors();
         this.attendacereport();
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

            year:new Date().getFullYear(),
            totalstudents:0,
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
            reports:{}


        };
    },

    methods: {
        filteratten(){
            this.attendacereport();
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

        totalteacher() {
            axios
                .get(`/api/staffs/list?filter[school_id]=${this.school_id}&filter[TeacherStatus]=Active&datatype=count`)
                .then(({ data }) => (this.totalteachers = data))
                .catch();
        },

        totalearn() {
            axios
                .get(`/api/students/payments?filter[year]=${this.year}&filter[school_id]=${this.school_id}&datatype=count`)
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
