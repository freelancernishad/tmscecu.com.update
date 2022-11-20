<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>


        <!-- Slider -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="carouselExampleCaptions" class="my-1 carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">



                            <button v-for="(slide,index) in schooldetails.slider" type="button" data-bs-target="#carouselExampleCaptions" :data-bs-slide-to="index"
                            :class="{'active' : index == 0 ? true : false }" aria-current="true" aria-label="Slide 1"></button>














                        </div>
                        <div class="carousel-inner">






                            <div v-for="(slide,index) in schooldetails.slider" class="carousel-item"  :class="{'active' : index == 0 ? true : false }">
                                <img width="100%" class="img-fluid" :src="ASSETURL+slide"  alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                </div>
                            </div>





                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Header End -->

    <!-- Main Start -->
    <main class="container-fluid">
        <div class="row">
            <!-- Left Main -->
            <div class="col-lg-9 my-3">
                <!-- School History -->
                <section class="school_history mb-5">
                    <div class="section_title">
                        <h4 class="bg-primary p-2 text-light">প্রতিষ্ঠানের ইতিহাস</h4>
                    </div>
                    <div class="row">
                        <div class="school_image col-lg-4 col-sm-12 col-md-6">
                            <img class="img-fluid" :src="ASSETURL+schooldetails.HISTORY_OF_THE_ORGANIZATION_IMAGE" alt="">
                        </div>
                        <div class="school_details col-lg-8 col-sm-12 col-md-6">
                            <p class="text-justify">{{ schooldetails.HISTORY_OF_THE_ORGANIZATION }} </p>
                        </div>
                    </div>
                </section>
                <!-- Senior Person Speech -->
                <section class="speech mb-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section_title">
                                <h4 class="bg-primary p-2 text-light">অধ্যক্ষের বাণী</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-12 col-md-6  principle_photo">
                                    <img class="img-fluid" :src="ASSETURL+schooldetails.PRINCIPALS_IMGAGE" alt="">
                                </div>
                                <div class="col-lg-8 col-sm-12 col-md-6  principle_speech text-justify">
{{ schooldetails.PRINCIPALS_WORDS }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="section_title">
                                <h4 class="bg-primary p-2 text-light">উপ অধ্যক্ষের বাণী</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-12 col-md-6  vice_principle_photo">
                                    <img class="img-fluid" :src="ASSETURL+schooldetails.VICE_PRINCIPALS_IMGAGE" alt="">
                                </div>
                                <div class="col-lg-8 col-sm-12 col-md-6  vice_principle_speech text-justify">
                                    {{ schooldetails.VICE_PRINCIPALS_STATEMENT }}
                                     </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Info Section -->
                <section class="info">
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-12  ">
                            <div class="custom_bg pb-2">
                                <div class="section_title">
                                    <h4 class="bg-primary p-2 text-light">ছাত্র-ছাত্রীদের তথ্য</h4>
                                </div>
                                <div class="student_info d-flex align-items-center">
                                    <div class="student_logo p-2">
                                        <img class="img-fluid" src="https://via.placeholder.com/150" alt="">
                                    </div>
                                    <div class="student_service">
                                        <ul>
                                            <li><i class="fas fa-angle-double-right"></i> ছাত্র-ছাত্রীর আসন সংখ্যা </li>
                                            <li><i class="fas fa-angle-double-right"></i> ভর্তি তথ্য </li>
                                            <li><i class="fas fa-angle-double-right"></i> নোটিশ </li>
                                            <li><i class="fas fa-angle-double-right"></i> রুটিন </li>
                                            <li><i class="fas fa-angle-double-right"></i> কৃতি শিক্ষার্থী</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 ">
                            <div class="custom_bg pb-2">
                                <div class="section_title">
                                    <h4 class="bg-primary p-2 text-light">শিক্ষকদের তথ্য</h4>
                                </div>
                                <div class="student_info d-flex align-items-center">
                                    <div class="student_logo p-2">
                                        <img class="img-fluid" src="https://via.placeholder.com/150" alt="">
                                    </div>
                                    <div class="student_service">
                                        <ul>
                                            <li><i class="fas fa-angle-double-right"></i> ছাত্র-ছাত্রীর আসন সংখ্যা </li>
                                            <li><i class="fas fa-angle-double-right"></i> ভর্তি তথ্য </li>
                                            <li><i class="fas fa-angle-double-right"></i> নোটিশ </li>
                                            <li><i class="fas fa-angle-double-right"></i> রুটিন </li>
                                            <li><i class="fas fa-angle-double-right"></i> কৃতি শিক্ষার্থী</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
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
            schooldetails:{},
             school_id:null,
             ASSETURL: '',
             preloader: true,

		}
	},

	methods: {

        getSchoolData(){
            axios.get(`/api/school/settings?school_id=${this.school_id}&front=front`)
                .then(({ data }) => {
                    this.schooldetails = data;
                     this.preloader = false;
                })
                .catch()
        },


	},
	mounted(){
this.getSchoolData()

	}
}
</script>
