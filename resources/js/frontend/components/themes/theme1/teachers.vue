<template>
    <div>



        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>




            <section class="container ">
        <h2 class="ms-2 mt-2">কর্মরত শিক্ষক-কর্মচারী   </h2>
        <hr>
        <div class="teachers-container">



            <div class="row align-items-center bg-white m-1 p-2" v-if="staff.TeacherPosition=='Head Master'"  v-for="staff in staffs.data" :key="staff.id">
                <div class="img-hover-zoom--colorize col-md-4" >
                    <img :src="$asseturl+staff.ProfilePicture"
                        alt="" width="100%" class="img-fluid img-thumbnail">
                </div>
                <div class="card px-1 py-2 col-md-8">
                    <h5 class="fs-5">{{ staff.TeacherName }} </h5>
                    <hr class="m-2">
                    <p class=" mb-0">পদবী : {{ staff.TeacherPosition }} </p>
                    <p class=" mb-0">শিক্ষাগত যোগ্যতা : {{ staff.TeacherQualification }} </p>
                    <p class=" mb-0">ঠিকানা : {{ staff.TeacherAddress }}</p>
                    <p class=" mb-0 num">মোবাইল : {{ staff.TeacherPhoneNumber }}</p>
                    <p class=" mb-0 num">ইমেইল : <a :href="'mailto:'+staff.TeacherEmail">{{ staff.TeacherEmail }}</a></p>
                </div>
            </div>


            <div class="align-items-center bg-white row m-1 p-2" v-if="staff.TeacherPosition=='Assistent Head Master'"  v-for="staff in staffs.data" :key="staff.id">
                <div class="img-hover-zoom--colorize  col-md-4">
                    <img :src="$asseturl+staff.ProfilePicture"
                        alt="" width="100%" class="img-fluid img-thumbnail">
                </div>
                <div class="card px-1 py-2  col-md-8">
                    <h5 class="fs-5">{{ staff.TeacherName }} </h5>
                    <hr class="m-2">
                    <p class=" mb-0">পদবী : {{ staff.TeacherPosition }} </p>
                    <p class=" mb-0">শিক্ষাগত যোগ্যতা : {{ staff.TeacherQualification }} </p>
                    <p class=" mb-0">ঠিকানা : {{ staff.TeacherAddress }}</p>
                    <p class=" mb-0 num">মোবাইল : {{ staff.TeacherPhoneNumber }}</p>
                    <p class=" mb-0 num">ইমেইল : <a :href="'mailto:'+staff.TeacherEmail">{{ staff.TeacherEmail }}</a></p>
                </div>
            </div>



            <div class="align-items-center bg-white row m-1 p-2" v-if="staff.TeacherPosition=='Assistent Teacher'"  v-for="staff in staffs.data" :key="staff.id">
                <div class="img-hover-zoom--colorize  col-md-4">
                    <img :src="$asseturl+staff.ProfilePicture"
                        alt="" width="100%" class="img-fluid img-thumbnail">
                </div>
                <div class="card px-1 py-2  col-md-8">
                    <h5 class="fs-5">{{ staff.TeacherName }} </h5>
                    <hr class="m-2">
                    <p class=" mb-0">পদবী : {{ staff.TeacherPosition }} </p>
                    <p class=" mb-0">শিক্ষাগত যোগ্যতা : {{ staff.TeacherQualification }} </p>
                    <p class=" mb-0">ঠিকানা : {{ staff.TeacherAddress }}</p>
                    <p class=" mb-0 num">মোবাইল : {{ staff.TeacherPhoneNumber }}</p>
                    <p class=" mb-0 num">ইমেইল : <a :href="'mailto:'+staff.TeacherEmail">{{ staff.TeacherEmail }}</a></p>
                </div>
            </div>


            <div class="align-items-center bg-white row m-1 p-2" v-if="staff.TeacherPosition=='Office Assistent Cum-Accountent'"  v-for="staff in staffs.data" :key="staff.id">
                <div class="img-hover-zoom--colorize  col-md-4">
                    <img :src="$asseturl+staff.ProfilePicture"
                        alt="" width="100%" class="img-fluid img-thumbnail">
                </div>
                <div class="card px-1 py-2  col-md-8">
                    <h5 class="fs-5">{{ staff.TeacherName }} </h5>
                    <hr class="m-2">
                    <p class=" mb-0">পদবী : {{ staff.TeacherPosition }} </p>
                    <p class=" mb-0">শিক্ষাগত যোগ্যতা : {{ staff.TeacherQualification }} </p>
                    <p class=" mb-0">ঠিকানা : {{ staff.TeacherAddress }}</p>
                    <p class=" mb-0 num">মোবাইল : {{ staff.TeacherPhoneNumber }}</p>
                    <p class=" mb-0 num">ইমেইল : <a :href="'mailto:'+staff.TeacherEmail">{{ staff.TeacherEmail }}</a></p>
                </div>
            </div>


            <div class="align-items-center bg-white row m-1 p-2" v-if="staff.TeacherPosition=='M.L.S.S.'"  v-for="staff in staffs.data" :key="staff.id">
                <div class="img-hover-zoom--colorize  col-md-4">
                    <img :src="$asseturl+staff.ProfilePicture"
                        alt="" width="100%" class="img-fluid img-thumbnail">
                </div>
                <div class="card px-1 py-2  col-md-8">
                    <h5 class="fs-5">{{ staff.TeacherName }} </h5>
                    <hr class="m-2">
                    <p class=" mb-0">পদবী : {{ staff.TeacherPosition }} </p>
                    <p class=" mb-0">শিক্ষাগত যোগ্যতা : {{ staff.TeacherQualification }} </p>
                    <p class=" mb-0">ঠিকানা : {{ staff.TeacherAddress }}</p>
                    <p class=" mb-0 num">মোবাইল : {{ staff.TeacherPhoneNumber }}</p>
                    <p class=" mb-0 num">ইমেইল : <a :href="'mailto:'+staff.TeacherEmail">{{ staff.TeacherEmail }}</a></p>
                </div>
            </div>


        </div>

    </section>

















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
