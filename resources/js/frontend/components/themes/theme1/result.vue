<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>



                    <div class="container">
            <h2 class="ms-2 mt-2">পরীক্ষার ফলাফল</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group student_class">
                                    <label>Class:</label>
                                    <select class="form-control" style="width: 100%;" @change="callSubjects"
                                        v-model="filterdata.student_class" required>
                                        <option value="">
                                            SELECT
                                        </option>
                                        <option>Admission Result</option>
                                        <option v-for="classlist in classess">{{ classlist }}</option>
                                        <option>SSC Result</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12"
                                v-if="filterdata.student_class == 'Nine' || filterdata.student_class == 'Ten'">
                                <div class='form-group'>
                                    <label>Group:</label>
                                    <select class='form-control' style='width: 100%;' v-model='filterdata.group'
                                        @change="callSubjects" id='group' required>
                                        <option value=''>select</option>
                                        <option v-for="group in groups">{{ group }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" v-if="filterdata.student_class && filterdata.student_class!='Admission Result'">
                                <div class="form-group">
                                    <label>Exam Type:</label>
                                    <select class="form-control" style="width: 100%;" v-model="filterdata.examType"
                                        @change="callSubjects" id="ExamType" required>
                                        <option value="">select</option>
                                        <option v-for="exam in exams" :value="exam">{{ ex_name(exam) }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" v-if="filterdata.examType == 'Weakly Examination'">
                                <div class='form-group'>
                                    <label>Subject:</label>
                                    <select class='form-control' style='width: 100%;' v-model="filterdata.subject"
                                        id='Subject' @change="callreligion" required>
                                        <option value=''>SELECT</option>
                                        <option v-for="subject in subjects">{{ subject }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12"
                                v-if="filterdata.subject == 'ধর্ম' && filterdata.examType == 'Weakly Examination'">
                                <div class='form-group'>
                                    <label>Religion:</label>
                                    <select class='form-control' style='width: 100%;' v-model="filterdata.religion"
                                        id='Subject' required>
                                        <option value=''>SELECT</option>
                                        <option v-for="religion in religions">{{ religion }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" v-if="filterdata.examType">
                                <div class='form-group'>
                                    <label>Year:</label>
                                    <select class='form-control' style='width: 100%;' v-model="filterdata.year"
                                        id='Subject' required>
                                        <option value=''>SELECT</option>
                                        <option v-for="year in years">{{ year }}</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-12" v-if="filterdata.year">
                                <div class="form-group student_class">
                                    <label>Roll:</label>
                                    <input type="number" class="form-control" v-model="filterdata.roll" id="date">
                                </div>
                            </div>



                            <div class="col-md-12" v-if=" filterdata.student_class=='Admission Result'">
                                <div class="form-group student_class">
                                    <label>Admission Id:</label>
                                    <input type="number" class="form-control" v-model="filterdata.roll" id="date">
                                </div>
                            </div>



                            <div class="col-md-3 customFlex" style="margin-top:11px">
                                <div class="form-group student_class">
                                    <label></label>
                                    <br>
                                    <input type="submit" value="Search" class="btn btn-info"
                                        @click="search" />
                                </div>
                            </div>
                        </div>
                        <section class="view about--part1">
                            <div class="view_display" style="overflow:hidden" v-html="result">

                            </div>
                        </section>
                    </div>

    </div>
</template>
<script>
export default {
    created() {
        this.ASSETURL = ASSETURL
    },
    data() {
        return {
            ASSETURL: '',
            student_class: '',
            year: '',
            examType: '',
            roll: '',
            count: '',
            years: [],
            result: '',
            preloader: false,
            filterdata: {
                student_class: null,
                group: 'All',
                subject: 'All',
                religion: 'All',
                examType: null,
                roll: null,
                year: null,
                date: null,
            }
        }
    },
    methods: {
        search() {
            this.preloader = true;
            // /result/:student_class/:group/:examType/:subject/:religion/:year/:roll/:school_id
            var group, subject, religion;
            if (this.filterdata.group == 'All') {
                group = '';
            } else {
                group = this.filterdata.group
            }
            if (this.filterdata.subject == 'All') {
                subject = '';
            } else {
                subject = this.filterdata.subject
            }
            if (this.filterdata.religion == 'All') {
                religion = '';
            } else {
                religion = this.filterdata.religion
            }
            var url = `/api/public/result/search?filter[class]=${this.filterdata.student_class}&filter[class_group]=${group}&filter[exam_name]=${this.filterdata.examType}&filter[subject]=${subject}&filter[StudentReligion]=${religion}&filter[year]=${this.filterdata.year}&filter[roll]=${this.filterdata.roll}&filter[school_id]=${this.school_id}`;
            axios.get(url)
                .then(({ data }) => {
                    this.preloader = false;
                    this.result = data

                    //    console.log(data.length)
                })
                .catch()
        },
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
        callSubjects() {

            if(this.filterdata.student_class=='SSC Result'){
                window.location.href='http://www.educationboardresults.gov.bd/';
            }



            if (this.filterdata.student_class == 'Nine' || this.filterdata.student_class == 'Ten') {
            } else {
                this.filterdata.group = 'All'
            }
            if (this.filterdata.examType == 'Weakly Examination') {
            } else {
                this.filterdata.subject = 'All'
                this.filterdata.religion = 'All'
            }
            this.subjects = this.all_list('subjects', this.filterdata.student_class, this.filterdata.group);
        },
        callreligion() {
            if (this.filterdata.subject != 'ধর্ম') {
                this.filterdata.religion = 'All'
            }
        },
    },
    mounted() {
        this.all_list('groups');
        this.all_list('exams');
        this.all_list('religions');
        this.yearslist();
        this.filterdata.date = User.dateformat()[0];
        if (this.$route.params.classname) {
            this.student_class = this.$route.params.classname;
            this.roll = this.$route.params.roll;
            this.year = this.$route.params.year;
            this.examType = this.examcomvert(this.$route.params.exam_name);
            this.school_id = this.$route.params.school_id;
            this.search();
        }
    }
}
</script>
<style>
.mini-profile-widget .image-container .avatar {
    width: 180px;
    height: 180px;
    display: block;
    margin: 0 auto;
    border-radius: 50%;
    background: white;
    padding: 4px;
    border: 1px solid #dddddd;
}
</style>
