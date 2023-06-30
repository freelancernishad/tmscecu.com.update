<template>
    <div>

        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>




            <div class="container">

                <h2 class="ms-2 mt-2">{{ year }} সালের ক্লাস রুটিন</h2>


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

                      <a :href="'/routines/'+school_id+'/'+routine.class+'/'+routine.year+'/download'" id="update_routine" class="btn btn-info btn-sm">ডাউনলোড রুটিন</a>

                    </td>
                </tr>
</tbody>

        </table>
</div>
     


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
