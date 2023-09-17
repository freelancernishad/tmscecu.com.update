<template>
    <div class="container mt-5 mb-5">
        <router-link style="float: right;padding: 0 31px;" :to="{ name: 'logout' }"><i class="flaticon-turn-off"></i>Logout</router-link>



        <div class="form-group">
            <label for="">Search</label>
            <input type="text" class="form-control" v-model="form.AdmissionID">
        </div>

        <div class="form-group">
            <label for=""></label>
            <button class="btn btn-info" @click="getStudent">Search</button>
        </div>


        <table class="table">

            <thead>
                <tr>
                    <th>SL</th>
                    <th>প্রশংসা পত্র নং</th>
                    <th>নাম</th>
                    <th>গ্রুপ</th>
                    <th>এসএসসি রোল</th>
                    <th>এসএসসি রেজিঃ</th>
                    <th>এসএসসি রেজাল্ট</th>
                    <th>পিতার নাম</th>
                    <th>মাতার নাম</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(student,index) in students" :key="index">
                    <td>{{ index+1 }}</td>
                    <td>{{ student.sl }}</td>
                    <td>{{ student.name }}</td>
                    <td>{{ student.group }}</td>
                    <td>{{ student.sscRoll }}</td>
                    <td>{{ student.sscReg }}</td>
                    <td>{{ student.sscGpa }}</td>
                    <td>{{ student.fatherName }}</td>
                    <td>{{ student.motherName }}</td>
                    <td>

                        <!-- <a class="btn btn-info" target="_blank" style="font-size: 17px;" :href="`/student/tc/${student.token}`" >ডাউনলোড করুন</a> -->

                    </td>
                </tr>
            </tbody>

        </table>



    </div>
</template>

<script>

export default {

    data(){
        return {
            students:{},
            form:{
                AdmissionID:''
            }
        }
    },
    methods: {
        async getStudent(){
            var search  = '';
            if(this.form.AdmissionID) {
                search = `search=${this.form.AdmissionID}`
            }

            var res = await this.callApi('get',`/api/tc?${search}`,[]);
            this.students = res.data
        },





    },
    mounted() {
        this.getStudent();
    }
}
</script>

<style>
.swal-wide{
    width:400px !important;
}
div#swal2-content {
    font-size: 19px;
}
</style>
