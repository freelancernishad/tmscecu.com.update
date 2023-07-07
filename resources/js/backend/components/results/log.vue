<template>
	<div>
        <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
<div class="breadcrumbs-area">
        <h3>Result Log</h3>
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>Result Log</li>
        </ul>
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
                            <th>বিষয়</th>
                            <th>সাল</th>
                            <th>তারিখ</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(result,index) in results" :key="index">
                            <td>{{ index+pageNO  }}</td>
                            <td>{{ result.class }}</td>

                            <td v-if="result.class=='Nine' || result.class=='Ten'">{{ result.group, }}</td>
                            <td v-else >N/A</td>

                            <td>{{ ex_name(result.examName) }}</td>
                            <td>{{ result.subject }}</td>
                            <td>{{ result.year }}</td>
                            <td>{{ dateformatGlobal(result.created_at)[3] }}</td>
                            <td>

                            <!-- <button class="btn btn-success btn-sm" v-if="result.status=='Draft'" @click="publishNow(result.class,result.year,result.exam_name,'Published')">Publish Now</button> -->

                            <!-- <button class="btn btn-danger btn-sm"  v-if="result.status=='Published'"  @click="publishNow(result.class,result.year,result.exam_name,'Draft')">Draft Now</button> -->

                            <button class="btn btn-danger btn-sm" v-if="result.status=='1'"  @click="EditMode(result.id)">Enable Edit</button>
                            <button class="btn btn-success disabled btn-sm" v-else  >Edit Enabled</button>
                            <a :href="'/download/mark?class='+result.class+'&year='+result.year+'&exam_name='+result.examName+'&subject='+result.subject+'&group='+result.group+'&religion='+result.StudentReligion" target="_blank" class="btn btn-info">View</a>





                    </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="card-footer">

        <Pagination :total-rows="TotalRows" route-name="resultlog" :total-page="Totalpage" :route-params="RouteParams"></Pagination>

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
            sentdata:{},
            PerPageData: '20',
            TotalRows: '1',
            Totalpage: [],
            RouteParams: {},
            pageNO: 1,

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


        async EditMode(id){
            this.sentdata['id'] = id;
            var res = await this.callApi('post',`/api/result/edit/mode`,this.sentdata);
            Notification.success();
            this.getAllResult();
        },

        async getAllResult(type){
            if(type=='page')this.preloader=true
            var page = 1;
            if (this.$route.query.page) page = this.$route.query.page;

           var res =  await this.callApi('get',`/api/result/log?page=${page}`,[]);
            this.results = res.data.data
            this.TotalRows = `${res.data.total}`;
            this.PerPageData = `${res.data.per_page}`;
            if(res.data.links){
            this.Totalpage = res.data.links
            }


            if(page==1){
                this.pageNO = 1;
            }else{
                this.pageNO = (page-1)*this.PerPageData+1;
            }


            this.preloader=false
        },



	},
	mounted(){
        this.getAllResult();

	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}
</style>





