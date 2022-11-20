<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <div class="breadcrumbs-area">
            <h3>Gallery</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Gallery</li>
            </ul>
        </div>
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <router-link  class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                            v-if="$routerHistory.hasPrevious()" :to="{ path: $routerHistory.previous().path }">
                            GO BACK
                        </router-link>
                    </div>
                    <div class="dropdown">
                        <router-link  class="btn-fill-md text-light bg-dark-pastel-green mt-3 float-right" :to="{name:'gallerynew'}">Add New</router-link>

                    </div>
                </div>


    <div class="row" v-for="gallery in gallerys.data">

        <div class="col-md-12">
            <b>Title : </b> <span>{{ gallery.title }}</span>
        </div>
        <div class="col-md-12">
            <b>Slug : </b> <span>{{ gallery.slug }}</span>
        </div>
       <div class="col-md-12">
            <b>Description : </b> <span>{{ gallery.description }}</span>
        </div>

       <div class="col-md-12">
            <b>Category : </b> <span>{{ gallery.category }}</span>
        </div>



       <div class="col-md-12">
            <b>Images : </b>
        </div>



       <div class="col-md-3" v-for="(img,index) in JSON.parse(gallery.image)" >
            <img width="100%" :src="'/'+img" alt="">
        </div>



    </div>




            </div>
        </div>
    </div>
</template>
<script>
export default {
    created() {

    },
    data() {
        return {
            gallerys: {},
            preloader: true,

        }
    },
    methods: {

        galleryfun(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

 this.timeout = setTimeout( ()=> {
            axios.get(`/api/gallery?page=${page}&filter[id]=${this.$route.params.id}`)
                .then(({ data }) => {
                    this.gallerys = data;
                    // console.log(data)
                    // console.log(data[0].school_id)
                    // this.school_id = data[0].school_id
                    this.preloader = false;
                })
                .catch()
                  }, 300);
        },





    },
    mounted() {
            this.galleryfun();

    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
