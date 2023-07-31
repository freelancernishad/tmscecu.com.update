<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>

                <div class="container">
                    <h2 class="ms-2 mt-2">পেমেন্ট</h2>
                    <div class="monthly_fee">
                        <div class="other">
                            <div class='form-group'>
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


                            <div class="form-group">
                                <label for="">সাল</label>
                                <input type="text" v-model="form.year" class="form-control">
                            </div>


                        </div>
                    </div>
                    <button type="button" class="btn btn-info" @click="PaymentSearch">খুঁজুন</button>
                </div>



                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2 class=" text-center">প্রসংশা পত্রের জন্য আবেদন করুন</h2>
                        </div>
                        <div class="card-body">
                        <form class="row" v-on:submit.prevent="formsubmit">



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">গ্রুপ</label>
                                    <input type="text" v-model="f.group"  class="form-control">
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">রোল</label>
                                    <input type="text" v-model="f.roll"  class="form-control">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">সাল </label>
                                    <input type="text" v-model="f.year" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">এসএসসি রোল</label>
                                    <input type="text"  v-model="f.sscRoll" class="form-control">
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">এসএসসি রেজিস্ট্রেশন নাম্বার</label>
                                    <input type="text"  v-model="f.sscReg" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">এসএসসি ফলাফল GPA </label>
                                    <input type="text"  v-model="f.sscGpa" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">জন্ম তারিখ</label>
                                    <input type="date" v-model="f.dateOfBirth" class="form-control">
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">নাম (বাংলা)</label>
                                    <input type="text" v-model="f.name" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">পিতার নাম (বাংলা)</label>
                                    <input type="text" v-model="f.fatherName" class="form-control">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form_label">মাতার নাম  (বাংলা)</label>
                                    <input type="text"  v-model="f.motherName" class="form-control">
                                </div>
                            </div>




                            <div class="col-md-4">
                        <div class="form-group">
                            <label for=""  class="form_label">বিভাগ</label>
                            <input type="text" class="form-control" name="বিভাগ" v-model="f.division"  >
                        </div>
                    </div>


                            <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">জেলা</label>
                        <input type="text" class="form-control" name="জেলা" v-model="f.district"  >
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">উপজেলা/থানা</label>
                        <input type="text" class="form-control" name="উপজেলা/থানা" v-model="f.upazila"  >
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">ইউনিয়ন</label>
                        <input type="text" class="form-control" name="ইউনিয়ন" v-model="f.union"  >
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">পোষ্ট অফিস</label>
                        <input type="text" class="form-control" name="পোষ্ট অফিস" v-model="f.post_office"  >

                    </div>

                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">গ্রাম</label>
                        <input class="form-control" type="text"  placeholder="গ্রাম" v-model="f.StudentAddress" name="গ্রাম"/>
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
                year: '',
            },
            f:{
                studentId:'',
                name:'',
                group:'',
                roll:'',
                year:'',
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

            searched: 1,




        }
    },
    methods: {
        async PaymentSearch() {

            this.preloader = true
            var res = await this.callApi('post', `/api/student/data/search`, this.form);
            if(res.status==200){
                this.student = res.data


                this.f = {
                    studentId:res.data.id,
                    name:res.data.StudentName,
                    group:res.data.StudentGroup,
                    roll:res.data.StudentRoll,
                    year:res.data.Year,
                    sscRoll:'',
                    sscReg:'',
                    sscGpa:'',
                    dateOfBirth:res.data.StudentDateOfBirth,
                    fatherName:res.data.StudentFatherNameBn,
                    motherName:res.data.StudentMotherNameBn,
                    division:res.data.division,
                    district:res.data.district,
                    upazila:res.data.upazila,
                    union:res.data.union,
                    post_office:res.data.post_office,
                    StudentAddress:res.data.StudentAddress,
                },





                this.searched = 1
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
