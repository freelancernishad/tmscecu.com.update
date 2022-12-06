<template>
    <div>
    <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2"
        bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <router-link style="float: right;padding: 0 31px;" :to="{ name: 'logout' }"><i class="flaticon-turn-off"></i>Logout</router-link>
    <div class="container m-5">


            <form @submit.stop.prevent="PaymentSearch" class="other">


<div class="form-group">
    <label>শ্রেণি</label>
    <select class="form-control" style="width: 100%;" v-model="data.student_class"
        required>
        <option value="">
            SELECT
        </option>
        <option v-for="(classlist, index) in classess" :key="'class' + index">{{ classlist
        }}</option>
    </select>
</div>


<div class='form-group'
    v-if="data.student_class == 'Nine' || data.student_class == 'Ten'">
    <label>গ্রুপ</label>
    <select class='form-control' style='width: 100%;' v-model='data.StudentGroup'
        id='group' required>
        <option value=''>select</option>
        <option v-for="(group, ind) in groups" :key="'group' + ind">{{ group }}</option>
    </select>
</div>
<div class="form-group">
    <label for="">রোল</label>
    <input type="tel" v-model="data.StudentRoll" class="form-control" required>
</div>
<button type="submit" class="btn btn-info p-3" style="font-size: 20px;" >খুঁজুন</button>
</form>






      <div class="upload-example" style="width:300px;margin:0 auto"  v-if="searched == 1">

        <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                       <b> Admission Id:</b> {{  student.AdmissionID }}
                                    </div>
                                    <div class="col-md-6">
                                        <b>Student Id:</b> {{  student.StudentID }}
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <b>Name:</b> {{  student.StudentName }}
                                    </div>

                                    <div class="col-md-6" v-if="student.StudentClass=='Nine' || student.StudentClass=='Ten'">
                                        <b>Group:</b> {{  student.StudentGroup }}
                                    </div>
                                    <div class="col-md-6" v-else>
                                        <b>Group:</b> N/A
                                    </div>

                                    <hr>
                                    <div class="col-md-6">
                                        <b>Class:</b> {{  student.StudentClass }}
                                    </div>
                                    <div class="col-md-6">
                                        <b>Roll:</b> {{  student.StudentRoll }}
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <b>Father Name:</b> {{  student.StudentFatherNameBn }}
                                    </div>
                                    <div class="col-md-6">
                                        <b>Mother Name:</b> {{  student.StudentMotherNameBn }}
                                    </div>
                                    <hr>

                                </div>
                            </div>








        <Cropper
          ref="cropper"
          class="upload-example-cropper"
          :src="image"
          :stencil-props="{
                handlers: {},
                movable: false,
                scalable: false,
            }"
          :stencil-size="{
                width: 300,
                height: 300
            }"
            image-restriction="stencil"
            defaultBoundaries="fit"
          />
          <!-- :stencil-component="$options.components.Stencil" -->
        <div class="button-wrapper">
          <span class="button" @click="$refs.file.click()">
            <input
              type="file"
              ref="file"
              @change="uploadImage($event)"
              accept="image/*"
            />
            Upload image
          </span>
          <span class="button" @click="cropImage">Update</span>
        </div>
      </div>

      <h2 v-if="searched==2" style="color:red;text-align:center;font-size: 33px;"> No Data Found! </h2>




      </div>
      </div>

  </template>

  <script>
  import { Cropper } from "vue-advanced-cropper";
  import "vue-advanced-cropper/dist/style.css";

//   import Stencil from "./Stencil";

  export default {
    data() {
      return {
        data: {
                type: 'other',
                adminssionId: '',
                StudentID: '',
                month: '',
                paymenttype: '',
                student_class: '',
                StudentGroup: '',
                StudentRoll: '',
            },

        form:{
            id:1,
            StudentPicture:'',
        },
        image:"",
        preloader:false,
        student: {},
            paymentStatus: 'Paid',
            paymentUrl: '#',
            searched: 0,
      };
    },
    components: {
      Cropper,
    //   Stencil,
    },
    methods: {

        async PaymentSearch() {
            this.preloader =true
            var res = await this.callApi('post', `/api/payment/data/search`, this.data);
            if (res.data.student) {
                this.student = res.data.student
                this.form.id =  res.data.student.id
                this.image =  this.$asseturl+res.data.student.StudentPicture
                this.searched = res.data.searched
            } else {
                this.student = {}
                this.searched = 2
            }
            this.paymentUrl = res.data.paymentUrl
            this.paymentStatus = res.data.paymentStatus
            this.preloader =false
            // var res2 = await this.callApi('get',`/api/student/applicant/copy/${res.data.student.AdmissionID}`,[]);
        },





     async cropImage() {
        this.preloader =true
        const result = this.$refs.cropper.getResult();
        console.log(result)
        this.form.StudentPicture =result.canvas.toDataURL("image/jpeg")
         var res = await this.callApi('post','/api/students/image/upload',this.form);
         this.searched = 0
         Notification.success();
        // const newTab = window.open();
        // newTab.document.body.innerHTML = `<img src="${result.canvas.toDataURL(
        //   "image/jpeg"
        // )}"></img>`;
        this.preloader =false


      },
      uploadImage(event) {
        // Reference to the DOM input element
        var input = event.target;
        // Ensure that you have a file before attempting to read it
        if (input.files && input.files[0]) {
          // create a new FileReader to read this image and convert to base64 format
          var reader = new FileReader();
          // Define a callback function to run, when FileReader finishes its job
          reader.onload = (e) => {
            // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
            // Read image as base64 and set to imageData
            this.image = e.target.result;
          };
          // Start the reader job - read file as a data url (base64 format)
          reader.readAsDataURL(input.files[0]);
        }
      },
    },
    mounted() {
        this.all_list('groups');
    },
  };
  </script>

  <style>
  .upload-example-cropper {
    border: solid 1px #EEE;
    min-height: 300px;
    width: 100%;
  }

  .button-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 17px;
  }

  .button {
    color: white;
    font-size: 16px;
    padding: 10px 20px;
    background: #3fb37f;
    cursor: pointer;
    transition: background 0.5s;
    font-family: Open Sans, Arial;
    margin: 0 10px;
  }

  .button:hover {
    background: #38d890;
  }

  .button input {
    display: none;
  }
  </style>
