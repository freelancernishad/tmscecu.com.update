<template>
    <div class="container mt-5 mb-5">
        <router-link style="float: right;padding: 0 31px;" :to="{ name: 'logout' }"><i class="flaticon-turn-off"></i>Logout</router-link>
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
                        <button class="btn btn-info" v-if="student.StudentStatus=='Approve'" @click="permission(student.id)">Permit this</button>
                        <button class="btn btn-info" v-else disabled>Permited</button>
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
            students:{}
        }
    },
    methods: {
        async getStudent(){
            var res = await this.callApi('get',`/api/get/pending/student?StudentStatus=Approve&StudentStatus2=permited`,[]);
            this.students = res.data
        },

        async permission(id){


            Swal.fire({
                title: 'Are you sure?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes!`
            }).then(async (result) => {
                if (result.isConfirmed) {

                    var res  = await this.callApi('post',`/api/student/permission?id=${id}`,[]);
                    this.getStudent();
                    Notification.customSuccess(`Successfully Done`);

                }
            })


        }



    },
    mounted() {
        this.getStudent();
    }
}
</script>
