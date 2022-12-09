<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>


<section class="inner-header divider layer-overlay overlay-theme-colored-7" >
<div class="container">
    <!-- Section Content -->
    <div class="section-content">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-theme-colored2 font-36">নোটিশ
                </h1>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="">Home</a></li>
                    <li class="active">নোটিশ</li>
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
            <div class="container">




    <table class="table" style="margin: 30px 0 50px 0;">
<thead>
            <tr>
                <th class="columnStyleRight" style="font-size: 10pt;">ক্রমিক নং.</th>
                <th class="columnStyleRight" style="font-size: 10pt;">বিবরণ</th>
                <th class="columnStyleRight" style="font-size: 10pt;">ডাউনলোড </th>
            </tr>

</thead>
<tbody>


                <tr v-for="(routine,index) in routines">
                    <td class="columnStyleLeft" style="font-size: 10pt;">{{ index+pageNO }}</td>
                    <td class="columnStyleRight" style="font-size: 10pt;"><router-link :to="{name:'noticesingle',params:{id:routine.id}}"> {{ routine.title }}</router-link></td>
                    <td class="columnStyleRight" style="font-size: 10pt;">

                      <a :href="routine.file" id="update_routine" class="btn btn-info btn-sm">ডাউনলোড</a>

                    </td>
                </tr>
</tbody>

        </table>

        <Pagination :total-rows="TotalRows" route-name="frontnotice" :route-params="RouteParams" :total-page="Totalpage"></Pagination>

</div>
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
            routines: {},

            ASSETURL: '',
            preloader: true,
            pageNO: 1,

            PerPageData: '20',
            TotalRows: '1',
            Totalpage: [],
            RouteParams: {},
		}
	},
    watch: {
        '$route': {
            handler(newValue, oldValue) {

                this.allroutine('page');
            },
            deep: true
        }
    },
	methods: {


search(){
    this.allstudents();
},

        async allroutine(type=''){

                if(type=='page')this.preloader=true

                var page = 1;
                if (this.$route.query.page) page = this.$route.query.page;

                var res = await this.callApi('get',`/api/notice?page=${page}`,[]);
                this.routines = res.data.data
                this.TotalRows = `${res.data.total}`;
                this.PerPageData = `${res.data.per_page}`;
                this.Totalpage = res.data.links

                if(page==1){

                    this.pageNO = 1;
                }else{
                    this.pageNO = (page-1)*this.PerPageData+1;

                }
                // console.log( this.pageNO)

                this.preloader=false
            },



	},
	mounted(){


    this.allroutine();


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
