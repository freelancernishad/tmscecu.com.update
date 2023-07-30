<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>

                <div class="container">
                    <h2 class="ms-2 mt-2">পেমেন্ট</h2>
                    <div class="monthly_fee">
                        <div class="other">
                            <div class='form-group'>
                                <label>গ্রুপ</label>
                                <select class='form-control' style='width: 100%;' v-model='form.StudentGroup'
                                    id='group' required>
                                    <option value=''>select</option>
                                    <option v-for="(group, ind) in groups" :key="'group' + ind">{{ group }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">রোল</label>
                                <input type="text" v-model="form.StudentRoll" class="form-control">
                            </div>


                            <div class="form-group">
                                <label for="">সাল</label>
                                <input type="text" v-model="form.year" class="form-control">
                            </div>


                        </div>
                    </div>
                    <button type="button" class="btn btn-info" @click="PaymentSearch">খুঁজুন</button>
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
            form: {
                student_class: 'Ten',
                StudentGroup: 'Humanities',
                StudentRoll: '',
                year: '',
            },
            student: {},

            searched: 0,
        }
    },
    methods: {
        async PaymentSearch() {

            this.preloader = true
            var res = await this.callApi('post', `/api/student/data/search`, this.form);

            this.preloader = false
        }
    },
    mounted() {
        this.all_list('groups');
    }
}
</script>
<style scoped>

</style>
