<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>





   <section>
<div class="container pb-sm-30">
    <h2 class="ms-2 mt-2">{{ Notices.title }}</h2>

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
