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
                <form id="form" enctype="multipart/form-data" method="POST" v-on:submit.prevent="formsubmit">
                    <div class="d-flex justify-content-between">
                        <router-link class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                           to="">
                            GO BACK
                        </router-link>
                        <router-link v-if="edit=='edit'" class="btn-fill-lmd text-light gradient-dodger-blue mb-3"
                            :to="{ name: 'resultview', params: { school_id: form.school_id, student_class: form.classname, group: form.group, religion: form.religion, subject: this.$route.params.subject, examType: this.$route.params.examType, date: form.date } }">
                            Full Result View
                        </router-link>
                    </div>
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
                            <div class="form-group student_class">
                                <label>Total Mark:</label>
                                <input type="text" v-model="form.total" placeholder="Input Total Mark"
                                    class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
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
                                    <th scope="col" class="textwrap" width="15%">নাম</th>
                                    <th scope="col">লিখিত</th>
                                    <th scope="col">বহুনির্বাচনী</th>
                                    <th scope="col">ব্যাবহারিক</th>
                                    <th scope="col" width="20%">মোট</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="student in students">
                                    <td scope="col">{{ student.StudentRoll }}</td>
                                    <td scope="col" class="textwrap">{{ student.StudentName }}</td>
                                    <td scope="col"><input type="number" min="0" max="100" onClick="this.select();" class="form-control"
                                            v-model="form.number[student.StudentRoll]['CQ']" required></td>
                                    <td scope="col"><input type="number" min="0" max="100"  onClick="this.select();"
                                            v-model="form.number[student.StudentRoll]['MCQ']" class="form-control"
                                            required></td>
                                    <td scope="col"><input type="number" min="0" max="100"  onClick="this.select();"
                                            v-model="form.number[student.StudentRoll]['EXTRA']" class="form-control"
                                            required></td>
                                    <td scope="col"><input type="text"  onClick="this.select();"
                                            :value="Number(form.number[student.StudentRoll]['CQ']) + Number(form.number[student.StudentRoll]['MCQ']) + Number(form.number[student.StudentRoll]['EXTRA'])"
                                            class="form-control" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <input class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark mt-3" type="submit" value="SUBMIT"
                        name="SubmitResult" id="save_btn" />
                </form>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
export default {
    created() {
        this.filterdata.date = User.dateformat()[0];
        this.filterdata.student_class = this.$route.params.student_class;
        this.filterdata.group = this.$route.params.group;
        this.filterdata.religion = this.$route.params.religion;
        this.filterdata.subject = this.subjectconvertbn(this.$route.params.subject);
        this.filterdata.examType = this.examcomvert(this.$route.params.examType);
        this.filterdata.date = this.$route.params.date;
        this.year = User.dateformat(this.filterdata.date)[5];
        this.allstudents();
        this.checkResult()
    },
    data() {
        return {
            students: {},
            edit: "",
            student_class: "",
            preloader: true,
            year: null,
            filterdata: {
                student_class: null,
                group: 'All',
                religion: 'All',
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
                religion: '',
                total: null,
                date: null,
                number: {},
            }
        }
    },
    methods: {
        allstudents() {
            //  this.form.number = {};
            var url = '';
            var religion = '';
            var group = '';
            var subject = '';
            if (this.$route.params.religion == 'All') {
                religion = ''
            } else {
                religion = this.$route.params.religion;
            }

            if(this.$route.params.student_class=='Nine' || this.$route.params.student_class=='Ten'){
                group = this.$route.params.group;

                if(this.$route.params.subject=='Agriculture' || this.$route.params.subject=='Higher_Mathematics'){

                    subject = this.$route.params.subject;
                }else{

                    subject = '';
                }


            }else{
                group = '';
                subject = '';
            }


            url = `/api/students/single?filter[StudentClass]=${this.$route.params.student_class}&filter[Year]=${this.year}&filter[StudentReligion]=${religion}&filter[StudentGroup]=${group}&filter[school_id]=${this.$route.params.school_id}&filter[StudentStatus]=Active&filter[StudentSubject]=${subject}`;
            axios.get(url)
                .then(({ data }) => {
                    this.students = data
                    if (this.edit != 'edit') {
                        this.preloader = false;
                        // console.log('edit run')
                        data.forEach(value => {
                            this.form.number[value.StudentRoll] = { 'CQ': 0, 'MCQ': 0, 'EXTRA': 0, 'TOTAL': 0, 'SUBJECT_TOTAL': null };
                        });
                    }
                })
                .catch()
        },
        checkResult() {
            // this.form.number = {};
            // this.form.editid = {};
            var url = '';
            var subject = '';
            var group = 'Humanities';
            if (this.$route.params.subject == 'Religion') {
                if (this.$route.params.religion == 'Islam') {
                    subject = 'ইসলামধর্ম';
                } else if (this.$route.params.religion == "Hindu") {
                    subject = 'হিন্দুধর্ম';
                } else {
                    subject = this.subjectconvertbn(this.$route.params.subject)
                }
            } else {
                subject = this.subjectconvertbn(this.$route.params.subject)
            }

            if(this.$route.params.student_class=='Nine' || this.$route.params.student_class=='Ten'){
                group = this.$route.params.group;
            }else{
                group = 'Humanities';
            }

            url = `/api/results/check?filter[school_id]=${this.$route.params.school_id}&filter[class]=${this.$route.params.student_class}&filter[year]=${this.year}&filter[exam_name]=${this.examcomvert(this.$route.params.examType)}&filter[class_group]=${group}&subject=${subject}`;
            axios.get(url)
                .then(({ data }) => {
                    // console.log(this.subjectconverten(this.filterdata.subject));
                    var sub;
                    // console.log(sub)
                    if (data.length) {
                        this.edit = 'edit'
                        data.forEach(value => {
                            if (this.subjectconverten(this.filterdata.subject) == 'Bangla') {
                                sub = 'Bangla_1st_d';
                            } else if (this.subjectconverten(this.filterdata.subject) == 'English') {
                                sub = 'English_1st_d';
                            } else if (this.subjectconverten(this.filterdata.subject) == 'Religion') {
                                if (this.$route.params.religion == 'Islam') {
                                    sub = 'ReligionIslam_d';
                                } else if (this.$route.params.religion == "Hindu") {
                                    sub = 'ReligionHindu_d';
                                } else {
                                    sub = this.subjectconvertbn(this.$route.params.subject)
                                }
                            } else {
                                sub = this.subjectconverten(this.filterdata.subject) + "_d";
                            }
                            // console.log(sub)
                            // console.log(value[sub])
                            this.form.editid[value.roll] = value.id
                            this.form.number[value.roll] = JSON.parse(value[sub])
                            this.form.total = JSON.parse(value[sub]).SUBJECT_TOTAL;
                        });
                    } else {
                        this.edit = ''
                    }
                })
                .catch()
        },
        formsubmit() {
            this.preloader = true;
            axios.post(`/api/results/submit`, this.form)
                .then(({ data }) => {
                        this.allstudents();
                      this.checkResult();
                        this.getformdata()
                    Notification.success();
                    this.preloader = false;
                })
                .catch(() => {
                    // this.$router.push({name: 'supplier'})
                })
        },
        getformdata() {
            this.form.year = this.year;
            this.form.exam_name = this.filterdata.examType;
            this.form.subject = this.filterdata.subject;
            this.form.classname = this.$route.params.student_class;
            this.form.school_id = this.$route.params.school_id;
            this.form.date = this.$route.params.date;
            this.form.group = this.filterdata.group;
            this.form.religion = this.filterdata.religion;
        }
    },
    mounted() {
        // this.subjects =  User.all_list('subjects','Six','All');
        // setTimeout(() => {
        this.getformdata();
        // }, 3000);
    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
