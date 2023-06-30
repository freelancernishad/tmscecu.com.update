<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>





   <section>
<div class="container pb-sm-30">
    <h2 class="ms-2 mt-2">{{ blogs.data[0].title }}</h2>

    <div class="row row-cols-1 row-cols-md-12 row-cols-lg-12 g-4 my-5">





        <div class="col" v-for="blog in blogs.data">
            <div class="card theme_shadow h-100">
                <img :src="ASSETURL+JSON.parse(blog.Images)" class="card-img-top"
                    alt="...">
                <div class="card-footer py-3">
                    <small class="text-muted"><i class="theme_color2 fas fa-calendar-alt"></i><span class="date"> {{ blog.created_at }} </span> </small>
                </div>
                <div class="card-body">
                    <h5 class="card-title theme_color">{{ blog.title }}</h5>



    <hr>
  <h5 class="card-title theme_color">Description</h5>
    <p>{{ blog.description }}</p>

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
            blogs: {
                data:{
                    'title':'',
                    'description':'',
                    'created_at':'',
                }
            },

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
            axios.get(`/api/blog?page=${page}&filter[slug]=${this.$route.params.slug}`)
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
