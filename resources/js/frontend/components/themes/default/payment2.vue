<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>
        <section class="inner-header divider layer-overlay overlay-theme-colored-7">
            <div class="container">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="text-theme-colored2 font-36">পেমেন্ট
                            </h1>
                            <ol class="breadcrumb text-left mt-10 white">
                                <li><a href="">Home</a></li>
                                <li class="active">পেমেন্ট</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main Start -->
        <main class="container-fluid">
            <div class="row">
                <!-- Left Main -->
                <div class="col-lg-9 my-3">
                    <div class="container">




                        <div class="monthly_fee">
                            <div class="form-group">
                                <label for="">পেমেন্ট করার মাধ্যম</label>
                                <select class="form-control" v-model="form.paymenttype">
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="other">শ্রেণি রোল এর মাধ্যমে</option>
                                    <option value="AdmissionID">এডমিশন আইডি এর মাধ্যমে</option>
                                    <option value="StudentID"> স্টুডেন্ট আইডি এর মাধ্যমে</option>
                                </select>
                            </div>




                            <div class="form-group" v-if="form.paymenttype == 'AdmissionID'">
                                <label for="">এডমিশন আইডি</label>
                                <input type="text" v-model="form.adminssionId" class="form-control">
                            </div>
                            <div class="form-group" v-if="form.paymenttype == 'StudentID'">
                                <label for="">স্টুডেন্ট আইডি</label>
                                <input type="text" v-model="form.StudentID" class="form-control">
                            </div>
                            <div class="other" v-if="form.paymenttype == 'other'">


                                <div class="form-group">
                                    <label>শ্রেণি</label>
                                    <select class="form-control" style="width: 100%;" v-model="form.student_class"
                                        required>
                                        <option value="">
                                            SELECT
                                        </option>
                                        <option v-for="(classlist, index) in classess" :key="'class' + index">{{ classlist
                                        }}</option>
                                    </select>
                                </div>


                                <div class='form-group' v-if="form.student_class == 'Nine' || form.student_class == 'Ten'">
                                    <label>গ্রুপ</label>
                                    <select class='form-control' style='width: 100%;' v-model='form.StudentGroup'
                                        id='group' required>
                                        <option value=''>select</option>
                                        <option v-for="(group, ind) in groups" :key="'group' + ind">{{ group }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">রোল</label>
                                    <input type="text" v-model="form.StudentRoll" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info" @click="PaymentSearch">খুঁজুন</button>





                        <div class="card" v-if="searched == 1">
                            <div class="card-header" style="display: flex;justify-content: end;">

                            </div>
                            <div class="card-body">
                                <div class="row">



                                    <div class="col-md-6">
                                        <b>Name:</b> {{  student.StudentName }}
                                    </div>
                                    <div class="col-md-3">
                                        <b>Roll:</b> {{  student.StudentRoll }}
                                    </div>
                                    <div class="col-md-3">
                                        <b>Class:</b> {{  student.StudentClass }}
                                    </div>

                                    <hr>

                                    <div class="col-md-6">
                                        <b>Father Name:</b> {{  student.StudentFatherNameBn }}
                                    </div>
                                    <div class="col-md-6">
                                        <b>Mother Name:</b> {{  student.StudentMotherNameBn }}
                                    </div>
                                    <hr>








                                    <div class="col-md-6" v-if="student.StudentClass=='Nine' || student.StudentClass=='Ten'">
                                        <b>Group:</b> {{  student.StudentGroup }}
                                    </div>
                                    <div class="col-md-6" v-else>
                                        <b>Group:</b> N/A
                                    </div>

                                    <hr>

                                    <div class="col-md-6">
                                       <b> Admission Id:</b> {{  student.AdmissionID }}
                                    </div>
                                    <div class="col-md-6">
                                        <b>Student Id:</b> {{  student.StudentID }}
                                    </div>
                                    <hr>
                                </div>


                                <div class="row">
                                    <div class="col-md-12" v-html="paymentHtml"></div>
                                </div>


                            </div>



                        </div>




                        <div v-if="searched==2" v-html="message"></div>


                        <!-- <h2 v-if="searched==2" style="color:red;text-align:center;font-size: 33px;"> {{ message }}</h2> -->




                    </div>
                </div>
                <side-bar class-name="col-md-3"></side-bar>
            </div>
        </main>
        <!-- Main End -->
    </div>
</template>
<script>
export default {
    created() {
    },
    data() {
        return {
            preloader: false,
            form: {
                type: '',
                adminssionId: '',
                StudentID: '',
                month: '',
                paymenttype: '',
                student_class: '',
                StudentGroup: 'Humanities',
                StudentRoll: '',
            },
            student: {},
            paymentStatus: 'Paid',
            message: '',
            paymentHtml: '',
            paymentUrl: '#',
            trxid: '',
            searched: 0,
        }
    },
    methods: {
        async PaymentSearch() {
            this.preloader = true
            var res = await this.callApi('post', `/api/payment/data/search`, this.form);
            if (res.data.student) {
                this.student = res.data.student
                this.searched = res.data.searched
            } else {
                this.student = {}
                this.message = res.data.messages
                this.searched = 2
            }
            this.paymentUrl = res.data.paymentUrl
            this.trxid = res.data.trxid
            this.paymentStatus = res.data.paymentStatus
            this.paymentHtml = res.data.paymentHtml
            // var res2 = await this.callApi('get',`/api/student/applicant/copy/${res.data.student.AdmissionID}`,[]);
            this.preloader = false
        }
    },
    mounted() {
        this.all_list('groups');

        if(this.$route.query.adminssionId && this.$route.query.type){
            this.form.adminssionId = this.$route.query.adminssionId
            this.form.type = this.$route.query.type
            this.PaymentSearch()
        }



    }
}
</script>
<style scoped>
hr {
    background-color: hsl(0deg 0% 89%) !important;
    border: 0px solid black !important;
    display: block !important;
    height: 2px !important;
    margin: 0.5rem 0 !important;
    width: 100%;
}
.rootContainer {
    margin-top: 25px;
    border: 1px solid;
    padding: 5px 21px;
}
.tableTag,
.tableTag td,
.tableTag th {
    border: 1px solid #6c6c6c;
    border-collapse: collapse;
    padding: 3px 7px;
    font-size: 10px;
}
td.tableRowHead {
    background: #e9e9e9;
    color: black !important;
}
.fontsize1 {
    font-size: 16px;
}
.fontsize2 {
    font-size: 25px;
}
.copyTitle {
    font-size: 23px;
    color: #3E4D5B;
}
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
