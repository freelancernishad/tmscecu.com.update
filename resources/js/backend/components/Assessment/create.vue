<template>
    <div>
        <loader v-if="preloader == true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>





          <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>মূল্যায়ন</h3>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>মূল্যায়ন</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->



    <router-link style="float: right;padding: 0 31px;" :to="{ name: 'logout' }"><i class="flaticon-turn-off"></i>Logout</router-link>

      <form @submit.prevent="submitAssessment">



        <div class="card">
          <div class="card-body">
              <div class="row">


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Report Name</label>
                        <select v-model="assessmentData.report_name" class="form-control" required>
                          <option value="">Select</option>
                          <option value="continuous_assessment">ধারাবাহিক মূল্যায়ন</option>
                        </select>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" v-model="assessmentData.date" class="form-control" required>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Class</label>

                        <select class="form-control" style="width: 100%;"  v-model="assessmentData.class" required>
                            <option value="">
                                SELECT
                            </option>
                                <option v-for="classlist in classess">{{ classlist }}</option>
                        </select>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Subject</label>

                        <select class="form-control" style="width: 100%;"  v-model="assessmentData.subject" required>
                            <option value="">
                                SELECT
                            </option>
                            <option value="Bangla">বাংলা</option>
                            <option value="English">ইংরেজি</option>
                            <option value="Math">গনিত</option>
                            <option value="Science">বিজ্ঞান</option>
                            <option value="History and Social Sciences">ইতিহাস ও সমাজ বিজ্ঞান</option>
                            <option value="Art and Culture">শিল্প ও সংস্কৃতি</option>
                            <option value="Digital technology">ডিজিটাল প্রযুক্তি</option>
                            <option value="Health protection">স্বাস্থ্য সুরক্ষা</option>
                            <option value="Life and livelihood">জীবন ও জীবিকা</option>
                            <option value="religion">ধর্ম</option>
                        </select>



                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Type</label>
                        <select class="form-control" style="width: 100%;"  v-model="assessmentData.type" required>
                            <option value="">
                                SELECT
                            </option>
                            <option value="PI">PI</option>
                            <option value="BI1">BI1</option>
                            <option value="BI2">BI2</option>
                            <option value="BI3">BI3</option>
                            <option value="BI4">BI4</option>
                            <option value="BI5">BI5</option>
                            <option value="BI6">BI6</option>
                            <option value="BI7">BI7</option>
                            <option value="BI8">BI8</option>
                            <option value="BI9">BI9</option>
                            <option value="BI10">BI10</option>
                        </select>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Chapter Name</label>
                        <input type="text" v-model="assessmentData.chapter_name" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Teacher Name</label>
                        <input type="text" v-model="assessmentData.teacher_name" class="form-control" required>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Note</label>
                        <input type="text" v-model="assessmentData.note" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="button" @click="getStudents" class="btn btn-info mt-3 mb-5" style="font-size: 20px;">তালিকা খুজুন</button>
                </div>


              </div>
          </div>
        </div>





        <div class="container">








        <table border="1" width="100%">
  <thead>
    <tr>
      <th width="10%" class="text-center">Roll</th>
      <th  width="40%" class="text-center">Name</th>
      <th width="50%"  class="text-center">Score</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(student, index) in students" :key="student.id">
      <td class="text-center">{{ student.StudentRoll }}</td>
      <td class="text-center">{{ student.StudentName }}</td>
      <td class="text-center">
        <input class="d-none" type="radio" v-model="assessmentData.studentData[index].score" value="1" :id="'PI1_' + student.id" />
        <label class="checkboxlabel" :for="'PI1_' + student.id"><i class="fa-regular fa-square"></i></label>
        <input class="d-none" type="radio" v-model="assessmentData.studentData[index].score" value="2" :id="'PI2_' + student.id" />
        <label class="checkboxlabel" :for="'PI2_' + student.id"><i class="fa-regular fa-circle"></i></label>
        <input class="d-none" type="radio" v-model="assessmentData.studentData[index].score" value="3" :id="'PI3_' + student.id" />
        <label class="checkboxlabel" :for="'PI3_' + student.id"><i class="fa-regular fa-triangle"></i></label>
      </td>




    </tr>
  </tbody>
</table>

<div class="text-center">

    <button type="submit" class="btn btn-success mt-3 mb-5" style="font-size: 20px;">Create Assessment</button>
</div>

</div>





      </form>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        preloader:false,
        students: [],
        assessmentData: {
          report_name: 'continuous_assessment',
          date: '',
          class: '',
          subject: '',
          type: '',
          chapter_name: '',
          teacher_name: '',
          note: '',
          studentData: [], // Array to hold student-specific data
        },
      };
    },
    methods: {





        async submitAssessment() {
            this.preloader = true
            const response = await  this.callApi('post','/api/assessments', this.assessmentData);
            // console.log(response)
            if(response.status==201){
                Notification.customSuccess('Success');
            }else if(response.status==400){
                Notification.customError('Bad Request');
            }
            this.preloader = false
        },


      async getStudents(){
        this.preloader = true
        var res = await this.callApi('get',`/api/assessment/students?class=${this.assessmentData.class}`,[]);
        this.students = res.data;
        this.assessmentData.studentData = this.students.map((student) => ({
          student_id: student.id,
          score: null,
        }));
        this.preloader = false
      }



    },
    mounted() {
        // this.getStudents();
      // Fetch the list of students from the Laravel API
    },
  };
  </script>

<style scoped>
  label.checkboxlabel {
      font-size: 15px;
      padding: 0px 6px;
      cursor: pointer;
  }


  input[type=radio]:checked+label.checkboxlabel {
        background: #120220;
        padding: 0px 6px;
        color: #fff;
        font-size: 15px;
    }

    td label i {
        font-size: 25px;
    }
</style>
