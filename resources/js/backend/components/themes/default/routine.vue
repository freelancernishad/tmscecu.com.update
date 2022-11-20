<template>
    <div>

            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>

<section class="inner-header divider layer-overlay overlay-theme-colored-7" >
<div class="container">
    <!-- Section Content -->
    <div class="section-content">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-theme-colored2 font-36">{{ year }} সালের ক্লাস রুটিন</h1>
                <ol class="breadcrumb text-left mt-10 white">
                    <li><a href="">Home</a></li>
                    <li class="active">Routine</li>
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
                <th class="columnStyleRight" style="font-size: 10pt;">শ্রেণী</th>
                <th class="columnStyleRight" style="font-size: 10pt;">ডাউনলোড </th>
            </tr>

</thead>
<tbody>


                <tr v-for="(routine,index) in routines">
                    <td class="columnStyleLeft" style="font-size: 10pt;">{{ index+1 }}</td>
                    <td class="columnStyleRight" style="font-size: 10pt;">{{ routine.class }}</td>
                    <td class="columnStyleRight" style="font-size: 10pt;">

                      <a :href="'/routines/'+school_id+'/'+routine.class+'/'+routine.year+'/download'" id="update_routine" class="btn btn-info">ডাউনলোড রুটিন</a>

                    </td>
                </tr>
</tbody>

        </table>
</div>
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
  this.classes = User.classlist();
	},

	data () {
		return {
            routines: {},
            school_id:null,
            ASSETURL: '',
            year: new Date().getFullYear(),
            preloader: true,
		}
	},

	methods: {


search(){
    this.allstudents();
},

            allroutine(){
                axios.get(`/api/routines?filter[school_id]=${this.school_id}&filter[year]=${this.year}`)
                .then(({data}) => {
                    this.routines = data
                     this.preloader = false;
                })
                .catch()
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
