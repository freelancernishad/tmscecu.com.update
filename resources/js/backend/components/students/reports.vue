<template>
	<div>

 <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Student Reports</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>Student Reports</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Fees Table Area Start Here -->
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



                </div>
            </div>


                <div class="row gutters-8">


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <select class="form-control" v-model="form.class" required>
                            <option value="">SELECT CLASS</option>
                            <option value="all">All</option>
     <option v-for="classlist in classess">{{ classlist }}</option>
                        </select>


                    </div>


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <select class="form-control" v-model="form.type">
                                <option value="">নির্বাচন করুন</option>
                                <!-- <option value="all">সকল</option> -->
                                <option value="StudentGender">লিঙ্গ</option>
                                <option value="StudentReligion">ধর্ম</option>
                                <option value="stipend">উপবৃত্তি</option>
                                <option value="StudentCategory">শিক্ষার্থীর ধরন</option>
                                <option value="StudentKota">কোটা</option>
                                <option value="parentEarn">অভিভাবকের মাসিক আয়</option>
                                <option value="StudentFatherOccupation">অভিভাবকের পেশা</option>
                            </select>
                    </div>


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group" v-if="form.type=='StudentGender'">
                        <select class="form-control" v-model="form.rowData">
                            <option value="">নির্বাচন করুন</option>
                            <option value="Male">ছেলে</option>
                            <option value="Female">মেয়ে</option>
                        </select>
                    </div>


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group" v-else-if="form.type=='StudentReligion'">
                        <select class="form-control" v-model="form.rowData">
                            <option value="">নির্বাচন করুন</option>
                            <option value="Islam">ইসলাম</option>
                            <option value="Hindu">হিন্দু</option>
                            <option value="Buddhist">বৌদ্ধ</option>
                            <option value="Christian">খ্রিষ্টান</option>
                        </select>
                    </div>


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group" v-else-if="form.type=='StudentCategory'">
                        <select class="form-control" v-model="form.rowData">
                            <option value="">নির্বাচন করুন</option>
                            <option>কর্মজীবী শিক্ষার্থী</option>
                            <option>ভূমিহীন অভিভাবকের সন্তান</option>
                            <option>ক্ষুদ্র নৃ-গোষ্ঠী শিক্ষার্থী</option>
                            <option>বিশেষ চাহিদা সম্পন্ন শিক্ষার্থী</option>
                            <option>অনাথ/এতিম শিক্ষার্থী</option>
                            <option>অন্যান্য</option>
                        </select>
                    </div>


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group" v-else-if="form.type=='StudentKota'">
                        <select class="form-control" v-model="form.rowData">
                            <option value="">নির্বাচন করুন</option>
                            <option>মুক্তিযোদ্ধার সন্তান/নাতী-নাতনী</option>
                            <option>অত্র বিদ্যালয়ে কর্মরত শিক্ষক, কর্মচারী ও ম্যানেজিং কমিটির সন্তান</option>
                            <option>প্রতিবন্ধী</option>
                            <option>কোনো কোটা নেই</option>
                        </select>
                    </div>



                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group" v-else-if="form.type=='parentEarn'">
                        <select class="form-control" v-model="form.rowData">
                            <option value="">নির্বাচন করুন</option>
                            <option>10000-20000</option>
                        </select>
                    </div>


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group" v-else-if="form.type=='StudentFatherOccupation'">
                        <select class="form-control" v-model="form.rowData">
                            <option value="">নির্বাচন করুন</option>
                            <option>ব্যবসায়ি</option>
                            <option>কৃষক</option>
                            <option>কৃষি শ্রমিক</option>
                            <option>ডাক্তার</option>
                            <option>জেলে</option>
                            <option>সরকারি চাকুরি</option>
                            <option>কামার/কুমোর</option>
                            <option>প্রবাসি</option>
                            <option>ক্ষুদ্র ব্যবসায়ি</option>
                            <option>শিক্ষক</option>
                            <option>অকৃষি শ্রমিক</option>
                            <option>অন্যান্য</option>
                        </select>
                    </div>



                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <button type="submit" @click="searchdata" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                    </div>
                </div>



                    <h4 v-if="search">Total : {{ studentsCount }}</h4>



                <a v-if="search" :href="'/dashboard/student/report?class='+form.class+'&type='+form.type+'&from='+form.from+'&to='+form.to+'&t=pdf'" style="float: right;font-size: 20px;margin-bottom: 15px;" target="_blank" class="btn btn-info">Report Download</a>



            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>রোল</th>
                            <th>নাম</th>
                            <th>শ্রেণী</th>
                            <th>পিতার নাম</th>
                            <th>মাতার নাম</th>
                            <th>ঠিকানা</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(student,index) in students" :key="index">
                            <td>{{ student.StudentRoll }}</td>
                            <td>{{ student.StudentName }}</td>
                            <td>{{ student.StudentClass }}</td>
                            <td>{{ student.StudentFatherNameBn }}</td>
                            <td>{{ student.StudentMotherNameBn }}</td>
                            <td>{{ student.StudentAddress }}</td>
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
    this.yearslist();
       this.monthslist();
       this.all_list('exams');
},

	data () {
		return {
            form: {
                class:'',
                type:'',
                rowData:'',
            },
            students:{},
            studentsCount:0,
            search:false,

		}
	},

	methods: {


           async searchdata(){
                var res = await this.callApi('post',`/api/students/reports`,this.form);
                this.students = res.data;
                this.studentsCount = res.data.length;
                this.search = true
            },



	},
	mounted(){
        const sevenDaysAgo  = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000);
        // console.log(sevenDaysAgo);
        this.form.from =  User.dateformat(sevenDaysAgo)[0];
        this.form.to =  User.dateformat()[0];


	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
