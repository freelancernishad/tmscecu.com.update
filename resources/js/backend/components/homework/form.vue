<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Homework</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Homework</li>
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


                    <div class="form-group col-md-12">
                        <label for="">Title</label>
                        <input type="text" v-model="form.title" id="title" class="form-control"
                            placeholder="Enter Homework Title">
                    </div>



                    <div class="form-group col-md-6">
                        <label for="">Home work Start</label>
                        <input type="datetime-local" v-model="form.startdate" id="title" class="form-control"
                            placeholder="Enter Homework Title">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="">Home work end</label>
                        <input type="datetime-local" v-model="form.enddate" id="title" class="form-control"
                            placeholder="Enter Homework Title">
                    </div>


                    <div class="form-group col-md-12">
                        <label for="">Description</label>
                        <textarea v-model="form.description" class="form-control" id="description" cols="30"
                            rows="4"></textarea>
                    </div>


                    <div class="form-group col-md-12">
                        <label for="">Status</label>
                        <select v-model="form.status" class="form-control">
                            <option value="">Select</option>
                            <option >Draft</option>
                            <option >Published</option>
                        </select>
                    </div>


                    <div class="form-group col-md-12">
                        <label for="">Files</label>
                        <vue-upload-multiple-image @upload-success="uploadImageSuccess" @before-remove="beforeRemove"
                            @edit-image="editImage" :data-images="form.file" dragText="Drag images (multiple)"
                            browseText="(or) Select" primaryText="Default" markIsPrimaryText="Set as default"
                            popupText="This image will be displayed as default" dropText="Drop your files here..."
                            :maxImage="maxImage" accept="image/gif,image/jpeg,image/png,image/bmp,image/jpg,application/pdf,.csv,.docx,.doc, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></vue-upload-multiple-image>
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
    },
    data() {
        return {
          	classes: [],
			groups: [],
			exams: [],
			religions: [],
			subjects: [],
            homeworks: {},
            images: [],
            school_id: '',
            maxImage: 20,
            preloader: true,
            form: {
                id: '',
                school_id: null,
                class: null,
                group: null,
                subject: null,
                title: null,
                description: null,
                startdate: null,
                enddate: null,
                status: 'Draft',
                file: []





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
        uploadImageSuccess(formData, index, fileList) {
              console.log('data', formData, index, fileList)
            console.log(formData)
            this.form.file = fileList
        },
        beforeRemove(index, done, fileList) {
            //   console.log('index', index, fileList)
            var r = confirm("remove image")
            if (r == true) {
                done()
                this.form.file = fileList
            } else {
            }
        },
        editImage(formData, index, fileList) {
            //   console.log('edit data', formData, index, fileList)
            this.form.file = fileList
        },








    callSubjects(){



            if(this.form.class=='Nine' || this.form.class=='Ten'){

            }else{
                this.form.group = 'All'
            }

            this.subjects =  User.all_list('subjects',this.form.class,this.form.group);

        },


        callreligion(){



            if(this.form.subject!='ধর্ম'){

                this.form.religion = 'All'
            }



        },

        homeworkfun() {
            this.timeout = setTimeout(() => {
                axios.get(`/api/homework/edit?filter[id]=${this.$route.params.id}`)
                    .then(({ data }) => {
                        this.form = data;
                        this.preloader = false;
                    })
                    .catch()
            }, 300);
        },



        formsubmit() {
            // this.preloader = true;
            axios.post(`/api/homework/submit`, this.form)
                .then(({ data }) => {
                    if (data[0].message == 'validation error') {
                        this.errors = data[0].data
                        this.preloader = false;
                        Object.values(this.errors).forEach(error => {
                            Notification.validation(error[0]);
                        });
                        // Notification.validation(data[0].message);
                    }else{
                    this.$router.push({name: 'homeworks'})
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
            this.homeworkfun();
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
