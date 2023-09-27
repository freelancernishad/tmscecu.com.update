<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>

                <div class="container">
                    <h2 class="ms-2 mt-2">প্রশংসা পত্র</h2>
                    <div class="monthly_fee">
                        <div class="other">
                            <div class='form-group'>
                                <label>দশম শ্রেণির গ্রুপ</label>
                                <select class='form-control' style='width: 100%;' v-model='form.StudentGroup'
                                    id='group' required>
                                    <option value=''>select</option>
                                    <option v-for="(group, ind) in groups" :key="'group' + ind">{{ group }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for=""> দশম শ্রেণির রোল/এসএসসি রোল </label>
                                <input type="text" v-model="form.StudentRoll" class="form-control">
                            </div>

<!--
                            <div class="form-group">
                                <label for="">সাল</label>
                                <input type="text" v-model="form.year" class="form-control" disabled>
                            </div> -->


                        </div>
                    </div>
                    <button type="button" class="btn btn-info" @click="PaymentSearch">খুঁজুন</button>
                </div>



                <div class="container" v-if="searched">
                    <div class="card">
                        <div class="card-header">
                            <h2 class=" text-center">প্রসংশা পত্রের জন্য আবেদন করুন</h2>
                        </div>
                        <div class="card-body">
                        <form class="row" v-on:submit.prevent="formsubmit">



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">গ্রুপ</label>
                                    <input type="text" v-model="f.group"  class="form-control" required>
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">রোল</label>
                                    <input type="text" v-model="f.roll"  class="form-control" required>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">এসএসসি পরীক্ষার সাল </label>
                                    <select v-model="f.year" class="form-control" required>
                                        <option value="">নির্বাচন করুন</option>
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">শিক্ষাবর্ষ </label>

                                    <select v-model="f.academic_year" class="form-control" required>
                                        <option value="">নির্বাচন করুন</option>
                                        <option>2019-2020</option>
                                        <option>2020-2021</option>
                                        <option>2021-2022</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">ছাত্র/ছাত্রীর ধরণ </label>

                                    <select v-model="f.student_type" class="form-control" required>
                                        <option value="">নির্বাচন করুন</option>
                                        <option value="regular">নিয়মিত</option>
                                        <option  value="iregular">অনিয়মিত</option>
                                    </select>

                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">এসএসসি রোল</label>
                                    <input type="text"  v-model="f.sscRoll" class="form-control" required>
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">এসএসসি রেজিস্ট্রেশন নাম্বার</label>
                                    <input type="text"  v-model="f.sscReg" class="form-control" required>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">এসএসসি ফলাফল GPA </label>
                                    <input type="text"  v-model="f.sscGpa" class="form-control" required>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">জন্ম তারিখ</label>
                                    <input type="date" v-model="f.dateOfBirth" class="form-control" required>
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">নাম (বাংলা)</label>
                                    <input type="text" v-model="f.name" class="form-control" required>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">পিতার নাম (বাংলা)</label>
                                    <input type="text" v-model="f.fatherName" class="form-control" required>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">মাতার নাম  (বাংলা)</label>
                                    <input type="text"  v-model="f.motherName" class="form-control" required>
                                </div>
                            </div>




                            <div class="col-md-4">
                        <div class="form-group">
                            <label for=""  class="form_label">বিভাগ</label>
                            <input type="text" class="form-control" name="বিভাগ" v-model="f.division"  required >
                        </div>
                    </div>


                            <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">জেলা</label>
                        <input type="text" class="form-control" name="জেলা" v-model="f.district" required>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">উপজেলা/থানা</label>
                        <input type="text" class="form-control" name="উপজেলা/থানা" v-model="f.upazila"  required >
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">ইউনিয়ন</label>
                        <input type="text" class="form-control" name="ইউনিয়ন" v-model="f.union"  required >
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">পোষ্ট অফিস</label>
                        <input type="text" class="form-control" name="পোষ্ট অফিস" v-model="f.post_office"  required >

                    </div>

                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">গ্রাম</label>
                        <input class="form-control" type="text"  placeholder="গ্রাম" v-model="f.StudentAddress" name="গ্রাম"  required/>
                    </div>
                </div>





                <div class="col-md-12">
                    <button class="btn btn-info">Submit</button>
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
    },
    data() {
        return {
            preloader: false,
            form: {
                student_class: 'Ten',
                StudentGroup: 'Humanities',
                StudentRoll: '',
                year: '2022',
            },
            f:{
                studentId:'',
                name:'',
                group:'',
                roll:'',
                year:'',
                academic_year:'',
                student_type:'',
                sscRoll:'',
                sscReg:'',
                sscGpa:'',
                dateOfBirth:'',
                fatherName:'',
                motherName:'',
                division:'',
                district:'',
                upazila:'',
                union:'',
                post_office:'',
                StudentAddress:'',
            },
            student: {},

            searched: 0,




        }
    },
    methods: {
        async PaymentSearch() {

            this.preloader = true
            var res = await this.callApi('post', `/api/student/data/search`, this.form);
            if(res.status==200){

                var tc = res.data.tc
                var studentData = res.data.student
                this.student = studentData




                this.f = {
                    studentId:studentData.id,
                    name:studentData.StudentName,
                    group:studentData.StudentGroup,
                    roll:studentData.StudentRoll,
                    year:Number(studentData.Year)+1,



                    dateOfBirth:studentData.StudentDateOfBirth,
                    fatherName:studentData.StudentFatherNameBn,
                    motherName:studentData.StudentMotherNameBn,
                    division:studentData.division,
                    district:studentData.district,
                    upazila:studentData.upazila,
                    union:studentData.union,
                    post_office:studentData.post_office,
                    StudentAddress:studentData.StudentAddress,
                };

                // if(tc.sscRoll){
                //     this.f.sscRoll=tc.sscRoll;
                // }
                // if(tc.sscReg){
                //     this.f.sscReg=tc.sscReg;
                // }

                // if(tc.sscGpa){
                //     this.f.sscGpa=tc.sscGpa;
                // }


                this.searched = 1
            }else if(res.status==422){
                Notification.customError2('এই প্রশংসা পত্রটির জন্য একবার পেমেন্ট করা হয়েছে এবং নেওয়া হয়েছে । প্রশংসা পত্রটি আবার প্রয়োজন হলে বিদ্যালয়ে যোগাযোগ করুন');
                this.searched = 0
            }else{
                Notification.customError2('কোনো তথ্য খুঁজে পাওয়া যায় নি!');
                this.searched = 0

            }

            this.preloader = false
        },

        async formsubmit(){
            var res = await this.callApi('post',`/api/tc`,this.f);
            // console.log(res.data)
            window.location.href = res.data;
        },









    },
    mounted() {

        this.all_list('groups');
    }
}
</script>
<style scoped>

</style>
