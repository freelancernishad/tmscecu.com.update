<template>
  <div class="container p-0">

        <header  >
            <!-- Top header -->
            <div class="topHeader">
                    <div class="row">
                        <div class="topheaderItem col-md-6 col-6"><span>{{ schoolinfo.SCHOLL_NAME }} এ
                                স্বাগতম</span></div>
                        <div class="topheaderItem col-md-6 col-6 text-right"><span
                                style="border-right: 1px solid #ffffff85; padding: 8px 10px;margin-right: 9px;">{{
                                        curentdate
                                }}
                            </span>
                            <!-- <span style="border-right: 1px solid #ffffff85; padding: 8px 10px;margin-right: 9px;">{{ curenttime }}</span> -->
                            <!-- <span style="">Visitors : {{ visitors }}</span> -->
                        </div>
                    </div>
                </div>

            <div class="top_header">
                <div class="container-fluid">
                    <div class="row py-2 for_mobile">
                        <div class="col-lg-12 col-md-12 col-sm-12 logo school_logo" style="display: flex;">


                                <img class="img-fluid" width="75px" :src="schoolinfo.logo" alt="">
                                <span class="text-dark" style="font-size:20px;display: flex;flex-direction: column;justify-content: center;margin-left: 15px;">
                                    <span style="font-size: 25px;border-bottom: 1px solid #6db5ae;">{{ schoolinfo.SCHOLL_NAME }}</span>
                                    <span style="font-size: 15px;color: #570abd;font-weight: 600;letter-spacing: 3px;">TEPRIGANJ ADARSHA B.L HIGH SCHOOL</span>
                                </span>



                        </div>


                    </div>
                </div>
            </div>
            <!-- Nav -->
            <nav class="navbar navbar-expand-lg navbar-light bg-primary text-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                            <li class="nav-item ">
                                <router-link class="text-light px-3 nav-link " aria-current="page" to="/">প্রচ্ছদ</router-link>
                            </li>


                            <li class="nav-item">
                                <router-link class="text-light px-3 nav-link " aria-current="page" to="/teachers">জনবল</router-link>
                            </li>



                            <li class="nav-item">
                                <router-link class="text-light px-3 nav-link " aria-current="page" to="/student_at_a_glance">শিক্ষার্থীদের তথ্য</router-link>
                            </li>

                            <li class="nav-item dropdown">
                                <router-link class="text-light px-3 nav-link" to="/result" id="navbarDropdown" >
                                    ফলাফল
                                </router-link>
                            </li>


                            <li class="nav-item">
                                <router-link class="text-light px-3 nav-link " aria-current="page" :to="{name:'payment'}">পেমেন্ট</router-link>
                            </li>

                            <li class="nav-item">
                                <router-link class="text-light px-3 nav-link " aria-current="page" to="/student/register">আবেদন</router-link>
                            </li>


<!--
                            <li class="nav-item dropdown">
                                <a class="text-light px-3 nav-link dropdown-toggle" href="javascript:voil(0)" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    শিক্ষার্থীদের তথ্য
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><router-link class="dropdown-item" to="/student_at_a_glance">অধ্যয়নরত শিক্ষার্থীর সংখ্যা</router-link></li>
                                    <li><router-link class="dropdown-item" to="/student_list">অধ্যয়নরত শিক্ষার্থীর তালিকা</router-link></li>

                                </ul>
                            </li> -->





                            <li class="nav-item">
                                <router-link class="text-light px-3 nav-link" aria-current="page" to="/routine">রুটিন</router-link>
                            </li>



                            <li class="nav-item">
                                <router-link class="text-light px-3 nav-link " aria-current="page" to="/blogs">ব্লগ</router-link>
                            </li>


                            <li class="nav-item">
                                <router-link class="text-light px-3 nav-link " aria-current="page" to="/contact-us">যোগাযোগ</router-link>
                            </li>




                            <li class="nav-item">
                                <router-link class="text-light px-3 nav-link " aria-current="page" :to="{name:'login' }">লগইন</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>



                <slot></slot>



                <footer>
                <div class="footer_top_bg"
                    style="background: url('/public/assets/img/footer_top_bg.png'); height: 93px; background-repeat: no-repeat; background-size: cover;">
                </div>





                <div class="footerBottom">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="footerList">
                                <li style="font-size:font-size:15px"> <b> পরিকল্পনা ও বাস্তবায়নে:</b>
                                    <h3 class="mt-1">{{ schooldetails.Principals_name }}</h3>
                                    <h3 class="">প্রধান শিক্ষক</h3>
                                    <h3 class="">{{ schooldetails.SCHOLL_NAME }}</h3>


                                </li>

                            </ul>
                        </div>


                        <div class="col-md-4">
                            <!-- <ul class="footerList">
                                <li style="font-size:font-size:15px"> </li>
                                <li
                                    style="font-size:font-size:15px;    display: flex;justify-content: center;align-items: center;">
                                    <img style="width:40px !important" :src="$asseturl + 'assets/img/bd-logo.png'" alt="">
                                    <span style="padding: 0 15px;"> <b> সার্বিক ব্যবস্থাপনায়:</b> <br> © ২০২২ উপজেলা প্রশাসন, তেঁতুলিয়া,পঞ্চগড়</span>
                                </li>
                            </ul> -->
                        </div>



                        <div class="col-md-4">
                            <ul class="footerList">
                                <li style="font-size:font-size:15px"> </li>
                                <li
                                    style="font-size:font-size:15px;    display: flex;justify-content: center;align-items: center;">
                                    <!-- <img style="width:40px !important" :src="$asseturl + 'assets/img/bd-logo.png'"alt=""> -->
                                    <span style="padding: 0 15px;"> <b> কারিগরি সহায়তায়:</b> <br>Softweb</span>
                                </li>
                            </ul>
                        </div>
                        </div>
                        </div>





            </footer>


    </div>
</template>
<script>
export default {
    props: ['classesList'],
    async created() {
        this.$store.commit('setUpdateClasses', this.classesList)

    },
    data() {
        return {
            curentdate:'',
            schooldetails:{},
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                document.getElementById('navbarSupportedContent').classList.remove("show");
                window.scrollTo(0, 0);
                this.$store.dispatch('Fb_Parse')
            },
            deep: true
        }
    },
    methods: {


        getSchoolData(){
            axios.get(`/api/school/settings?school_id=${this.school_id}&front=front`)
            .then(({ data }) => {
                this.schooldetails = data;
            })
            .catch()
        },

    },
    mounted() {
        this.getSchoolData();
        this.schoolDetial();
        this.curentdate = User.dateformat(new Date())[3]
        setInterval(() => {
            this.curenttime = User.dateformat(new Date())[3]
        }, 1000);
    }
}
</script>
<style>
</style>
