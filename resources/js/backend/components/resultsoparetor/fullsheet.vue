<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <div class="breadcrumbs-area">
            <h3>Result</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Result</li>
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

                            <button class="btn-fill-md text-light bg-dark-pastel-green mt-3 float-right" v-if="status=='Draft'">Publish Now</button>
                            <button class="btn-fill-lmd text-light bg-gradient-gplus mt-3 float-right" v-else>Draft Now</button>

                        </div>
                    </div>





                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col"  colspan="15">


                                        <div class="alert icon-alart bg-light-green2" role="alert" style="color: white;font-weight: 400;" v-if="status=='Published'">

                                            Well done! Result Already Published.Click Daft <b>"Now Button"</b> to Result sent to Draft.
                                        </div>

                                        <div class="alert icon-alart bg-pink2" role="alert" style="color: white;font-weight: 400;" v-else>

                                            Attention! Result has draft.Click <b>"Publish Now"</b> Button to Publish Result.
                                        </div>

                                    </th>
                                </tr>


                                <tr>
                                    <th scope="col" colspan="15">
                                        <h5>
                                            <center class="mobilefonthead">
                                                 {{ filterdata.student_class }} RESULT
                                            </center>
                                        </h5>
                                    </th>
                                </tr>
                                <tr id="changeTableHead">
                                    <th scope="col">রোল.</th>
                                    <th scope="col" width="15%">নাম</th>
                                    <th scope="col" v-for="subject in subjects">{{ subject }}</th>
                                    <th class="" scope="col">ব্যর্থ হয়েছে</th>
                                    <th class="" scope="col">মোট</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="student in students">
                                    <td scope="col">{{ student.roll }}</td>
                                    <td scope="col">{{ student.name }}</td>
                                    <td scope="col" v-for="subject in subjects">

                                        <span v-if="changesubName(subject)=='Religion' && student.StudentReligion=='Islam'">{{ student['ReligionIslam'] }}</span>
                                        <span v-else-if="changesubName(subject)=='Religion' &&  student.StudentReligion=='Hindu'">{{ student['ReligionHindu'] }}</span>
                                        <span v-else>{{ student[changesubName(subject)] }}</span>
                                        <!-- <span>hindu</span> -->
                                    <!-- {{ student.StudentReligion }} -->
                                        <!-- {{ student[changesubName(subject)] }} -->


                                    </td>
                                    <td class="" scope="col"> {{ totalfailed[student.roll] }}</td>
                                    <td class="" scope="col">
                                        {{ totalmark[student.roll] }}

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

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
            students: {},
            subjects: {},
            totalmark: {},
            totalfailed: {},
            marks: {},
            publishids: [],
            edit: "",
            status: "",
            student_class: "",
            year: null,
            preloader: true,
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
        changesubName(sub) {
            var subject;
            if (this.subjectconverten(sub) == 'Bangla') {
                subject = 'Bangla_1st';
            } else if (this.subjectconverten(sub) == 'English') {
                subject = 'English_1st';
            } else {
                subject = this.subjectconverten(sub);
            }
            return subject
        },
        checkResult() {
            // this.form.number = {};
            this.form.editid = {};
            var url = '';
            url = `/api/results/check?filter[school_id]=${this.$route.params.school_id}&filter[class]=${this.$route.params.student_class}&filter[year]=${this.year}&filter[exam_name]=${this.examcomvert(this.$route.params.examType)}&all=true`;
            axios.get(url)
                .then(({ data }) => {
                    this.preloader = false;
                    this.students = data
                    this.marks = {};
                    var Bangla_1st_mark = []
                    this.marks = {};
                    data.forEach((student, index) => {
this.status = student.status;
                        this.publishids.push(student.id)
                        this.marks[student.roll] = {};
                        this.subjects.forEach(subject => {

                        var marksub;
                            if(this.changesubName(subject)=='Religion'){
                                if(student.StudentReligion=='Islam'){

                                    marksub = 'ReligionIslam'
                                }else if(student.StudentReligion=='Hindu'){

                                     marksub ='ReligionHindu'
                                }else{

                                     marksub =this.changesubName(subject)
                                }
                            }else{
                                 marksub =this.changesubName(subject)

                            }


                            this.marks[student.roll][marksub] = student[marksub];
                        })
                    });









                })
                .catch()
        },

    getcount(){

this.totalmark = {};
this.totalfailed = {};
        this.students.forEach(student =>{
this.totalmark[student.roll] = this.sum(this.marks[student.roll])


this.totalfailed[student.roll] = this.failed(this.marks[student.roll])




        })

    },


        sum( obj ) {

        var sum = 0;
        for( var el in obj ) {
            if( obj.hasOwnProperty( el ) ) {
                // console.log(obj[el])
            sum += parseFloat( obj[el] );
            }
        }
        return sum;
        },

        failed( obj ) {
        var sum = 0;
        for( var el in obj ) {
            if( obj.hasOwnProperty( el ) ) {





                if(obj[el]<2){
                    sum += 1;
                // console.log(obj[el]);
                }


            // sum += parseFloat( obj[el] );
            }
        }
        return sum;
        },



        formsubmit() {
            this.preloader = true;
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
        // }, 3000);
        setTimeout(() => {
            this.getcount()
        }, 3000);
    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
