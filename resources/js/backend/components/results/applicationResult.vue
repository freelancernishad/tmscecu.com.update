<template>
    <div>

        <button @click="Publish" class="btn btn-success">Approve</button>
            <table width="100%" class="table">

                <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" @click="selectAll"
                                    v-model="allSelected">
                                <label class="form-check-label">ক্রমিক নং</label>
                            </div>
                        </th>



                                    <th>নাম</th>
                                    <th class="tablecolhide">শ্রেণী</th>
                                    <th class="tablecolhide">পিতার নাম</th>
                                    <th class="tablecolhide">মাতার নাম</th>

                                  <th class="tablecolhide">ঠিকানা</th>
                                  <th class="tablecolhide">আবেদনের তারিখ</th>


                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(student,index) in students" :key="index">

                        <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" v-model="actioncheck"
                                                :value="student.id">
                                            <label class="form-check-label">{{ index+1 }}</label>
                                        </div>
                                    </td>




                                    <td>{{ student.StudentName }}</td>
                                    <td class="tablecolhide">{{ student.StudentClass }}</td>
                                    <td class="tablecolhide" style="text-transform: uppercase;">{{ student.StudentFatherNameBn }}</td>
                                    <td class="tablecolhide" style="text-transform: uppercase;">{{ student.StudentMotherNameBn }}</td>
                                    <td class="tablecolhide">{{ student.StudentAddress }}</td>
                                    <td class="tablecolhide">{{ dateformatGlobal(student.JoiningDate)[3] }}</td>
                    </tr>
                </tbody>


            </table>


            <button @click="Publish" class="btn btn-success">Approve</button>




    </div>
</template>

<script>
export default {

    data(){
        return{
            actioncheck:[],
            allSelected: false,
            year: new Date().getFullYear(),
            students:{},
            form:{},
        }
    },
    methods: {
        selectAll: function () {
            this.actioncheck = [];
            if (!this.allSelected) {
                this.students.forEach((student ,index)=> {
                    this.actioncheck.push(student.id);
                })
            }
        },
        async getNewStudents(){
            var url = '';
            url = `/api/get/pending/student?StudentStatus=Pending&class=Six`;
            var res = await this.callApi('get',`${url}`,[]);
            this.students = res.data
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
        this.getNewStudents();
    },


}
</script>
