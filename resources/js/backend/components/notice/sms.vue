<template>
    <div>
            <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
<div class="breadcrumbs-area">
    <h3>SENT SMS</h3>
    <ul>
        <li>
            <a href="index.html">Home</a>
        </li>
        <li>SENT SMS</li>
    </ul>
</div>
<div class="card height-auto">
    <div class="card-body">

		<div class="db-student-list mt-5" id="search">
			<div class="pt-3 pb-3 pl-3 pr-3">
				<form id="form" enctype="multipart/form-data" method="POST" v-on:submit.prevent="formsubmit" >


                    <div class="form-group">
                            <label> Class</label>
									<select class="form-control" v-model="form.class" id="" required>
										<option value="">SELECT</option>
										<option value="All">
											All
										</option>
										<option v-for="classlist in classess">{{ classlist }}</option>
									</select>
                                </div>

                                <div class="form-group">
						<label> Description</label>
								<textarea class='form-control' v-model="form.deccription" id="deccription" cols="30" rows="10" style="resize:none;height: auto;" required ></textarea>
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
            button:'SEND SMS' ,
            form: {
                            class:'All',
                            deccription:null
            },

        }
    },
    methods: {
        formsubmit(){
this.preloader = true;
            this.button='SENDING SMS...'

                axios.post(`/api/sent_sms/submit`,this.form)
                    .then(({data}) => {
                        this.preloader = false;
                        //  console.log(data[0].data)
                            // this.$router.push({name: 'students'})
                        this.message = data[0].data
                        Object.values(this.message).forEach(msg => {
                            // console.log(msg)
                            Notification.customsucess(msg);
                        });

                     this.form=  {
                            class:'All',
                            deccription:''
                            }
 this.button='SEND SMS'

                            // Notification.success();
                    })
                    .catch(() => {
                        // this.$router.push({name: 'supplier'})
                    })
        }

    },
    mounted() {


    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
