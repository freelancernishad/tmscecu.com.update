<template>
    <div  class="container mt-5 mb-5">


          <!-- Breadcubs Area Start Here -->
            <div class="breadcrumbs-area">
                <h3>ফর্ম পুরন</h3>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>ফর্ম পুরন</li>
                </ul>
            </div>
            <!-- Breadcubs Area End Here -->


            <router-link style="float: right;padding: 0 31px;" :to="{ name: 'logout' }"><i class="flaticon-turn-off"></i>Logout</router-link>



            <a target="_blank" href="/dashboard/get/form/fillup/students" class="btn btn-info">Pdf Report Daownload</a>

            <div class="card">
                <div class="card-body">



        <table class="table">

<thead>
    <tr>
        <th>SL</th>
        <th>Application Id</th>
        <th>Roll</th>
        <th>Name</th>
        <th>Class</th>
        <th>Group</th>
        <th>Father Name</th>
        <th>Mother Name</th>
    </tr>
</thead>

<tbody>
    <tr v-for="(student,index) in students" :key="index">
        <td>{{ index+1 }}</td>
        <td>{{ student.AdmissionID }}</td>
        <td>{{ student.StudentRoll }}</td>
        <td>{{ student.StudentName }}</td>
        <td>{{ student.StudentClass }}</td>
        <td>{{ student.StudentGroup }}</td>
        <td>{{ student.StudentFatherNameBn }}</td>
        <td>{{ student.StudentMotherNameBn }}</td>

    </tr>
</tbody>

</table>

                </div>
            </div>




    </div>
</template>


<script>
export default {
    data(){
        return{
            students:{},
        }
    },
    methods: {
        async getStudent(){


            var res = await this.callApi('get',`/api/get/form/fillup/students`,[]);
            this.students = res.data
        },
    },

    mounted() {
        this.getStudent();
    },

}
</script>
