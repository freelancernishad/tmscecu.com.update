<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
<div class="breadcrumbs-area">
    <h3>Notice Form</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>Notice Form</li>
    </ul>
</div>
<div class="card height-auto">
    <div class="card-body">

		<div class="db-student-list mt-5" id="search">
			<div class="pt-3 pb-3 pl-3 pr-3">
				<form id="form" enctype="multipart/form-data" method="POST" v-on:submit.prevent="formsubmit" >


                    <div class="form-group">
                        <label> Title</label>
						<input type="text" class="form-control" v-model="form.title">
                    </div>



                    <div class="form-group">
						<label> Description</label>
						<textarea class='form-control' v-model="form.description" id="description" cols="30" rows="10" style="resize:none;height: auto;" required ></textarea>
                    </div>

                    <div class="form-group">
                        <label> File</label>
						<input type="file"  class="form-control" @change="FileSelected($event, 'file')" id="file" >
                    </div>

					<button class="btn-fill-md text-light bg-orange-peel" id="send_sms" v-html="button"></button>
				</form>
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


            preloader: false,
            message: {},
            button:'Submit' ,
            form: {

                title:null,
                description:null,
                file:null,
            },

        }
    },
    methods: {



        FileSelected($event, parent_index) {
            let file = $event.target.files[0];
            if (file.size > 5048576) {
                Notification.image_validation();
            } else {
                let reader = new FileReader;
                reader.onload = event => {
                    this.form[parent_index] = event.target.result
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file)
            }
            //   console.log($event.target.result);
        },


        async noticeGet(){
            var res = await this.callApi('get',`/api/notice/${this.$route.params.id}`,[]);
            this.form = res.data
        },



       async formsubmit(){
            this.form['school_id'] = this.school_id,
            this.preloader = true;
            this.button='Submiting...'
            var res = await this.callApi('post',`/api/notice`,this.form);
            this.preloader = false;

            this.$router.push({name: 'notice'})
            Notification.success();


        }

    },
    mounted() {

        if(this.$route.params.id){
            this.noticeGet();
        }
    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
