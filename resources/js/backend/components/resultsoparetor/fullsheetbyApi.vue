<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
            <router-link style="float: right;padding: 0 31px;" :to="{ name: 'logout' }"><i class="flaticon-turn-off"></i>Logout</router-link>
        <div class="card height-auto">
            <div class="card-body">


             <div class="heading-layout1">
                    <div class="item-title">
                        <a class="btn-fill-md radius-4 text-light bg-orange-red mb-3" @click="$router.go(-1)"
                           href="javascript:void(0)">
                            GO BACK
                        </a>
                    </div>
                    <div class="dropdown">

                        <!-- {{ url('school/result_sheet/pdf/' . $group . '/' . $class . '/' . $exam_name . '/All/' . $date) }} -->
                     <!-- <a  v-if="status=='Published'"  :href="'/dashboard/result_sheet/pdf/' + form.school_id +'/'+ filterdata.group + '/' + filterdata.student_class + '/' + filterdata.examType + '/All/' + filterdata.date"  class="btn-fill-lmd radius-4 text-light bg-violet-blue float-left" style="float:right" @click="preloader = true">Download</a> -->

                    </div>
                </div>
                <form id="form" enctype="multipart/form-data" method="POST" v-on:submit.prevent="formsubmit">

                    <div class="row">
                        <div class="col-md-6">
                            <div style="width: 100%;" class="exam">
                                <h5 class="mobilefonthead">
                                    Exam Name: {{ filterdata.examType }}
                                </h5>
                                <h5 class="mobilefonthead">
                                    Subject: {{ filterdata.subject }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <!-- <button class="btn-fill-md text-light bg-dark-pastel-green mt-3 float-right" v-if="status=='Draft'">Publish Now</button>
                            <button class="btn-fill-lmd text-light bg-gradient-gplus mt-3 float-right" v-else>Draft Now</button> -->

                        </div>
                    </div>
                    <div class="table-responsive" v-html="resTable"></div>

                </form>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
export default {
    created() {
        this.callSubjects();
        this.filterdata.date = User.dateformat()[0];
        this.filterdata.student_class = this.$route.params.student_class;
        this.filterdata.group = this.$route.params.group;
        this.filterdata.subject = this.subjectconvertbn(this.$route.params.subject);
        this.filterdata.examType = this.examcomvert(this.$route.params.examType);
        this.filterdata.date = this.$route.params.date;
        this.year = User.dateformat(this.filterdata.date)[5];
        this.checkResult()
    },
    data() {
        return {


            status: "",
            student_class: "",
            year: null,
            preloader: true,
            resTable:'',
            publishids: [],
            filterdata: {
                student_class: null,
                group: 'All',
                subject: null,
                examType: null,
                date: null,
            },
            form: {
                editid: {},
                classname: null,
                school_id: null,
                year: null,
                exam_name: null,
                subject: null,
                group: null,
                total: null,
                date: null,
                number: {},
            }
        }
    },
    methods: {

       async checkResult() {
            // this.form.number = {};

            var url = '';
            var url = `/api/full/results?school_id=${this.$route.params.school_id}&class=${this.$route.params.student_class}&year=${this.year}&exam_name=${this.examcomvert(this.$route.params.examType)}&group=${this.$route.params.group}`;

            var res = await this.callApi('get',`${url}`,[])
            this.resTable = res.data.html
            this.status = res.data.status
            this.publishids = res.data.publishids
            this.preloader = false;

        },




        formsubmit() {
            // this.preloader = true;
            axios.post(`/api/results/publish`, this.publishids)
                .then(({ data }) => {

                    this.checkResult();
                    this.getformdata();
                    Notification.success();
                    this.preloader = false;
                })
                .catch(() => {
                    // this.$router.push({name: 'supplier'})
                })
        },
        callSubjects() {
            // this.subjects = User.all_list('subjects', this.$route.params.student_class, this.$route.params.group);
            this.subjects = this.all_list('subjects', this.$route.params.student_class, '');
        },
        getformdata() {
            this.form.year = this.year;
            this.form.exam_name = this.filterdata.examType;
            this.form.subject = this.filterdata.subject;
            this.form.classname = this.$route.params.student_class;
            this.form.school_id = this.$route.params.school_id;
            this.form.date = this.$route.params.date;
            this.form.group = this.filterdata.group;
        }
    },
    mounted() {
        // this.subjects =  User.all_list('subjects','Six','All');
        // setTimeout(() => {
        this.getformdata();

    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
