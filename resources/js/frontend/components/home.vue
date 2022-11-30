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





                <div class="services mt-3">


<div class="row">



                        <div class="col-md-12">
                            <h6 class="serviceTitle position-relative defaltColor">
                                প্রতিষ্ঠানের ইতিহাস
                            </h6>
                        </div>
                        <div class="col-md-12">
                            <p>{{  schoolinfo.HISTORY_OF_THE_ORGANIZATION }}</p>
                        </div>


                        <div class="col-md-6">
                            <h6 class="serviceTitle position-relative defaltColor">
                                প্রধান শিক্ষকের বাণী
                            </h6>

                            <p>{{  schoolinfo.PRINCIPALS_WORDS }}</p>
                        </div>


                        <div class="col-md-6">
                            <h6 class="serviceTitle position-relative defaltColor">
                               সহকারি প্রধান শিক্ষকের বাণী
                            </h6>

                            <p>{{  schoolinfo.VICE_PRINCIPALS_STATEMENT }}</p>
                        </div>



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
import FlipCard from "./layouts/FlipCard.vue";
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
                this.$asseturl + "assets/img/padmabanner.jpeg",

            ],
            vfTransitions: [
                "blinds2d",
                "blinds3d",
                "blocks1",
                "blocks2",
                "book",
                "camera",
                "concentric",
                "cube",
                "explode",
                "fade",
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
            }
            //   vfCaptions: [],
        };
    },
    mounted() {
        this.schoolDetial('front');
        setTimeout(() => {

            this.sliderimage();
        }, 2000);
    },
    methods: {

        sliderimage(){

            console.log(this.schoolinfo.slider)
            this.schoolinfo.slider.forEach(element => {
                this.vfImages.push(this.$asseturl + element)
            });
        },



        sendInfo(item, button) {


            this.actionModalhome.title = item;
            this.selectedUser = item;
            this.$root.$emit('bv::show::modal', this.actionModalhome.id, button)

            console.log(item)
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
</style>
