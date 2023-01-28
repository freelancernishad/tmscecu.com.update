<template>
    <div class="d-flex align-items-start">
        <table border="1" width="50%">
            <thead>
            <tr>
                <th width="50%" class="text-center">Humanities</th>

            </tr>
        </thead>
        <tbody>
            <tr v-for="HumanitiesStudnet in HumanitiesStudnets" :key="HumanitiesStudnet.AdmissionID">
                <td >




                            <b>গ্রুপ: </b>
                            <select  class="group" v-model="students" >
                                <option value="">Select</option>
                                <option value="Humanities">Humanities</option>
                                <option value="Science">Science</option>
                            </select> <br>
                            <b>নতুন রোল: </b><input type="number" class="roll"> <br>
                            <b>রোল: </b>{{ HumanitiesStudnet.StudentRoll }} <br>
                            <b>নাম: </b>{{ HumanitiesStudnet.StudentName }} <br>
                            <b>বিষয়: </b>
                            <select  class="subject"  >
                                <option value="">Select</option>
                                <option value="Agriculture">কৃষি শিক্ষা</option>
                                <option value="Higher_Mathematics">উচ্চতর গণিত</option>
                            </select> <br>

                </td>

            </tr>
        </tbody>
        </table>

        <table border="1" width="50%">
            <thead>
            <tr>

                <th width="50%" class="text-center">Science</th>
            </tr>
        </thead>


        <tbody>
            <tr v-for="ScienceStudnet in ScienceStudnets" :key="ScienceStudnet.AdmissionID">

                <td  >


                            <b>নতুন রোল: </b><input type="number"  class="roll"> <br>
                            <b>রোল: </b>{{ ScienceStudnet.StudentRoll }} <br>
                            <b>নাম: </b>{{ ScienceStudnet.StudentName }} <br>
                            <b>বিষয়: </b><select  class="subject" >
                                <option value="">Select</option>
                                <option value="Agriculture">কৃষি শিক্ষা</option>
                                <option value="Higher_Mathematics">উচ্চতর গণিত</option>
                            </select> <br>


                            <input type="hidden" class="group" value='Science'>
                            <input type="hidden" class="AdmissionID" >


                </td>
            </tr>
        </tbody>
        </table>



    </div>
</template>

<script>
export default {
    created() {
        this.getAllStudents();
        setTimeout(() => {
            this.groupset()
        }, 3000);
    },
    data(){
        return {
            students:{},
            HumanitiesStudnets:[],
            ScienceStudnets:[],
        }
    },
    methods: {
        async getAllStudents(){
            var res = await this.callApi('get',`/api/students/for/change/group?StudentClass=Nine`,[]);
            this.students = res.data
        },
        groupset(){
            this.students.forEach(student => {
                if(student.StudentGroup=='Science'){
                    this.ScienceStudnets.push(student)
                }else
                if(student.StudentGroup=='Humanities'){
                    this.HumanitiesStudnets.push(student)
                }
                console.log(student)
            });
        }
    },
}
</script>
