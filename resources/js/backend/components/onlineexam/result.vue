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
                    </div>
                </div>


    <div class="row">


       <div class="col-md-12">



            <h3>SCORE :  {{ form.currectans }}/{{ form.totalmark }} </h3> 


             <br/>
        <div class="row" v-for="(question,index) in onlineexams.questions">
            <div class="col-md-12">
              <b> {{ index+1 }}. {{ question.question }}</b>
            </div>
            <div class="col-md-6" v-for="(ans,key) in JSON.parse(question.answers)">
               <input type="radio" :class="{ 'Present': question.currect_ans==form.answeres[question.id] }"  :id="index+key" v-model="form.answeres[question.id]" :value="ans" :disabled="disabled"> <label style="padding: 10px;" class="Present" :for="index+key">{{ ans }}</label>
            </div>
      <div class="col-md-12" v-if="question.currect_ans!=form.answeres[question.id]">
             <b>Currect Answere : </b> {{ question.currect_ans }}
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
this.homeid = this.$route.params.exam_id;
  this.school_id = getschoolid
  this.form.school_id = getschoolid
   this.form.student_id = this.$localStorage.getItem('teacherOrstudent');
  this.onlineexam_id = this.$route.params.exam_id;
  this.form.exam_id = this.$route.params.exam_id;
       this.onlineexamfun();



    },
    data() {
        return {
            onlineexams: {},
            preloader: true,
            ASSETURL: '',
            homeid:'',
            school_id:'',
            onlineexam_id:'',
            onlineexamstatus:'',
            onlineexamTimestatus:'',
            countdowndate:'2050-12-25 00:00:00',
            count:0,
            disabled:true,
            formsumited:'',
            form:{

                'final':'',
                'school_id':null,
                'student_id':null,
                'exam_id':null,
                'start':null,
                'end':null,
                'totalmark':null,
                'currectans':null,
                'answeres':{},
            }

        }
    },
    methods: {










        dataformater(date){
           return  User.dateformat(date)[7];
        },

        onlineexamfun(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

 this.timeout = setTimeout( ()=> {
            axios.get(`/api/onlineexam/view?page=${page}&filter[id]=${this.$route.params.exam_id}`)
                .then(({ data }) => {

                    this.onlineexams = data;
                    this.preloader = false;
                })
                .catch()
                  }, 300);
        },



       examcheck(){


            axios.get(`/api/answeres?filter[school_id]=${this.form.school_id}&filter[student_id]=${this.form.student_id}&filter[exam_id]=${this.form.exam_id}`)
                .then(({ data }) => {
                    this.count= data.count;
console.log(data)
                       this.form = data


                })
                .catch()

        },







    },
    mounted() {



  setTimeout(() => {
       this.examcheck();
  }, 3000);



//   setTimeout(() => {
//       if(this.count==0){this.examStart('');}
//   }, 3000);


    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
