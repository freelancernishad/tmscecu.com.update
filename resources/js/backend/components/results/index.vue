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
            <div class="flexBBox">

                    <legend>
                        <h2>Filter</h2>
                    </legend>



                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group student_class">
                                        <label>Class:</label>
                                        <select class="form-control" style="width: 100%;"  @change="callSubjects" v-model="filterdata.student_class" required>
                                            <option value="">
                                                SELECT
                                            </option>
                                             <option v-for="classlist in classess">{{ classlist }}</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-3"  v-if="filterdata.student_class=='Nine' || filterdata.student_class=='Ten'" >
                                <div class='form-group' >
                                    <label>Group:</label>
                                    <select class='form-control' style='width: 100%;' v-model='filterdata.group' @change="callSubjects" id='group' required>
                                    <option value=''>select</option>
                                    <option v-for="group in groups">{{ group }}</option>


                                    </select></div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Exam Type:</label>
                                        <select class="form-control" style="width: 100%;" v-model="filterdata.examType" onchange=""
                                            id="ExamType" required>
                                            <option value="">select</option>
                               <option v-for="exam in exams" :value="exam">{{ ex_name(exam) }}</option>
                                        </select>
                                    </div>

                                </div>



                                <div class="col-md-3">
                                      <div class='form-group' >
                                          <label>Subject:</label>
                                      <select  class='form-control' style='width: 100%;' v-model="filterdata.subject" id='Subject' @change="callreligion" required >
                                      <option value=''>SELECT</option>
                                       <option v-for="subject in subjects">{{ subject }}</option>
                                      </select>
                              </div>


                                </div>

                                <div class="col-md-3" v-if="filterdata.subject=='ধর্ম ও নৈতিক শিক্ষা'">
                                      <div class='form-group' >
                                          <label>Religion:</label>
                                      <select  class='form-control' style='width: 100%;' v-model="filterdata.religion" id='Subject'  required >
                                      <option value=''>SELECT</option>
                                       <option v-for="religion in religions">{{ religion }}</option>
                                      </select>
                              </div>


                                </div>


                                <div class="col-md-3">
                                    <div class="form-group student_class">
                                        <label>Date:</label>
                                        <input  type="date" class="form-control" v-model="filterdata.date" id="date">
                                    </div>

                                </div>
                                <div class="col-md-3 customFlex" style="margin-top:11px">
                                    <div class="form-group student_class">
                                        <label></label>
                                        <br>
                                        <input type="submit"  value="Search"   class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"  @click="filter" />
                                    </div>
                                </div>
                            </div>


                        </div>

            </div>

        </div>


        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ক্রমিক নং</th>
                            <th>শ্রেণি</th>
                            <th>গ্রুপ</th>
                            <th>পরীক্ষার নাম</th>
                            <th>সাল</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(result,index) in results" :key="index">
                            <td>{{ index+1 }}</td>
                            <td>{{ result.class }}</td>

                            <td v-if="result.class=='Nine' || result.class=='Ten'">{{ result.class_group, }}</td>
                            <td v-else >N/A</td>

                            <td>{{ ex_name(result.exam_name) }}</td>
                            <td>{{ result.year }}</td>
                            <td>

                            <!-- <button class="btn btn-success btn-sm" v-if="result.status=='Draft'" @click="publishNow(result.class,result.year,result.exam_name,'Published')">Publish Now</button> -->

                            <!-- <button class="btn btn-danger btn-sm"  v-if="result.status=='Published'"  @click="publishNow(result.class,result.year,result.exam_name,'Draft')">Draft Now</button> -->

                            <button class="btn btn-danger btn-sm"  @click="publishNow(result.class,result.year,result.exam_name,'Draft',result.class_group)">Calculate</button>

                            <router-link  class="btn btn-info btn-sm" :to="{ name: 'resultview', params: { school_id: school_id, student_class: result.class, group: result.class_group, religion: 'All', subject: 'All', examType: result.exam_name, date: result.year } }">View</router-link>

                            <a class="btn btn-info btn-sm" :href="'/dashboard/results/publish/'+school_id+'/'+result.class+'/'+result.class_group+'/'+result.exam_name+'/'+result.year">Publish Now</a>

                            <a class="btn btn-info btn-sm" :href="'/dashboard/results/promotion/'+school_id+'/'+result.class+'/'+result.class_group+'/'+result.exam_name+'/'+result.year">Promotion</a>



                    </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="card-footer">

        <Pagination :total-rows="TotalRows" route-name="results" :total-page="Totalpage" :route-params="RouteParams"></Pagination>

            </div>
        </div>




    </div>






	</div>
</template>

<script>
export default {
    created() {

    },

	data () {
		return {

			groups: {},
			exams: {},
			religions: {},
			subjects: {},
            preloader:false,
			results: {},
			form: {
                school_id:'',
                class:'',
                year:'',
                exam_name:'',
            },

			student_class:"",
            filterdata:{
                student_class:null,
                group:'All',
                subject:null,
                religion:'All',
                examType:null,
                date:null,
            },
            PerPageData: '20',
            TotalRows: '1',
            Totalpage: [],
            RouteParams: {},

		}
	},
    watch: {
        '$route': {
            handler(newValue, oldValue) {

                this.getAllResult('page');
            },
            deep: true
        }
    },
	methods: {
            filter(){
                if(this.$router.currentRoute.path==`/school/results/${this.school_id}/${this.filterdata.student_class}/${this.filterdata.group}/${this.filterdata.religion}/${this.filterdata.subject}/${this.filterdata.examType}/${this.filterdata.date}`){

                }else{

                  this.$router.push({name:'resultfilter', params: { school_id: this.school_id, student_class: this.filterdata.student_class, group: this.filterdata.group, religion: this.filterdata.religion, subject: this.subjectconverten(this.filterdata.subject), examType: this.exam_comvert(this.filterdata.examType), date: this.filterdata.date }})

                }

//  this.getdata();
            },


        callSubjects(){
            if(this.filterdata.student_class=='Nine' || this.filterdata.student_class=='Ten'){
            }else{
                this.filterdata.group = 'All'
            }
            this.subjects =  this.all_list('subjects',this.filterdata.student_class,this.filterdata.group);
        },


        callreligion(){
            if(this.filterdata.subject!='ধর্ম'){
                this.filterdata.religion = 'All'
            }
        },


        async getAllResult(type){
            if(type=='page')this.preloader=true
            var page = 1;
            if (this.$route.query.page) page = this.$route.query.page;

           var res =  await this.callApi('get',`/api/all/results/list?page=${page}`,[]);
            this.results = res.data.data
            this.TotalRows = `${res.data.total}`;
            this.PerPageData = `${res.data.per_page}`;
            if(res.data.links){
            this.Totalpage = res.data.links
        }


            this.preloader=false
        },

        async publishNow(className,year,exam_name,Resultstatus,class_group){
            this.preloader=true
            this.form['school_id'] = this.school_id;
            this.form['class'] = className;
            this.form['year'] = year;
            this.form['exam_name'] = exam_name;
            this.form['class_group'] = class_group;
            this.form['status'] = Resultstatus;

            var res = await this.callApi('post',`/api/results/publish`,this.form);
            if(Resultstatus=='Published'){

                Notification.customSuccess(`Class ${className} এর ফলাফল সফল ভাবে পাবলিশ হয়েছে`);
            }else{
                Notification.customSuccess(`Success`);

            }

            this.getAllResult();

        },


	},
	mounted(){


		this.groups =  this.all_list('groups');
		this.exams =  this.all_list('exams');
		this.religions =  this.all_list('religions');


		this.filterdata.date =  User.dateformat()[0];
		// this.subjects =  User.all_list('subjects','Six','All');

        this.getAllResult();






	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>
