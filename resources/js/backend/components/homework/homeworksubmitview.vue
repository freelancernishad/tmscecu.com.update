<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <div class="breadcrumbs-area">
            <h3>Homework</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Homework</li>
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


    <div class="row" v-for="homework in homeworks.data">


       <div class="col-md-12">
            <b>Name : </b> <span>{{ homework.student_name }}</span>
        </div>


       <div class="col-md-12">
            <b>Class : </b> <span>{{ homework.class }}</span>
        </div>



       <div class="col-md-12" v-if="homework.group!='All'">
            <b>Group : </b> <span>{{ homework.group }}</span>
        </div>



       <div class="col-md-12">
            <b>Subject : </b> <span>{{ homework.subject }}</span>
        </div>



       <div class="col-md-12">
            <b>Homework Start : </b> <span>{{ dataformater(homework.startdate) }}</span>
        </div>


       <div class="col-md-12">
            <b>Homework End : </b> <span>{{ dataformater(homework.enddate) }}</span>
        </div>


       <div class="col-md-12">
            <b>Homework Submited : </b> <span>{{ dataformater(homework.created_at) }}</span>
        </div>


       <div class="col-md-12">
            <b>Description : </b> <span>{{ homework.description }}</span>
        </div>



       <div class="col-md-12">
            <b>Files : </b>
        </div>



      <div class="col-md-3" v-for="(img,index) in JSON.parse(homework.files)"  >

 <a v-if="img.split('.').pop()=='jpeg' || img.split('.').pop()=='jpg' || img.split('.').pop()=='png' || img.split('.').pop()=='gif'" :href="ASSETURL+img">
     <div class="card">
          <div class="card-body">
            <img  width="100%" :src="ASSETURL+img" alt="">

                        </div>
      </div>
</a>

            <a v-if="img.split('.').pop()=='pdf'" :href="ASSETURL+img">
                <div class="card">
          <div class="card-body">
            <img  width="100%" src="https://play-lh.googleusercontent.com/9XKD5S7rwQ6FiPXSyp9SzLXfIue88ntf9sJ9K250IuHTL7pmn2-ZB0sngAX4A2Bw4w" alt="">
                      </div>
      </div>

 </a>
            <a v-if="img.split('.').pop()=='xlsx' || img.split('.').pop()=='csv'" :href="ASSETURL+img">
                <div class="card">
          <div class="card-body">
            <img  width="100%" src="https://cdn-icons-png.flaticon.com/512/4911/4911248.png" alt="">
                      </div>
      </div>

        </a>
            <a v-if="img.split('.').pop()=='docx' || img.split('.').pop()=='doc'" :href="ASSETURL+img">
                <div class="card">
          <div class="card-body">
            <img  width="100%" src="https://www.computerhope.com/jargon/d/doc.png" alt="">
                      </div>
      </div>

        </a>



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
  this.homework_id = this.$route.params.homework_id;
    },
    data() {
        return {
            homeworks: {},
            preloader: true,
            ASSETURL: '',
            homeid:'',
            school_id:'',
            student_id:'',
            homework_id:'',
            homeworkstatus:'',

        }
    },
    methods: {


        dataformater(date){
           return  User.dateformat(date)[6];
        },

        checksubmithomework(page) {
       if (typeof page === 'undefined') {
                page = 1;
            }


            axios.get(`/api/student/homework/submit/check?page=${page}&filter[school_id]=${this.school_id}&filter[student_id]=${this.student_id}&filter[homework_id]=${this.homework_id}`)
                .then(({ data }) => {

this.homeworks = data
this.preloader = false
                })
                .catch()

        },





    },
    mounted() {

            this.checksubmithomework();

    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
