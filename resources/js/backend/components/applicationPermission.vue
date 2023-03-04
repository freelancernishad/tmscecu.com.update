<template>
    <div class="container mt-5 mb-5">
        <router-link style="float: right;padding: 0 31px;" :to="{ name: 'logout' }"><i class="flaticon-turn-off"></i>Logout</router-link>



        <div class="form-group">
            <label for="">Application Id</label>
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
                    <th>Application Id</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Group</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="(student,index) in students" :key="index">
                    <td>{{ index+1 }}</td>
                    <td>{{ student.AdmissionID }}</td>
                    <td>{{ student.StudentName }}</td>
                    <td>{{ student.StudentClass }}</td>
                    <td>{{ student.StudentGroup }}</td>
                    <td>{{ student.StudentFatherNameBn }}</td>
                    <td>{{ student.StudentMotherNameBn }}</td>
                    <td>

                        <button class="btn btn-info" style="font-size: 17px;" v-if="student.StudentStatus=='permited'" @click="permission(student.id,'active')">ভর্তি নিশ্চিত করুন</button>

                        <button class="btn btn-danger" style="font-size: 17px;" v-if="student.StudentStatus=='permited'" @click="permission(student.id,'reject')">ভর্তি বাতিল করুন</button>

                        <button class="btn btn-info" style="font-size: 17px;" v-else disabled>ভর্তি নিশ্চিত হয়েছে</button>
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
                search = `&search=${this.form.AdmissionID}`
            }



            var res = await this.callApi('get',`/api/get/pending/student?StudentStatus=permited${search}`,[]);
            this.students = res.data
        },

        async permission(id,status){

            var txt = '';
            if(status=='reject'){
                txt = 'ভর্তি বাতিল করতে Yes বাটন এ চাপ দিন';
            }else{
                txt = 'ভর্তি করতে নিশ্চিত থাকলে Yes বাটন এ চাপ দিন';
            }

            Swal.fire({
                title: 'Are you sure?',
                text: txt,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                customClass: 'swal-wide',
                confirmButtonText: `Yes!`,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(async (result) => {
                if (result.isConfirmed) {

                    var res  = await this.callApi('post',`/api/student/permission?id=${id}?status=${status}`,[]);
                    var gr = '';
                    if(res.data.StudentClass=='Nine' || res.data.StudentClass=='Ten' ){
                        gr = `Group ${res.data.StudentGroup}`;

                    }
                    Swal.fire({
                        title: 'Success',
                        text: `${res.data.StudentName} class ${res.data.StudentClass} ${gr} এ ${res.data.StudentRoll} নিয়ে ভর্তি সম্পূর্ণ করেছে।`,
                        icon: 'success',
                        customClass: 'swal-wide',
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    })
                    this.getStudent();


                }
            })


        }



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
