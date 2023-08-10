<template>
  <div class="container p-0">



    <header class="container">
        <div class="align-items-center d-flex justify-content-between px-3 py-2 text-white "
            style="background: #14142B;">
            <p class="mb-0 f13">EIIN : {{ schoolSettings.SCHOLL_CODE }},<span class="contact-info"> MPO CODE : 7903061301 </span></p>
            <div class="f13">
                <!-- <i class="fa-brands fa-facebook p-2 rounded-5" style="background: #3B5998;"></i>

                <i class="fa-brands fa-youtube p-2 rounded-5 mx-2" style="background-color: #CD201F;"></i>
                <i class="fa-solid fa-unlock-keyhole p-2 rounded-5" style="background-color: #008249;"></i> -->
                <span style="border-right: 1px solid #ffffff85; padding: 8px 10px;margin-right: 9px;">{{ curenttime }}</span>
            <span style="">Visitors : {{ visitors }}</span>
            </div>



        </div>
        <div class="align-items-center d-flex p-3 " style="grid-gap:10px;">
            <div>
                <img draggable="false" class="img-fluid" :src="$asseturl+schoolSettings.logo" alt="" style="width: 100px;">
            </div>
            <div>
                <h2 class="fw-bold text-left text-dark name" style="font-size: 25px;    border-bottom: 1px solid #271054;">{{ schoolSettings.SCHOLL_NAME }}</h2>
                <p class="text-left fw-bold f13" style="color: var(--my-blue-color);font-size: 16px;">TEPRIGANJ ADARSHA BL HIGH SCHOOL</p>
            </div>
            <div class="contact-info">
                <!-- <p class="fw-bold mb-0 text-danger">মোবাইলঃ০১৭১৯৪২১৬০৯</p>
                <p class="fw-bold mb-0 text-danger"> Email: tepablhs65@gmail.com</p> -->
            </div>

        </div>
        <!-- nav -->
        <nav class="navbar navbar-expand-lg navbar-light text-light" style=" background-color: #141441 !important;">
            <div class="container-fluid"><button type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span
                        class="fs-1 text-white"> <i class="fa-solid fa-bars "></i> </span></button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">






                        <li class="nav-item"><router-link to="/" aria-current="page"
                                class="text-light px-3 nav-link">মূলপাতা</router-link>
                        </li>
                        <li class="nav-item"><router-link to="/teachers" class="text-light px-3 nav-link">জনবল</router-link></li>
                        <li class="nav-item"><router-link to="/student_at_a_glance"
                                class="text-light px-3 nav-link">শিক্ষার্থীদের তথ্য</router-link></li>



                            <li class="nav-item">
                                <router-link class="text-light px-3 nav-link " aria-current="page" to="/student/register">ভর্তি আবেদন</router-link>
                            </li>

                        <li class="nav-item"><router-link to="/student/payment" class="text-light px-3 nav-link">পেমেন্ট</router-link>
                        </li>

                        <li class="nav-item"><router-link to="/student/tc" class="text-light px-3 nav-link">প্রশংসা পত্র</router-link>
                        </li>



                        <li class="nav-item dropdown"><router-link to="/result" class="text-light px-3 nav-link"
                                id="navbarDropdown">
                                পরীক্ষার ফলাফল
                            </router-link>
                        </li>
<!--
                        <li class="nav-item"><router-link to="/routine" class="text-light px-3 nav-link">রুটিন</router-link></li>
                        <li class="nav-item"><router-link to="/blogs" class="text-light px-3 nav-link">ব্লগ</router-link></li> -->


                        <li class="nav-item"><router-link to="/contact-us" class="text-light px-3 nav-link">যোগাযোগ</router-link></li>
                        <li class="nav-item"><router-link to="/login" class="text-light px-3 nav-link">লগইন</router-link></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>



                <slot></slot>


                <div class="row">
    <div class="col-md-12 mt-3 mb-3">
        <div class="row">
            <div class="col-md-4">
                <div class="imbox">
                    <div class="sidebarTitle mb-3 defaltColor"><h4 class="text-center">গুরুত্বপূর্ণ লিংক</h4></div>
                    <ul class="list-unstyled importantLInk" style="padding: 0px 11px;">


<li><a  href="http://www.moedu.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; শিক্ষা মন্ত্রণালয়</a></li>

<li><a  href="http://www.dshe.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; মাধ্যমিক ও উচ্চ শিক্ষা অধিদপ্তর</a></li>

<li><a  href="http://www.emis.gov.bd" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; EMIS</a></li>
<li><a  href="http://www.ntrca.gov.bd" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; NTRCA</a></li>








<li><a  href="http://www.banbeis.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; ব্যানবেইজ</a></li>




                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="imbox">
                    <div class="sidebarTitle mb-3 defaltColor"><h4 class="text-center">অন্যান্য</h4></div>
                    <ul class="list-unstyled importantLInk" style="padding: 0px 11px;">

                        <li><a  href="https://bangladesh.gov.bd/index.php" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; জাতীয় তথ্য বাতায়ন</a></li>

                        <li><a  href="https://muktopaath.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; মুক্তপাঠ </a></li>


                        <li><a  href="http://www.panchagarh.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; পঞ্চগড় জেলা</a></li>

                        <li><a  href="http://debiganj.panchagarh.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; দেবীগঞ্জ উপজেলা</a></li>

                        <li><a  href="https://tepriganj.uniontax.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; টেপ্রীগঞ্জ ইউনিয়ন</a></li>



                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="imbox">
                    <div class="sidebarTitle mb-3 defaltColor"><h4 class="text-center">শিক্ষাবোর্ড</h4></div>
                    <ul class="list-unstyled importantLInk" style="padding: 0px 11px;">
                        <li><a  href="https://dhakaeducationboard.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; ঢাকা শিক্ষাবোর্ড</a></li>

                        <li><a  href="http://www.rajshahieducationboard.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; রাজশাহী শিক্ষাবোর্ড</a></li>

                        <li><a  href="http://www.dinajpureducationboard.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; দিনাজপুর শিক্ষাবোর্ড</a></li>


                        <li><a  href="https://dinajpurboard.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; শিক্ষাবোর্ড,দিনাজপুর</a></li>

                        <li><a  href="http://www.educationboardresults.gov.bd/" target="_blank"> <i class="fas fa-check-circle"></i> &nbsp; বোর্ড রেজাল্ট</a></li>



                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>








                <footer class="container text-white">
        <div>

            <img draggable="false" :src="$asseturl+'assets/img/footer_top_bg.png'" alt="footer_top_bg" class="img-fluid w-100">
        </div>

        <div style="background: #14142B">

            <div class="row text-center">


                <div class="col-md-6 col-lg-4">
                    <p class="fs-5 mb-0  mt-2">পরিকল্পনা ও বাস্তবায়নে: </p>
                    <p class="mb-0  mt-1">মোঃ আবু ফরহাদ <br>
                        সহকারী শিক্ষক <br>
                        {{ schoolSettings.SCHOLL_NAME }}</p>
                </div>


                <div class="col-md-6 col-lg-4">
                    <p class="fs-5 mb-0  mt-2">ব্যবস্থাপনা ও তত্ত্বাবধানে: </p>
                    <p class="mb-0  mt-1">{{ schoolSettings.Principals_name }}<br>
                        প্রধান শিক্ষক <br>
                        {{ schoolSettings.SCHOLL_NAME }}</p>
                </div>


                <div class="col-md-6 col-lg-4">
                    <p class="fs-5 mb-0  mt-2">কারিগরি সহায়তায়:</p>
                    <a href="https://softwebsys.com/" class="text-white">সফটওয়েব সিস্টেম সল্যুশন</a>
                    <p class="mt-4 text-secondary">কপিরাইট ©২০২৩ সর্বস্বত্ব সংরক্ষিত</p>
                </div>

            </div>
        </div>

    </footer>



    </div>
</template>
<script>
export default {
    props: ['classesList','school_detials'],
    async created() {
        // console.log(this.school_detials)
        this.$store.commit('setschoolinfo', this.school_detials)
        this.$store.commit('setUpdateClasses', this.classesList)
        this.getvisitors();

    },
    data() {
        return {
            curentdate:'',
            curenttime:'',
            visitors:0,
            // schooldetails:{},
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


        getvisitors() {
            axios
                .get(`/api/visitorcount`)
                .then(({ data }) => (this.visitors = data*2))
                .catch();
        },



        // getSchoolData(){
        //     axios.get(`/api/school/settings?school_id=${this.school_id}&front=front`)
        //     .then(({ data }) => {
        //         this.schooldetails = data;
        //     })
        //     .catch()
        // },

    },
    mounted() {
        // this.getSchoolData();
        // this.schoolDetial('front');
        this.curentdate = User.dateformat(new Date())[3]
        setInterval(() => {
            this.curenttime = User.dateformat(new Date())[3]
        }, 1000);
    }
}
</script>
<style>

.bg-primary {
    background-color: #160089!important;
}


ul.footerList li a {
    border-right: 0 dotted #5a5454;
    color: #0e0e0e;
    display: block;
    font-size: 13px;
    padding: 6px 0;
}
ul.footerList li a:hover {
    background: #fff!important;
    border-radius: 0!important;
    color: #0e56a1!important;
    text-decoration: none!important;
}


@import url("https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap");

@import url("https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500&display=swap");

:root {
  --my-blue-color: #2e3192;
  --main-color: #14142b;
}

.num {
  /* font-family: "Noto Sans Bengali", sans-serif; */
}

* {
  /* font-family: "Hind Siliguri", sans-serif; */
  padding: 0;
}

li.nav-item {
  font-weight: 500;
}

/*  */
body {
  background: #e0e4cc;
}

.news {
  width: 160px;
}

.news-scroll a {
  text-decoration: none;
}

.dot {
  height: 6px;
  width: 6px;
  margin-left: 3px;
  margin-right: 3px;
  margin-top: 2px !important;
  background-color: rgb(207, 23, 23);
  border-radius: 50%;
  display: inline-block;
}

a,
h2 {
  text-decoration: none;
  color: #34495e;
}

.limited-tags {
  max-height: 348px;
  overflow-y: auto;
}

.limited-tags a {
  display: block;
}

.quoates-logo {
    max-width: 160px;
    border-style: solid;
    border-color: #2e3192;
    border-width: 2px;
    border-radius: 50px;
    height: 160px;
}

.quoates-name {
  font-family: "Hind Siliguri", Sans-serif;
  font-weight: 700;
}

.quoates-descrip {
  background: #e8f0fe;
  font-size: 18px;
  margin: 20px 20px 20px 0px;
  font-weight: 500;
  height: 300px;
}

.read-more {
  background: #180092;
}
.read-more:hover {
  background: #2303c7;
  color: rgb(230, 224, 224);
}

/*  */
/* Style for the modal */
#myModal {
  display: none;
  position: fixed;
  z-index: 999;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.9);
}

/* Style for the modal content */
#myModal .modal-content {
  margin: auto;
  display: block;
  max-width: 800px;
  max-height: 80%;
  width: 91%;
}

/* Style for the image in the modal */
#myModal .modal-content img {
  width: 100%;
  height: auto;
}

/* Style for the caption in the modal */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-height: 20%;
  text-align: center;
  color: #fff;
  padding: 10px 0;
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
}

/* Style for the close button */
.close {
  color: #fff;
  float: right;
  font-size: 36px;
  font-weight: bold;
  cursor: pointer;
  margin-right: 20px;
  margin-top: -41px;
}

/* Style for the close button on hover */
.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

.modal-content {
  animation: zoom-in 0.2s ease-out;
}

@keyframes zoom-in {
  from {
    transform: scale(0.5);
    opacity: 0;
  }

  to {
    transform: scale(1);
    opacity: 1;
  }
}

.modal-content {
  transition: all 0.2s ease-out;
}

.modal.closed .modal-content {
  transform: scale(0.5);
  opacity: 0;
}

/* Teacher styles */

.teachers-container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}

/* Colorize-zoom Container */
.img-hover-zoom--colorize img {
  transition: transform 0.5s, filter 1.5s ease-in-out;
}

.img-hover-zoom--colorize:hover img {
  filter: grayscale(0);
  transform: scale(1.1);
}

/* Responsive */
@media screen and (max-width: 570px) {
  .f13 {
    font-size: 13px;
  }

  .name {
    font-size: calc(1.275rem + 0.3vw) !important;
  }

  .img-full {
    width: 100% !important;
    height: 196px !important;
  }

  .res-quates {
    width: 100% !important;
  }

  .d-flex-res {
    flex-direction: column;
    width: 100%;
  }

  .contact-info {
    display: none !important;
  }
  .teachers-container {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
  }
  .sorting_disabled {
    font-size: 12px;
  }
}
h2.ms-2.mt-2 {
    font-size: 30px;
}
</style>
