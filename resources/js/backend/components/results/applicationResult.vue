<template>
    <div>

        <button @click="Publish" v-if="$route.query.status" class="btn btn-success">Pending</button>
        <button @click="Publish" v-else class="btn btn-success">Approve</button>
        <router-link :to="{name:'applicationResult',query:{status:'Approve'}}">Approved List</router-link>
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

            <button @click="Publish" v-if="$route.query.status" class="btn btn-success">Pending</button>
        <button @click="Publish" v-else class="btn btn-success">Approve</button>



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
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                console.log(this.$route.query.status)
                this.getNewStudents();

            },
            deep: true
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
            var status = 'Pending';
            if(this.$route.query.status)status = 'Approve';
            var url = '';
            url = `/api/get/pending/student?StudentStatus=${status}&class=Six`;
            var res = await this.callApi('get',`${url}`,[]);
            this.students = res.data
        },
        async Publish(){

            this.form['school_id'] = this.school_id;
            this.form['year'] = this.year;
            this.form['actioncheck'] = this.actioncheck;
            if(this.$route.query.status){
                this.form['status'] = 'Pending';
            }else{
                this.form['status'] = 'Approve';

            }
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
