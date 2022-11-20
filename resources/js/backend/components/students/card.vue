<template>
    <div>

<div class="" id="add_new_students">
	<div class="student-header pt-3">
		<div class="student-header pt-3">
			<font>
				<h3 class="pl-3">Student Card Download</h3>
			</font>
		</div>
		<div class="db-student-list mt-5" id="search">
			<div class="pt-3 pb-3 pl-3 pr-3">



                    <div class="form-group">
                            <label> Class</label>
									<select class="form-control" v-model="classname" required >
										<option value="">SELECT</option>
    <option v-for="classlist in classess">{{ classlist }}</option>
									</select>
                                 </div>


					<button @click="formsubmit" class="btn-fill-lg font-normal no-radius text-light gradient-orange-peel" id="send_sms">Download Card</button>

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


            classname:null,
        }
    },

    methods: {

formsubmit(){

    window.location.href = `/dashboard/student/card/class/${this.classname}/${this.school_id}`;

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
