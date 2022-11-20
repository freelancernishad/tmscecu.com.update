<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Onlineexam</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Onlineexam</li>
            </ul>
        </div>
        <!-- Breadcubs Area End Here -->
        <!-- Student Table Area Start Here -->
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <router-link class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                            v-if="$routerHistory.hasPrevious()" :to="{ path: $routerHistory.previous().path }">
                            GO BACK
                        </router-link>
                    </div>
                    <div class="dropdown">
                    </div>
                </div>
                <form class="row g-3" method="post" v-on:submit.prevent="formsubmit" enctype="multipart/form-data">


                    <div class="form-group col-md-6">
                                        <label>Class:</label>
                                        <select class="form-control" style="width: 100%;"  @change="callSubjects" v-model="form.class" required>
                                            <option value="">
                                                SELECT
                                            </option>
                                             <option v-for="classlist in classes[0]">{{ classlist }}</option>
                                        </select>
                    </div>


                    <div class="form-group col-md-6"  v-if="form.class=='Nine' || form.class=='Ten'" >
                                 <label>Group:</label>
                                    <select class='form-control' style='width: 100%;' v-model='form.group' @change="callSubjects" id='group' required>
                                    <option value=''>select</option>
                                    <option v-for="group in groups[0]">{{ group }}</option>


                                    </select>
                    </div>


                    <div class="form-group col-md-6">
                                <label>Subject:</label>
                                      <select  class='form-control' style='width: 100%;' v-model="form.subject" id='Subject' @change="callreligion" required >
                                      <option value=''>SELECT</option>
                                       <option v-for="subject in subjects[0]">{{ subject }}</option>
                                      </select>
                    </div>

 <div class="col-md-6">
                                      <div class='form-group' >
                                          <label>Year:</label>
                                      <select  class='form-control' style='width: 100%;' v-model="form.year" id='Subject' @change="questionbank"  required >
                                      <option value=''>SELECT</option>
                                       <option v-for="year in years[0]">{{ year }}</option>
                                      </select>
                              </div>
                              </div>

  <div class="form-group col-md-12">
                        <label for="">Title</label>
                        <input type="text" v-model="form.title" id="title" class="form-control"
                            placeholder="Enter Homework Title">
                    </div>



                    <div class="form-group col-md-6">
                        <label for="">Exam Start</label>
                        <input type="datetime-local" v-model="form.start_date" id="title" class="form-control"
                            placeholder="Enter Homework Title">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="">Exam end</label>
                        <input type="datetime-local" v-model="form.end_date" id="title" class="form-control"
                            placeholder="Enter Homework Title">
                    </div>


                    <div class="form-group col-md-12">
                        <label for="">Description</label>
                        <textarea v-model="form.description" class="form-control" id="description" cols="30"
                            rows="4"></textarea>
                    </div>



                    <div class="form-group col-md-12">
                        <label for="">Duration</label>
                        <input type="text" v-model="form.duration" id="title" class="form-control"
                            placeholder="Enter Homework Title">
                    </div>



                    <div class="form-group col-md-12">
                        <label for="">Total Mark</label>
                        <input type="text" v-model="form.totalmark" id="title" class="form-control"
                            placeholder="Enter Homework Title">
                    </div>




<div class="col-md-12">

    <table class="table">
        <thead>
            <tr>
            <th>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" @click="selectAll"
                        v-model="allSelected">
                    <label class="form-check-label">SL</label>
                </div>
            </th>
                <th>Question</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(questionbank,index) in questionbanks">
            <td>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" v-model="form.questions"
                        :value="questionbank.id">
                    <label class="form-check-label">{{ index+1 }}</label>
                </div>
            </td>

                <td>{{ questionbank.question }}</td>
            </tr>
        </tbody>
    </table>

</div>






                    <div class="col-12">
                        <button type="submit"
                            class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark px-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    created() {
       this.school_id = getschoolid
       this.form.school_id = getschoolid
        this.years=  User.yearslist();
    },
    data() {
        return {

          	classes: [],
              actioncheck:[],
              allSelected: false,
			groups: [],
			exams: [],
			religions: [],
			subjects: [],
            questionbanks: {},
            images: [],
            years: [],
            school_id: '',
            maxImage: 20,
            preloader: true,
            form: {
                id: '',
                school_id: null,
                year: null,
                class: null,
                group: null,
                subject: null,
                title: null,
                description: null,
                start_date: null,
                end_date: null,
                duration: null,
                questions: [],
            },
            filterdata:{
                student_class:null,
                group:'All',
                subject:null,
                religion:'All',
                examType:null,
                date:null,
            }
        }
    },
    methods: {



        selectAll: function () {
            this.form.questions = [];
            if (!this.allSelected) {
                this.questionbanks.forEach(student => {
                    //    console.log(student.id)
                    this.form.questions.push(student.id);
                })
            }
        },



        questionbank() {

            this.timeout = setTimeout(() => {
                axios.get(`/api/questionbank?filter[school_id]=${this.school_id}&filter[class]=${this.form.class}&filter[group]=${this.form.group}&filter[subject]=${this.form.subject}&filter[year]=${this.form.year}`)
                    .then(({ data }) => {
                        this.questionbanks = data.data;

                    })
                    .catch()
            }, 300);
        },


    callSubjects(){



            if(this.form.class=='Nine' || this.form.class=='Ten'){

            }else{
                this.form.group = 'All'
            }

            this.subjects =  User.all_list('subjects',this.form.class,this.form.group);
this.questionbank()

        },


        callreligion(){



            if(this.form.subject!='ধর্ম'){

                this.form.religion = 'All'
            }

this.questionbank()

        },

        onlineexamfun() {
            this.timeout = setTimeout(() => {
                axios.get(`/api/onlineexam/edit?filter[id]=${this.$route.params.id}`)
                    .then(({ data }) => {
                        this.form = data;
                        this.preloader = false;
                    })
                    .catch()
            }, 300);
        },



        formsubmit() {
            // this.preloader = true;
            axios.post(`/api/onlineexam/submit`, this.form)
                .then(({ data }) => {
                    if (data[0].message == 'validation error') {
                        this.errors = data[0].data
                        this.preloader = false;
                        Object.values(this.errors).forEach(error => {
                            Notification.validation(error[0]);
                        });
                        // Notification.validation(data[0].message);
                    }else{
                    this.$router.push({name: 'onlineexam'})
//
                        Notification.success();
                    }
                })
                .catch(() => {
                    // this.$router.push({name: 'supplier'})
                })
        },

    },
    mounted() {



        this.classes =  User.classlist();
		this.groups =  User.all_list('groups');
		this.exams =  User.all_list('exams');
		this.religions =  User.all_list('religions');

        if (this.$route.params.id) {
            this.onlineexamfun();
            setTimeout(() => {

            this.callSubjects();
            this.callreligion();
            }, 3000);

        }else{
            this.preloader = false;
        }


    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
