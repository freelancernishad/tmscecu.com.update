<template>
    <div>

        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>
<section class="inner-header divider layer-overlay overlay-theme-colored-7" >
<div class="container">
    <!-- Section Content -->
    <div class="section-content">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-theme-colored2 font-36"> অধ্যয়নরত শিক্ষার্থীর তালিকা</h1>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="">Home</a></li>
                    <li class="active">student_list</li>
                </ol>
            </div>
        </div>
    </div>
</div>
</section>


 <!-- Main Start -->
    <main class="container-fluid">
        <div class="row">
            <!-- Left Main -->
            <div class="col-lg-9 my-3">
            <div class="container">
<div class="row">
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <div class="form-group student_class">
                            <select v-model="student_class"  id="ContentPlaceHolder1_cmbClass" class="form-control">
                                <option selected="selected" value="">শ্রেণী নির্বাচন করুন</option>
                                <option v-for="classlist in classess">{{ classlist }}</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <div class="form-group student_class">
                            <button class="btn btn-info" @click="search">Search</button>
                        </div>
                    </div>
</div>



    <table class="table" style="margin: 30px 0 50px 0;">
<thead>
            <tr>
                <th class="columnStyleLeft" style="font-size: 10pt;">রোল</th>
                <th class="columnStyleRight" style="font-size: 10pt;">নাম </th>

                <th class="columnStyleRight" style="font-size: 10pt;">পিতার নাম</th>
                <th class="columnStyleRight" style="font-size: 10pt;">মাতার নাম</th>
                <th class="columnStyleRight" style="font-size: 10pt;">ঠিকানা </th>
            </tr>

</thead>
<tbody>


                <tr v-for="student in students.data">
                    <td class="columnStyleLeft" style="font-size: 10pt;">{{ student.StudentRoll }}</td>
                    <td class="columnStyleRight" style="font-size: 10pt;">{{ student.StudentName }}</td>
                    <td class="columnStyleRight" style="font-size: 10pt;">{{ student.StudentFatherName }} </td>
                    <td class="columnStyleRight" style="font-size: 10pt;">{{ student.StudentMotherName }}</td>
                    <td class="columnStyleRight" style="font-size: 10pt;">{{ student.StudentAddress }}</td>
                </tr>
</tbody>

        </table>

</div>
            </div>

            <side-bar class-name="col-md-3"></side-bar>


        </div>
    </main>
    <!-- Main End -->


    </div>
</template>

<script>


export default {

	created(){

  this.ASSETURL = ASSETURL

	},

	data () {
		return {
            students: {},
            ASSETURL: '',
            field:'id',
            sorttype:'',
            student_class:'',
            status:'Active',
            preloader: false,

		}
	},

	methods: {


search(){
     this.preloader = true;
    this.allstudents();
},

      allstudents(page) {
            clearTimeout(this.timeout);
            var url = '';
            if (typeof page === 'undefined') {
                page = 1;
            }

  url = `/api/students/list?page=${page}&filter[school_id]=${this.school_id}&filter[StudentStatus]=${this.status}&filter[StudentClass]=${this.student_class}`;
            this.timeout = setTimeout(() => {
                axios.get(url)
                    .then(({ data }) => {
                        this.students = data
                         this.preloader = false;
        if (this.$router.currentRoute.path === `/student_list/${this.student_class}`) {
            } else {
                this.$router.push({ name: 'frontstudent_listsearch', params: { classname: this.student_class } });
            }


                    })
                    .catch()
            }, 300);
        },




	},
	mounted(){

if(this.$route.params.classname){
    this.student_class = this.$route.params.classname;
    this.allstudents();
}

	}
}
</script>

<style>



.mini-profile-widget .image-container .avatar {
    width: 180px;
    height: 180px;
    display: block;
    margin: 0 auto;
    border-radius: 50%;
    background: white;
    padding: 4px;
    border: 1px solid #dddddd;
}


</style>
