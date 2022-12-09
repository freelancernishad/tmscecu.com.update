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
                    <h1 class="text-theme-colored2 font-36">কর্মরত শিক্ষক-কর্মচারী</h1>
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





                        <div class="col-12 col-sm-6 col-md-4 mt-3"  v-if="staff.TeacherPosition=='Head Master'"  v-for="staff in staffs.data">


                            <div class="card">
                                <div class="card-body">
                                <div class="well well-white mini-profile-widget">
                                    <div class="image-container">
                                        <img :src="$asseturl+staff.ProfilePicture" class="avatar img-responsive" width="100%" alt="avatar">
                                    </div>
                                        <div class="details">
                                            <h5>{{ staff.TeacherName }}</h5>
                                            <hr>
                                            <div>পদবী : {{ staff.TeacherPosition }} </div>
                                            <div>শিক্ষাগত যোগ্যতা : {{ staff.TeacherQualification }}</div>
                                            <div>ঠিকানা : {{ staff.TeacherAddress }}</div>
                                            <div>মোবাইল : {{ staff.TeacherPhoneNumber }}</div>
                                            <div>ইমেইল : <a :href="'mailto:'+staff.TeacherEmail">{{ staff.TeacherEmail }}</a></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-12 col-sm-6 col-md-4 mt-3"  v-if="staff.TeacherPosition=='Assistent Head Master'"  v-for="staff in staffs.data">


                            <div class="card">
                                <div class="card-body">
                                <div class="well well-white mini-profile-widget">
                                    <div class="image-container">
                                        <img :src="$asseturl+staff.ProfilePicture" class="avatar img-responsive" width="100%" alt="avatar">
                                    </div>
                                        <div class="details">
                                            <h5>{{ staff.TeacherName }}</h5>
                                            <hr>
                                            <div>পদবী : {{ staff.TeacherPosition }} </div>
                                            <div>শিক্ষাগত যোগ্যতা : {{ staff.TeacherQualification }}</div>
                                            <div>ঠিকানা : {{ staff.TeacherAddress }}</div>
                                            <div>মোবাইল : {{ staff.TeacherPhoneNumber }}</div>
                                            <div>ইমেইল : <a :href="'mailto:'+staff.TeacherEmail">{{ staff.TeacherEmail }}</a></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-sm-6 col-md-4 mt-3"  v-if="staff.TeacherPosition==='Assistent Teacher'"  v-for="staff in staffs.data">


                            <div class="card">
                                <div class="card-body">
                                <div class="well well-white mini-profile-widget">
                                    <div class="image-container">
                                        <img :src="$asseturl+staff.ProfilePicture" class="avatar img-responsive" width="100%" alt="avatar">
                                    </div>
                                        <div class="details">
                                            <h5>{{ staff.TeacherName }}</h5>
                                            <hr>
                                            <div>পদবী : {{ staff.TeacherPosition }} </div>
                                            <div>শিক্ষাগত যোগ্যতা : {{ staff.TeacherQualification }}</div>
                                            <div>ঠিকানা : {{ staff.TeacherAddress }}</div>
                                            <div>মোবাইল : {{ staff.TeacherPhoneNumber }}</div>
                                            <div>ইমেইল : <a :href="'mailto:'+staff.TeacherEmail">{{ staff.TeacherEmail }}</a></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-sm-6 col-md-4 mt-3"  v-if="staff.TeacherPosition==='Office Assistent Cum-Accountent'"  v-for="staff in staffs.data">


                            <div class="card">
                                <div class="card-body">
                                <div class="well well-white mini-profile-widget">
                                    <div class="image-container">
                                        <img :src="$asseturl+staff.ProfilePicture" class="avatar img-responsive" width="100%" alt="avatar">
                                    </div>
                                        <div class="details">
                                            <h5>{{ staff.TeacherName }}</h5>
                                            <hr>
                                            <div>পদবী : {{ staff.TeacherPosition }} </div>
                                            <div>শিক্ষাগত যোগ্যতা : {{ staff.TeacherQualification }}</div>
                                            <div>ঠিকানা : {{ staff.TeacherAddress }}</div>
                                            <div>মোবাইল : {{ staff.TeacherPhoneNumber }}</div>
                                            <div>ইমেইল : <a :href="'mailto:'+staff.TeacherEmail">{{ staff.TeacherEmail }}</a></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 mt-3"  v-if="staff.TeacherPosition==='M.L.S.S.'"  v-for="staff in staffs.data">


                            <div class="card">
                                <div class="card-body">
                                <div class="well well-white mini-profile-widget">
                                    <div class="image-container">
                                        <img :src="$asseturl+staff.ProfilePicture" class="avatar img-responsive" width="100%" alt="avatar">
                                    </div>
                                        <div class="details">
                                            <h5>{{ staff.TeacherName }}</h5>
                                            <hr>
                                            <div>পদবী : {{ staff.TeacherPosition }} </div>
                                            <div>শিক্ষাগত যোগ্যতা : {{ staff.TeacherQualification }}</div>
                                            <div>ঠিকানা : {{ staff.TeacherAddress }}</div>
                                            <div>মোবাইল : {{ staff.TeacherPhoneNumber }}</div>
                                            <div>ইমেইল : <a :href="'mailto:'+staff.TeacherEmail">{{ staff.TeacherEmail }}</a></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>
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


	},

	data () {
		return {
            staffs: {},

            ASSETURL: '',
            searchtype: '',
            field: 'TeacherJoiningDate',
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
hr {
    background-color: hsl(0deg 0% 89%) !important;
    border: none !important;
    display: block !important;
    height: 2px !important;
    margin: 0.5rem 0 !important;
}
</style>
