<template>



<div class="row">
<div class="mainBody col-md-9 mt-3">





	<div id="contact-form" class="contact-form">
		<h1 class="contact-form_title">যোগাযোগ</h1>
		<div class="separator"></div>

		<div v-if="isSending" class="loading">Sendig...</div>

		<form class="form" @submit.stop.prevent="onSubmit">

        <div class="form-group">
            <label for="">নাম</label>
			<input required name="name" class="form-control" v-model='contact.name' placeholder="নাম" type="text" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="">বিষয়</label>
			<select name="subject" class="form-control" v-model="contact.subject">
			<option value="">চিহ্নিত করুন</option>
			<option v-for="(sonod, r) in SonodNames" :key="'dropdown' + r" :value="sonod.bnname">{{ sonod.bnname }}</option>
			<option value="অন্যান্য">অন্যান্য</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">ইমেইল</label>
			<input required name="email" class="form-control" v-model="contact.email" placeholder="ইমেইল" type="email" autocomplete="off">
        </div>


        <div class="form-group">
            <label for="">মেসেজ</label>
			<textarea name="message" class="form-control" v-model="contact.message" rows="4" placeholder="মেসেজ"></textarea>
        </div>



		   <button class="button">Send</button>
		</form>
	</div>




</div>



   <side-bar></side-bar>




</div>

</template>

<script>
export default {
 	data() {
        return{
           contact: {

			name: '',
			subject: '',
			email: '',
			message: '',
		    },

		isSending: false
        }

	},
created() {

},
	methods: {

		/**
		 * Clear the form
		 */
		clearForm() {
			for (let field in this.contact) {
				this.contact[field] = ''
			}
		},

		/**
		 * Handler for submit
		 */
	        async onSubmit(){

            this.contact['union']= this.getUnion;
// console.log(this.contact)
            var res = await this.callApi('post',`/api/contact`,this.contact);
            console.log(res);






             }





	}

}
</script>
<style>
.contact-form {
	font-family: 16px;
	margin: 0 auto;
	max-width: 600px;
	width: 100%;
}

.contact-form .separator {
	border-bottom: solid 1px #ccc;
	margin-bottom: 15px;
}

.contact-form .form {
	display: flex;
	flex-direction: column;
	font-size: 16px;
}

.contact-form_title {
	color: #333;
	text-align: left;
	font-size: 28px;
}


.contact-form textarea {
	resize: none;
}

.contact-form .button {
	background: #da552f;
	border: solid 1px #da552f;
	color: white;
	cursor: pointer;
	padding: 10px 50px;
	text-align: center;
	text-transform: uppercase;
}

.contact-form .button:hover {
	background: #ea532a;
	border: solid 1px #ea532a;
}

.contact-form input[type="email"],
.contact-form input[type="text"],
.contact-form textarea,
.contact-form .button {
	font-size: 15px;
	border-radius: 3px
}
</style>
