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

                        <!-- <input type="text" v-model="form.studentDatas[student.id]"> -->
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
            form:{
                studentDatas:[]
            },
        }
    },
    methods: {
        selectAll: function () {
            this.actioncheck = [];
            this.form.studentDatas = [];
            if (!this.allSelected) {
                this.students.forEach((student ,index)=> {
                    this.actioncheck.push(student.id);

                    this.form.studentDatas.push(student.id);




                })
            }


            // console.log(this.form.studentDatas);

        },
        async getNewStudents(){
            var url = '';
            url = `/api/get/pending/student?StudentStatus=Pending&class=Six`;
            var res = await this.callApi('get',`${url}`,[]);
            this.students = res.data
        },
        async Publish(){

            this.form['school_id'] = this.school_id;
            this.form['year'] = this.year;
            this.form['actioncheck'] = this.actioncheck;


            var res = await this.callApi('post',`/api/approve/pending/student`,this.form);

            this.getNewStudents();

            setTimeout(() => {
                this.selectAll();
            }, 2000);

        }
    },


    mounted() {
        this.getNewStudents();

        setTimeout(() => {
            this.selectAll();
        }, 2000);

    },


}
</script>
