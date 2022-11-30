<template>
    <div>
        <loader v-if="preloader == true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
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
                        <div class="form-group">
                            <label for="">পেমেন্ট ক্যাটাগরি</label>
                            <select class="form-control" v-model="form.type">
                                <option value="">পেমেন্ট ক্যাটাগরি নির্বাচন করুন</option>
                                <option value="Admission_fee">ভর্তি ফি</option>
                                <option value="monthly_fee">মাসিক বেতন</option>
                                <option value="session_fee">সেশন ফি</option>
                                <option value="exam_fee">পরীক্ষার ফি</option>
                            </select>
                        </div>



                        <div class="form-group" v-if="form.type == 'Admission_fee'">
                            <label for="">এডমিশন আইডি</label>
                            <input type="text" v-model="form.adminssionId" class="form-control">
                        </div>





                        <div class="monthly_fee" v-if="form.type == 'monthly_fee' || form.type == 'session_fee'">
                            <div class="form-group">
                                <label for="">পেমেন্ট করার মাধ্যম</label>
                                <select class="form-control" v-model="form.paymenttype">
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="AdmissionID">এডমিশন আইডি এর মাধ্যমে</option>
                                    <option value="StudentID"> স্টুডেন্ট আইডি এর মাধ্যমে</option>
                                    <option value="other">শ্রেণি, রোল, গ্রুপ এর মাধ্যমে</option>
                                </select>
                            </div>

                            <div class="form-group" v-if="form.type == 'monthly_fee'">
                            <label for="">মাসের নাম</label>
                            <select class="form-control" v-model="form.month" id="month" required>
                            <option value="">
                                SELECT
                            </option>
                            <option v-for="(monthlist,indd) in months" :key="'mon'+indd">{{ monthlist }}</option>

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


                                <div class='form-group'
                                    v-if="form.student_class == 'Nine' || form.student_class == 'Ten'">
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


                        <div class='rootContainer' v-if="searched == 1">
                            <div class='headerSection'>
                                <table width='100%'>
                                    <tr>
                                        <td>
                                            <p class='fontsize1'>গণপ্রজাতন্ত্রী বাংলাদেশ সরকার </p>
                                            <p class='fontsize2'>মাধ্যমিক ও উচ্চমাধ্যমিক শিক্ষা অধিদপ্তর</p>
                                        </td>
                                        <td style='text-align: right'>
                                            <div v-if="paymentStatus == 'Paid'" class="paiddiv">
                                                <button class="btn btn-success">Paid</button>
                                                <a class="btn btn-info" target="_blank"
                                                    :href="'/student/applicant/copy/' + student.AdmissionID">Print
                                                    Applicant Copy</a>
                                            </div>

                                            <a class="btn btn-info" v-else-if="paymentStatus == 'Pending'"
                                                :href="paymentUrl">Pay Pending Payment</a>

                                            <a class="btn btn-info" v-else-if="paymentStatus == 'Failed'"
                                                :href="paymentUrl">Pay Failed Payment</a>

                                            <a class="btn btn-info" v-else :href="'/payment?studentId='+student.id+'&type='+form.type+'&month='+form.month">Pay Now</a>
                                        </td>
                                    </tr>
                                </table>
                                <p
                                    style='    border-bottom: 3px solid #808080;    margin-top: 10px; margin-bottom: 20px;'>
                                </p>
                                <h3 style='text-align:center' class='copyTitle'></h3>
                                <table class='tableTag' width='100%' style='margin-top:20px ;margin-bottom:20px ;'>
                                    <tr>
                                        <td width='15%' class='tableRowHead'>Admssion Id</td>
                                        <td colspan='3'>{{ student.AdmissionID }}</td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Class</td>
                                        <td>{{ student.StudentClass }}</td>
                                        <td class='tableRowHead' width='10%'>Group</td>
                                        <td>{{ student.StudentGroup }}</td>
                                    </tr>
                                </table>
                                <table class='tableTag' width='100%' style='margin-top:20px ;margin-bottom:20px ;'>
                                    <tr>
                                        <td class='tableRowHead' width='20%'>Name</td>
                                        <td colspan='3'>{{ student.StudentName }}</td>
                                        <td width='20%' style='padding:0 !important;' rowspan='6'><img width='180px'
                                                style='overflow:hidden'
                                                src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfOcr1OHnhhPCnQZrdBTc4kaopGN_phjZ8QQ&usqp=CAU'
                                                alt=''></td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Father Name</td>
                                        <td>{{ student.StudentFatherNameBn }}</td>
                                        <td class='tableRowHead' width='13%'>Nid</td>
                                        <td>{{ student.StudentFatherNid }}</td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Mother Name</td>
                                        <td>{{ student.StudentMotherNameBn }}</td>
                                        <td class='tableRowHead'>Nid</td>
                                        <td>{{ student.StudentMotherNid }}</td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Date of Birth</td>
                                        <td>{{ student.StudentDateOfBirth }}</td>
                                        <td class='tableRowHead'>Birth Reg.</td>
                                        <td>{{ student.StudentBirthCertificateNo }}</td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Mobile No.</td>
                                        <td>{{ student.StudentPhoneNumber }}</td>
                                        <td class='tableRowHead'>Nationality</td>
                                        <td>Banglideshi</td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Gender</td>
                                        <td colspan='3'>{{ student.StudentGender }}</td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Guard. Name</td>
                                        <td></td>
                                        <td class='tableRowHead'>Guard. Nid</td>
                                        <td colspan='2'></td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Prev School</td>
                                        <td colspan='4'></td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Prev Class</td>
                                        <td colspan='4'></td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Present Address</td>
                                        <td colspan='4'>{{ student.StudentAddress }}</td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Permanent Address</td>
                                        <td colspan='4'>{{ student.StudentAddress }}</td>
                                    </tr>
                                </table>
                                <table class='tableTag' width='100%' style='margin-top:20px ;margin-bottom:20px ;'>
                                    <tr>
                                        <td class='tableRowHead' width='15%'>Applied On</td>
                                        <td>{{ student.JoiningDate }}</td>
                                        <td class='tableRowHead' width='15%'>Printed On</td>
                                        <td>".date('Y-m-d')."</td>
                                    </tr>
                                    <tr>
                                        <td class='tableRowHead'>Declaration</td>
                                        <td colspan='3'>sdfghj</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <h2 v-if="searched==2" style="color:red;text-align:center;font-size: 33px;"> No Data Found! </h2>




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
                StudentGroup: '',
                StudentRoll: '',
            },
            student: {},
            paymentStatus: 'Paid',
            paymentUrl: '#',
            searched: 0,
        }
    },
    methods: {
        async PaymentSearch() {
            var res = await this.callApi('post', `/api/payment/data/search`, this.form);
            if (res.data.student) {
                this.student = res.data.student
                this.searched = res.data.searched
            } else {
                this.student = {}
                this.searched = 2
            }
            this.paymentUrl = res.data.paymentUrl
            this.paymentStatus = res.data.paymentStatus
            // var res2 = await this.callApi('get',`/api/student/applicant/copy/${res.data.student.AdmissionID}`,[]);
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
