<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>

<section class="inner-header divider layer-overlay overlay-theme-colored-7" >
<div class="container">
    <!-- Section Content -->
    <div class="section-content">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-theme-colored2 font-36">{{ Notices.title }}</h1>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="">Home</a></li>
                    <li class="active">Notice</li>
                </ol>
            </div>
        </div>
    </div>
</div>
</section>


 <!-- Main Start -->
    <main class="container-fluid">
        <div class="row">
            <!-- Left Main -->
            <div class="col-lg-9 my-3">
   <section>
<div class="container pb-sm-30">

    <div class="row row-cols-1 row-cols-md-12 row-cols-lg-12 g-4 my-5">





        <div class="col" >
            <div class="card theme_shadow h-100">

                <div class="card-footer py-3">
                    <small class="text-muted"><i class="theme_color2 fas fa-calendar-alt"></i><span class="date"> {{ dateformatGlobal(Notices.created_at)[3] }} </span> </small>
                </div>
                <div class="card-body">
                    <h5 class="card-title theme_color" style="font-size: 35px !important;">{{ Notices.title }}</h5>



    <hr>
  <h5 class="card-title theme_color">Description</h5>
    <p style="margin-bottom:30px">{{ Notices.description }}</p>


        <a  v-if="Notices.file" :href="Notices.file" style="margin-top: 25px;"><img :src="$asseturl+'assets/img/png-pdf.png'" style="width: 18px;margin-right: 9px;" alt="">{{ Notices.title }}</a>
    <iframe v-if="Notices.file" width="100%"  style="height:100vh;margin-top: 15px;" :src="Notices.file" frameborder="0"></iframe>



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

            <side-bar class-name="col-md-3"></side-bar>


        </div>
    </main>
    <!-- Main End -->


    </div>
</template>

<script>


export default {

	created(){

  this.ASSETURL = ASSETURL
	},

	data () {
		return {
            Notices: {},

            ASSETURL: '',
            searchtype: '',
            field: 'id',
            sorttype: '',
            title:"",
            preloader: true,

		}
	},

	methods: {



         async blogfun() {
            var  id = this.$route.params.id
           var res = await this.callApi('get',`/api/notice/${id}`,[]);
           this.Notices = res.data
           this.preloader = false
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
