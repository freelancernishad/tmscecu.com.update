<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <div class="breadcrumbs-area">
            <h3>Onlineexam</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Onlineexam</li>
            </ul>
        </div>
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <router-link  class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                            v-if="$routerHistory.hasPrevious()" :to="{ path: $routerHistory.previous().path }">
                            GO BACK
                        </router-link>
                    </div>
                    <div class="dropdown">

                        <router-link  class="btn-fill-md text-light bg-dark-pastel-green mt-3 float-right" v-show="($localStorage.getItem('role')=='student' || $localStorage.getItem('role')=='parent') && count==0 && examtime==true ? true : false " style="display:none" :to="{ name: 'onlineexamstart',params:{id:onlineexam_id} }">
                            Start Exam
                        </router-link>


                        <span  class="btn-fill-md radius-4 text-light bg-orange-red mb-3" v-show="($localStorage.getItem('role')=='student' || $localStorage.getItem('role')=='parent') && count==0 && examtime==false ? true : false " style="display:none" >
                            Exam date is expired!
                        </span>


                        <router-link  class="btn-fill-md text-light bg-dark-pastel-green mt-3 float-right" v-show="($localStorage.getItem('role')=='student' || $localStorage.getItem('role')=='parent') && count>0 ? true : false " style="display:none" :to="{ name: 'onlineexamresult',params:{school_id:school_id,student_id:student_id,exam_id:onlineexam_id} }">
                            View Result
                        </router-link>



                    </div>
                </div>


    <div class="row">

        <div class="col-md-12">
            <b>Class : </b> <span>{{ onlineexams.class }}</span>
        </div>

        <div class="col-md-12">
            <b>Group : </b> <span>{{ onlineexams.group }}</span>
        </div>

        <div class="col-md-12">
            <b>Subject : </b> <span>{{ onlineexams.subject }}</span>
        </div>

        <div class="col-md-12">
            <b>Title : </b> <span>{{ onlineexams.title }}</span>
        </div>

       <div class="col-md-12">
            <b>Description : </b> <span>{{ onlineexams.description }}</span>
        </div>

       <div class="col-md-12">
            <b>Onlineexam Start : </b> <span>{{ dataformater(onlineexams.start_date) }}</span>
        </div>


       <div class="col-md-12">
            <b>Onlineexam End : </b> <span>{{ dataformater(onlineexams.end_date) }}</span>
        </div>


       <div class="col-md-12">
            <b>Onlineexam Duretion : </b> <span>{{ onlineexams.duration }}</span>
        </div>


       <div class="col-md-12" v-show="$localStorage.getItem('role')=='admin' || $localStorage.getItem('role')=='teacher' ? true : false " style="display:none">
            <b>Questions : </b> <br>

    <br/>
             <br/>
        <div class="row" v-for="(question,index) in onlineexams.questions">
            <div class="col-md-12">
              <b> {{ index+1 }}. {{ question.question }}</b>
            </div>
            <div class="col-md-6" v-for="(ans,key) in JSON.parse(question.answers)">
                {{ key+') '+ans }}
            </div>
            <div class="col-md-12">
                Currect Answer : {{ question.currect_ans }}
            </div>
             <br/>
             <br/>
        </div>



        </div>




    </div>




            </div>
        </div>
    </div>
</template>
<script>
export default {
    created() {
this.ASSETURL = ASSETURL
this.homeid = this.$route.params.id;
  this.school_id = getschoolid
   this.student_id = this.$localStorage.getItem('teacherOrstudent');
  this.onlineexam_id = this.$route.params.id;
    },
    data() {
        return {
            onlineexams: {},
            preloader: true,
            ASSETURL: '',
            homeid:'',
            school_id:'',
            student_id:'',
            onlineexam_id:'',
            count:0,
            examtime:true,
            onlineexamstatus:'',
            onlineexamTimestatus:'',

        }
    },
    methods: {
        dataformater(date){
           return  User.dateformat(date)[6];
        },
        dataformater2(date){
           return  User.dateformat(date)[7];
        },
        onlineexamfun(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

 this.timeout = setTimeout( ()=> {
            axios.get(`/api/onlineexam/view?page=${page}&filter[id]=${this.$route.params.id}`)
                .then(({ data }) => {

// console.log(data.end_date)


                    var datedefarent = data.end_date>this.dataformater2(new Date())
                    if(datedefarent==false){
                        this.examtime = false
                    }else{
                        this.examtime = true
                    }
                    this.onlineexams = data;
                    this.preloader = false;
                })
                .catch()
                  }, 300);
        },






     examcheck(){


            axios.get(`/api/answeres?filter[school_id]=${this.school_id}&filter[student_id]=${this.student_id}&filter[exam_id]=${this.onlineexam_id}`)
                .then(({ data }) => {
                    this.count= data.count;
                    // console.log(data)
                })
                .catch()

        },




    },
    mounted() {
            this.onlineexamfun();
            this.examcheck();



    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
