<template>
    <div>

        <main>
        <!-- notice board -->
        <div class=" mt-5 container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center breaking-news bg-white"
                        style="border: 1px solid #14142B;">
                        <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center  py-2 text-white px-1 news"
                            style="background-color: #14142B;">
                            <span class="d-flex align-items-center">&nbsp;নোটিশ</span>
                        </div>
                        <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();"
                            onmouseout="this.start();">



                            <span v-for="notice in noticesIN" :key="notice.id+'notice'">
                                <span><img draggable="false" :src="$asseturl+schoolSettings.logo" alt="" width="20px"></span>
                                <router-link :to="{name:'noticesingle',params:{id:notice.id,title:notice.title}}" class="notice-a text-dark">{{ notice.title.slice(0, 30)+'...' }} </router-link>
                            </span>


                        </marquee>
                    </div>
                </div>
            </div>
        </div>



        <div class="bg-white container d-flex justify-content-between my-5 py-4 gap-2">
            <div class="d-flex flex-column gap-4 img-thumbnail" style="width: 30%;">
                <img draggable="false" :src="$asseturl+'frontend/flag.gif'" class="img-fluid" alt="">
                <!-- <a href="https://mujib100.gov.bd/" target="_blank" class="btn btn-danger rounded-4">মুজিব কর্ণার</a> -->
            </div>
            <div class="d-flex flex-column gap-4 img-thumbnail contact-info" style="width: 30%;">
                <img draggable="false" :src="$asseturl+'frontend/8.gif'" class="img-fluid" alt="">
                <!-- <p class="fs-5 mb-0 text-center">বাংলাদেশের স্বাধীনতা ও বিজয় অর্জনের ৫০ বছর পূর্তি</p> -->
            </div>
            <div class="d-flex flex-column gap-4 img-thumbnail" style="width: 30%;">
                <img draggable="false" :src="$asseturl+'frontend/9.gif'" class="img-fluid" alt="">

                <!-- <a href="https://bn.wikipedia.org/wiki/%E0%A6%AC%E0%A6%BE%E0%A6%82%E0%A6%B2%E0%A6%BE%E0%A6%A6%E0%A7%87%E0%A6%B6%E0%A7%87%E0%A6%B0_%E0%A6%B8%E0%A7%8D%E0%A6%AC%E0%A6%BE%E0%A6%A7%E0%A7%80%E0%A6%A8%E0%A6%A4%E0%A6%BE%E0%A6%B0_%E0%A6%B8%E0%A7%81%E0%A6%AC%E0%A6%B0%E0%A7%8D%E0%A6%A3%E0%A6%9C%E0%A6%AF%E0%A6%BC%E0%A6%A8%E0%A7%8D%E0%A6%A4%E0%A7%80"
                    target="_blank" class="btn btn-success rounded-4">সুবর্ণজয়ন্তী
                    কর্ণার</a> -->

            </div>

        </div>



        <!-- slider & notice -->

        <div class="container mx-auto row py-3" style="background: #E8F0FE">
            <div class="col-lg-8 col-md-12 mb-3 p-0">
                <vue-flux :options="vfOptions" :images="vfImages" :transitions="vfTransitions" ref="slider">
                        <template v-slot:preloader>
                            <flux-preloader />
                        </template>
                    </vue-flux>
            </div>

            <div id="notic-container" class="col-lg-4 col-md-12 p-0" style="color: #34495E;">
                <div class=" d-flex justify-content-between mx-2 mb-2" style="background: #E0E4CC;">
                    <p class="fs5 fw-bold mb-0 ms-2 ps-2 py-2">নোটিশ</p>
                    <router-link :to="{name:'frontnotice'}" class="fw-bold pe-3 py-2">সকল নোটিশ...</router-link>
                </div>

                <marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();" class="mb-3 px-2 py-3 limited-tags scrolling-hide">
                    <router-link v-for="notice in noticesIN" :key="notice.id+'notice1'" :to="{name:'noticesingle',params:{id:notice.id,title:notice.title}}" class="bg-white mb-2 p-3 text-dark">{{ notice.title.slice(0, 30)+'...' }} </router-link>
                </marquee>


            </div>
        </div>
        <!-- quotes section-->
        <div class="container d-flex gap-4 my-3  py-3 d-flex-res p-0">
            <div class="bg-white d-flex res-quates shadow w-50">
                <div class="py-4 text-center w-50">
                    <img draggable="false" :src="$asseturl+schoolSettings.PRINCIPALS_IMGAGE" alt="" srcset="" width="160px"
                        class="mb-2 quoates-logo">
                    <p class="mb-0 quoates-name text-center" style="color: var(--my-blue-color);">{{ schoolSettings.Principals_name }} </p>
                    <p class="mb-0 quoates-name text-center" style="  color: #008249;"> প্রধান শিক্ষক</p>
                </div>
                <p class="limited-tags p-3 w-50 quoates-descrip" style="text-align: justify;">
                    {{  schoolSettings.PRINCIPALS_WORDS }}

                </p>
            </div>
            <div class="bg-white d-flex w-50 res-quates shadow">
                <div class="py-4 text-center w-50">
                    <img draggable="false" :src="$asseturl+schoolSettings.VICE_PRINCIPALS_IMGAGE" alt="" srcset="" width="160px" class="mb-2 quoates-logo">
                    <p class="mb-0 quoates-name text-center" style="color: var(--my-blue-color);">{{  schoolSettings.Vice_Principals_name }} </p>
                    <p class="mb-0 quoates-name text-center" style="  color: #008249;"> সহকারী প্রধান শিক্ষক </p>
                </div>
                <p class=" limited-tags p-3 w-50 quoates-descrip" style="text-align: justify;">
                    {{  schoolSettings.VICE_PRINCIPALS_STATEMENT }}

                </p>
            </div>
        </div>
        <!-- history of the school -->
        <div class="container mx-auto d-flex fs-5  py-4 row">
            <div class="col-lg-5 col-md-12 text-center">
                <img draggable="false" :src="$asseturl+schoolSettings.logo" alt="" srcset="" class="img-fluid p-3 shadow-lg"
                    style="width: 308px;">

            </div>
            <div class="col-md-12 col-lg-7">
                <p style="color: #180092;
                margin-bottom: 9px;
                font-size: 23px;">আমাদের প্রতিষ্ঠানের ইতিহাস
                </p>
                <p class="mb-3" style="text-align: justify;
                color: #000000;
                font-weight: 500;"> {{  schoolSettings.HISTORY_OF_THE_ORGANIZATION }}

                </p>
                <a class="px-4 py-1 read-more text-white" href="#" role="button"><i
                        class="fa-book-open fa-solid me-2"></i>আরো পড়ুন</a>
            </div>
        </div>
        <!-- image and videos gallery -->

        <!-- <div class="bg-white container mx-auto px-1 py-4 row shadow">

            <div class="col-md-12 col-lg-6">
                <h2>ফটো গ্যালারি </h2>
                <div class="row">
                    <div class="col-md-6 col-lg-6 w-50">
                        <img draggable="false" src="img/building1.jpg" alt="" class="img-fluid img-thumbnail photoss "
                            loading="lazy">
                    </div>
                    <div class="col-md-6 col-lg-6 w-50">
                        <img draggable="false" src="img/building1.jpg" alt="" class="img-fluid img-thumbnail photoss "
                            loading="lazy">
                    </div>
                    <div class="col-md-6 col-lg-6 w-50">
                        <img draggable="false" src="img/building1.jpg" alt="" class="img-fluid img-thumbnail photoss "
                            loading="lazy">
                    </div>
                    <div class="col-md-6 col-lg-6 w-50">
                        <img draggable="false" src="img/building1.jpg" alt="" class="img-fluid img-thumbnail photoss "
                            loading="lazy">
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <h2>ভিডিও গ্যালারি </h2>
                <div class="row">
                    <div class="col-md-6 col-lg-6 w-50">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/bWtF02dbwjY"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen class="img-fluid img-thumbnail " loading="lazy"></iframe>
                    </div>
                    <div class="col-md-6 col-lg-6 w-50">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/8amMorxBTw8"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen class="img-fluid img-thumbnail " loading="lazy"></iframe>
                    </div>
                    <div class="col-md-6 col-lg-6 w-50">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/bWtF02dbwjY"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen class="img-fluid img-thumbnail " loading="lazy"></iframe>
                    </div>
                    <div class="col-md-6 col-lg-6 w-50">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/CtiUO9oPjdc"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen class="img-fluid img-thumbnail " loading="lazy"></iframe>
                    </div>

                </div>
            </div>
        </div> -->
        <!-- img moddal -->
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img draggable="false" class="modal-content" id="img01">
            <div id="caption"></div>
        </div>

    </main>






    </div>
</template>
<script>
import {
    VueFlux,
    FluxCaption,
    FluxControls,
    FluxIndex,
    FluxPagination,
    FluxPreloader,
} from "vue-flux";

// import FlipCard from "./layouts/default/FlipCard.vue";

let FlipCard = require(`../../layouts/theme1/FlipCard.vue`)

export default {
    created() {


        // if (!User.loggedIn()) {
        //     this.$router.push({ name: "/login" });
        // }
    },
    components: {
        VueFlux,
        FluxCaption,
        FluxControls,
        FluxIndex,
        FluxPagination,
        FluxPreloader,
        FlipCard,
    },
    data() {
        return {
            selectedUser: '',
            flipped: false,
            vfOptions: {
                autoplay: true,
            },
            vfImages: [
                // this.$asseturl + "assets/img/padmabanner.jpeg",
            //    "https://tepriganjhighschool.edu.bd/public/backend/slider/1670087505____66768.jpeg",

            ],
            vfTransitions: [
                "fade",
                "blinds2d",
                "blinds3d",
                "blocks1",
                "blocks2",
                "book",
                "camera",
                "concentric",
                "cube",
                "explode",

                "fall",
                "kenburn",
                "round1",
                "round2",
                "slide",
                "swipe",
                "warp",
                "waterfall",
                "wave",
                "zip",
            ],
            actionModalhome: {
                id: 'action-modal-home',
                title: '',
                status: '',
                content: {},

                content_id: '',
            },
            noticesIN: {},
            //   vfCaptions: [],
        };
    },
    mounted() {
        // this.schoolDetial('front');
        setTimeout(() => {

            this.sliderimage();
        }, 2000);
        this.noticeFunIn();
        this.visitorcount();
    },
    methods: {

        async visitorcount(){
            var res = await this.callApi('post',`/api/visitorcreate`,[]);
        },

        async noticeFunIn(){
            var res = await this.callApi('get',`/api/notice?sidebar=5`,[]);
            this.noticesIN = res.data.data
        },


        sliderimage(){
            // console.log(this.schoolSettings.slider)
            this.schoolSettings.slider.forEach(element => {
                this.vfImages.push(this.$asseturl + element)
            });
        },



        sendInfo(item, button) {
            this.actionModalhome.title = item;
            this.selectedUser = item;
            this.$root.$emit('bv::show::modal', this.actionModalhome.id, button)

            // console.log(item)
        },
    },
};
</script>
<style lang="css" scoped>
a.prev {
    display: none !important;
}

a.next {
    display: none !important;
}
.noticeitems:hover {
    border-bottom: 1px solid black;
}
</style>
