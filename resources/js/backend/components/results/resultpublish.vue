<template>
    <div>

            <table width="100%" class="table">

                <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" @click="selectAll"
                                    v-model="allSelected">
                                <label class="form-check-label">নতুন রোল</label>
                            </div>
                        </th>
                        <th>বর্তমান রোল</th>
                        <th>ছাত্র/ছাত্রীর নাম</th>
                        <th>ব্যর্থ হয়েছি</th>
                        <th>মোট নাম্বার</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(result,index) in results" :key="index">
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" v-model="actioncheck"
                                    :value="result.roll">
                                <label class="form-check-label">{{ index+1 }}</label>
                            </div>
                        </td>
                        <td>{{ result.roll }}</td>
                        <td>{{ result.name }}</td>
                        <td>{{ result.failed }}</td>
                        <td>{{ result.total }}</td>
                    </tr>
                </tbody>


            </table>


            <button @click="Publish">Submit</button>




    </div>
</template>

<script>
export default {

    data(){
        return{
            actioncheck:[],
            allSelected: false,
            year: new Date().getFullYear(),
            results:{},
            form:{},
        }
    },
    methods: {
        selectAll: function () {
            this.actioncheck = [];
            if (!this.allSelected) {
                this.results.forEach((result ,index)=> {
                    this.actioncheck.push(result.roll);
                })
            }
        },
        async getResult(){
            var url = '';
            url = `/api/results?school_id=${this.$route.params.school_id}&class=${this.$route.params.student_class}&year=${this.year}&exam_name=${this.examcomvert(this.$route.params.examType)}&group=${this.$route.params.group}`;
            var res = await this.callApi('get',`${url}`,[]);
            this.results = res.data
        },
        async Publish(){

            this.form['school_id'] = this.$route.params.school_id;
            this.form['class'] = this.$route.params.student_class;
            this.form['year'] = this.year;
            this.form['exam_name'] = this.examcomvert(this.$route.params.examType);
            this.form['group'] = this.$route.params.group;
            this.form['actioncheck'] = this.actioncheck;


            var res = await this.callApi('post',`/api/results/publish/list`,this.form);
        }
    },


    mounted() {
        this.getResult();
    },


}
</script>
