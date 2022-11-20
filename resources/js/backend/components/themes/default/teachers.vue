<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>

<section class="inner-header divider layer-overlay overlay-theme-colored-7" >
<div class="container">
    <!-- Section Content -->
    <div class="section-content">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-theme-colored2 font-36">কর্মরত শিক্ষক-শিক্ষিকা</h1>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="">Home</a></li>
                    <li class="active">Teachers</li>
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
              <div class="container bootdey">
                    <div class="row">


                        <div class="col-12 col-sm-6 col-md-4 mt-3" v-for="staff in staffs.data">
                        <div class="card">
                            <div class="card-body">
                            <div class="well well-white mini-profile-widget">
                                <div class="image-container">
                                    <img :src="ASSETURL+staff.ProfilePicture" class="avatar img-responsive" width="100%" alt="avatar">
                                </div>
                                    <div class="details">
                                        <h5>{{ staff.TeacherName }}</h5>
                                        <hr>
                                        <div>মূলপদ : {{ staff.TeacherPosition }} </div>
                                        <div>পদবী : {{ staff.TeacherQualification }}</div>
                                        <div>ঠিকানা : {{ staff.TeacherAddress }}</div>
                                        <div>মোবাইল : {{ staff.TeacherPhoneNumber }}</div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>


                    </div>
                </div>
            </div>

    <rightsidebar/>


        </div>
    </main>
    <!-- Main End -->


    </div>
</template>

<script>


export default {

	created(){
  this.school_id = getschoolid
  this.ASSETURL = ASSETURL
	},

	data () {
		return {
            staffs: {},
            school_id:null,
            ASSETURL: '',
            searchtype: '',
            field: 'id',
            sorttype: '',
            preloader: true,

		}
	},

	methods: {




        allstaffs(page) {
              this.looding = true
            clearTimeout(this.timeout);
            var url = '';
            var sort = '';
            if (this.field != '') {
                sort = `sort=${this.sorttype}${this.field}`;
            }
            if (this.searchtype == '') {
                url = `/api/staffs/list?page=${page}&${sort}&filter[school_id]=${this.school_id}`;
            }else if (this.searchtype == 'filtername') {
                url = `/api/staffs/list?page=${page}&filter[TeacherName]=${this.name}&${sort}&filter[school_id]=${this.school_id}`;

            }
            if (typeof page === 'undefined') {
                page = 1;
            }
            this.timeout = setTimeout(() => {

                axios.get(url)
                    .then(({ data }) => {
                        this.staffs = data
                         this.preloader = false;
                    })
                    .catch()
            }, 300);
        },






	},
	mounted(){

this.allstaffs()

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
