<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>




   <section>
<div class="container pb-sm-30">
    <h2 class="ms-2 mt-2">ব্লগ</h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 my-5">





        <div class="col" v-for="blog in blogs.data">
            <div class="card theme_shadow h-100">
                <img :src="ASSETURL+JSON.parse(blog.Images)[0]" class="card-img-top"
                    alt="...">
                <div class="card-footer py-3">
                    <small class="text-muted"><i class="theme_color2 fas fa-calendar-alt"></i><span class="date"> {{ blog.created_at }} </span> </small>
                </div>
                <div class="card-body">
                    <h5 class="card-title theme_color">{{ blog.title }}</h5>

                </div>
                <div class="card-footer border-0 bg-white">
                    <router-link :to="'/blogs/'+blog.slug" class="btn btn-outline-warning rounded-pill">Read More <i
                            class="fa-solid fa-arrow-right-long"></i> </router-link>
                </div>
            </div>
        </div>




    </div>

    <div class="row">
        <div class="col-sm-12">



        </div>
    </div>
</div>
</section>
          


    </div>
</template>

<script>


export default {

	created(){

  this.ASSETURL = ASSETURL
	},

	data () {
		return {
            blogs: {},

            ASSETURL: '',
            searchtype: '',
            field: 'id',
            sorttype: '',
            title:"",
            preloader: true,

		}
	},

	methods: {



          blogfun(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

 this.timeout = setTimeout( ()=> {
            axios.get(`/api/blog?page=${page}&filter[school_id]=${this.school_id}&filter[title]=${this.title}`)
                .then(({ data }) => {
                    this.blogs = data;
                     this.preloader = false;
                })
                .catch()
                  }, 300);
        },

        searchTitle(){
            // this.searchtype = "filtertitle";
            this.blogfun()
		},




	},
	mounted(){

this.blogfun();

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
