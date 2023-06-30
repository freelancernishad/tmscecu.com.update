<template>
    <div>
        <div class="row">
            <div class="mainBody col-md-9 mt-3">



                <div class="pmCover">
                    <vue-flux :options="vfOptions" :images="vfImages" :transitions="vfTransitions" ref="slider">
                        <template v-slot:preloader>
                            <flux-preloader />
                        </template>
                    </vue-flux>
                </div>




                <div class="card">
                    <div class="card-body">
                        <h1>নোটিশ বোর্ড</h1>
                        <ul style="padding-left:0;margin-left: 55px;margin-top: 13px;">

<li class="ps-3 pb-1" v-for="notice in noticesIN"><router-link class="text-dark noticeitems"  :to="{name:'noticesingle',params:{id:notice.id,title:notice.title}}"> <i class="fas fa-angle-double-right"></i> {{ notice.title.slice(0, 80)+'...' }}</router-link></li>

</ul>
<router-link style="    padding: 2px 9px;float: right;background: #545454;margin-bottom: 8px;color: white;border-radius: 3px;" :to="{name:'frontnotice'}">সকল নোটিশ দেখুন</router-link>
                    </div>
                </div>




                <div class="services mt-3">


<div class="row">



                        <div class="col-md-12">
                            <h6 class="serviceTitle position-relative defaltColor">
                                প্রতিষ্ঠানের ইতিহাস
                            </h6>
                        </div>
                        <div class="col-md-12">
                            <p  style="text-align: justify;">{{  schoolSettings.HISTORY_OF_THE_ORGANIZATION }}</p>
                        </div>


                        <div class="col-md-12">
                            <h6 class="serviceTitle position-relative defaltColor">
                                প্রধান শিক্ষকের বাণী
                            </h6>

                            <p style="text-align: justify;">{{  schoolSettings.PRINCIPALS_WORDS }}</p>
                        </div>


                        <!-- <div class="col-md-6">
                            <h6 class="serviceTitle position-relative defaltColor">
                               সভাপতির বাণী
                            </h6>

                            <p>{{  schoolSettings.VICE_PRINCIPALS_STATEMENT }}</p>
                        </div> -->



                    </div>
                </div>
            </div>
            <side-bar class-name="col-md-3"></side-bar>
        </div>

        <b-modal :id="actionModalhome.id" size="xl" title="ইউনিয়ন নির্বাচন করুন" ok-only>
                    <union-select :custom-url="actionModalhome.title" />
        </b-modal>

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
import FlipCard from "./layouts/default/FlipCard.vue";
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
