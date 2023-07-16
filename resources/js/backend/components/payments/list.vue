<template>
    <div>
        <loader v-if="preloader == true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
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
                        <router-link class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                            to="">
                            GO BACK
                        </router-link>
                    </div>
                    <div class="dropdown">
                        <!-- {{ url('/school/student/'.$class.'/'.$year.'/'.$type.'/sheet') }} -->
                        <a target="_blank" :href="'/dashboard/student/' + school_id + '/' + payment_class + '/' + year + '/' + type + '/paymnetsheet?group='+ this.group"
                            class="btn-fill-lmd text-light gradient-dodger-blue" style="float:right;margin-bottom:10px"
                            rel="noopener noreferrer">Download Full Year Sheet</a>
                    </div>
                </div>
                <div class="row gutters-8">


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <select class="form-control" v-model="payment_class" id="payment_class" @change="callSubjects"  required>
                            <option value="">SELECT CLASS</option>
                            <option v-for="classlist in classess">{{  classlist  }}</option>
                        </select>
                    </div>



                    <div class="col-md-3"  v-if="payment_class=='Nine' || payment_class=='Ten'" >
                                <div class='form-group' >

                                    <select class='form-control' style='width: 100%;' v-model='group' id='group' required>
                                    <option value=''>select</option>
                                    <option v-for="group in groups">{{ group }}</option>


                                    </select></div>
                                </div>


                    <div class="col-3-xxxl col-xl-4 col-lg-3 col-12 form-group">
                        <select class="form-control" v-model="year" id="year" required>
                            <option value="">SELECT YEAR</option>
                            <option v-for="yearList in years">{{  yearList  }}</option>
                        </select>
                    </div>
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <select class="form-control" v-model="month" id="month" required>
                            <option value="">
                                SELECT
                            </option>
                            <option v-for="monthlist in months">{{  monthlist  }}</option>
                        </select>
                    </div>


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <select class="form-control" v-model="type" id="type" required>
                            <option value="">
                                SELECT
                            </option>
                            <option value="Monthly_fee">মাসিক বেতন</option>
                            <option value="Session_fee">সেশন ফি</option>
                            <option value="Exam_fee">পরিক্ষার ফি</option>
                            <option value="Other">অন্যান্য</option>
                        </select>
                    </div>



                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group" v-if="type=='Exam_fee'">
                                    <div class="form-group">

                                        <select class="form-control" style="width: 100%;" v-model="examType" onchange=""
                                            id="ExamType" required>
                                            <option value="">Exam Type</option>
                               <option v-for="exam in exams">{{ exam }}</option>
                                        </select>
                                    </div>

                                </div>



                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <button type="submit" @click="filter" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col" width="15%">Roll</th>
                                <th scope="col" width="10%">Name</th>
                                <th class="tablecolhide" width="15%" scope="col">Amount</th>
                                <th class="tablecolhide" width="15%" scope="col">Paid Amount</th>
                                <th scope="col" width="15%">status</th>
                                <th class="tablecolhide" width="15%" scope="col">Date</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="studentList in students">
                                <td>{{  studentList.StudentRoll  }}</td>
                                <td class="textwrap">{{  studentList.StudentName  }}</td>
                                <td class="tablecolhide">{{  paymentAmount  }}</td>
                                <td class="tablecolhide">
                                    <span v-if="statustext == 'Looding...'">{{  statustext  }}</span>
                                    <span v-else>{{  paidamount[studentList.StudentRoll]  }}</span>
                                </td>
                                <td :class="paidclass" v-if="status[studentList.StudentRoll] == 'Paid'">
                                    <span v-if="statustext == 'Looding...'">{{  statustext  }}</span>
                                    <span v-else>{{  status[studentList.StudentRoll]  }}</span>
                                </td>
                                <td class='badge badge-pill badge-danger d-block mg-t-8' v-else>{{  statustext  }}</td>
                                <td class="tablecolhide">
                                    <span v-if="statustext == 'Looding...'">{{  statustext  }}</span>
                                    <span v-else>{{  paiddate[studentList.StudentRoll]  }}</span>
                                </td>
                                <td>
                                    <div v-if="statustext == 'Looding...'">{{  statustext  }}</div>
                                    <div class="dropdown" v-else>
                                        <button class="btn btn-info dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <router-link
                                                :to="{ name: 'paymentedit', params: { create: 'edit', id: ids[studentList.StudentRoll] } }"
                                                v-if="status[studentList.StudentRoll] == 'Paid'" class="dropdown-item"
                                                id=""><i class="fas fa-cogs"></i> Edit</router-link>
                                            <a :href="'/school/payment/invoice/'+ids[studentList.StudentRoll]" target="_blank" class="dropdown-item"
                                                v-if="status[studentList.StudentRoll] == 'Paid'" id=""><i
                                                    class="fas fa-download fa-fw"></i> Invoice</a>
                                            <router-link
                                                :to="{ name: 'paymentcreate', params: { create: 'create', classname: studentList.StudentClass, year: year, month: month, type: type, id: studentList.id },query:{type_name:examType} }"
                                                v-else class="dropdown-item add_paymentById">Pay Now</router-link>
                                        </div>
                                    </div>
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
    created() {
        this.paymentstatusCheck()

        if(this.type=='Exam_fee'){

            this.examType = this.$route.query.type_name
        }else{

            this.examType ='';
        }

    },
    data() {
        return {
            groups: {},
            payment_class: null,
            year: null,
            month: null,
            type: null,
            group: null,
            examType: '',
            students: [],
            payments: [],
            classes: [],
            months: [],
            exams: [],
            years: [],
            status: {},
            paidamount: {},
            paiddate: {},
            ids: {},
            statustext: 'Looding...',
            paymentAmount: '',
            newsearch: 'newsearch',
            preloader: true,
            paidclass: 'badge badge-pill badge-success d-block mg-t-8',
        }
    },
    methods: {


        callSubjects(){
            if(this.filterdata.student_class=='Nine' || this.filterdata.student_class=='Ten'){
            }else{
                this.filterdata.group = 'All'
            }
        },

        filter() {
            this.preloader = true;
            this.newsearch = 'oldsearch',
                this.statustext = 'Looding...'
            if (this.statustext == 'Looding...') {
                this.paidclass = 'badge badge-pill badge-danger d-block mg-t-8';
            }
            // console.log(this.$router.currentRoute.path)
            if (this.$router.currentRoute.path == `/school/payment/${this.payment_class}/${this.year}/${this.month}/${this.type}?group=${this.group}&type_name=${this.examType}`) {
            } else {
                this.$router.push({ name: 'paymentsearch', params: { classname: this.payment_class, year: this.year, month: this.month, type: this.type },query:{group:this.group,type_name:this.examType} })
            }
            this.allstudents();
            this.allpayments();
        },
        allstudents() {
            this.statustext = 'Looding...'
            var url = '';
            url = `/api/students/single?filter[StudentClass]=${this.payment_class}&filter[Year]=${this.year}&filter[school_id]=${this.school_id}&filter[StudentGroup]=${this.group}&filter[StudentStatus]=Active`;
            axios.get(url)
                .then(({ data }) => {
                    this.students = data
                    this.preloader = false;
                })
                .catch()
        },
        allpayments() {
            var url = '';
            url = `/api/students/payments?filter[studentClass]=${this.payment_class}&filter[year]=${this.year}&filter[month]=${this.month}&filter[school_id]=${this.school_id}&filter[type]=${this.feesconvert(this.type)}&filter[type_name]=${this.examType}`;
            axios.get(url)
                .then(({ data }) => {
                    this.payments = data
                    if (this.newsearch == 'newsearch') {
                        setTimeout(() => {
                            this.paymentstatusCheck();
                        }, 5000);
                    } else {
                        this.paymentstatusCheck();
                    }
                })
                .catch()
        },
        paymentstatusCheck() {
            this.status = {};
            this.paidamount = {};
            this.paiddate = {};
            this.ids = {};
            this.payments.forEach((value, index) => {
                this.status[value.studentRoll] = value.status;
                this.paidamount[value.studentRoll] = value.amount;
                this.paiddate[value.studentRoll] = value.date;
                this.ids[value.studentRoll] = value.id;
            });
            this.statustext = 'Unpaid'
            this.paidclass = 'badge badge-pill badge-success d-block mg-t-8'
        },

        async monthslist(){
            var res = await this.callApi('get',`/api/years/list?type=month`,[]);
            this.months = res.data;

        },
            async yearslist(){
            var res = await this.callApi('get',`/api/years/list?type=year`,[]);
            this.years = res.data;
        },
            async all_lists(){
            var res = await this.callApi('get',`/api/years/list?type=exams`,[]);
            this.exams = res.data;
        },



    },
    mounted() {

        this.yearslist();
       this.monthslist();
       this.all_lists();
       this.groups =  this.all_list('groups');
        this.payment_class = this.$route.params.classname
        this.group = this.$route.query.group
        this.year = this.$route.params.year
        this.month = this.$route.params.month
        this.type = this.$route.params.type

        setTimeout(() => {

            this.allstudents();
            this.allpayments();
        }, 1000);
        this.paymentAmount = this.paymentamount(this.type, this.payment_class);
    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
