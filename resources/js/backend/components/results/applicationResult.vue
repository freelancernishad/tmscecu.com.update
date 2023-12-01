<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
<div class="breadcrumbs-area">
        <h3>Application Result</h3>
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>Application Result</li>
        </ul>
    </div>



    <div class="card">
        <div class="card-header">
            <a target="_blank" href="/addmission/approve/Result" class="btn btn-info">Pdf download</a>

            <form @submit.stop.prevent="getNewStudents" >

                <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group student_class">
                                        <label>Class:</label>
                                        <select class="form-control" style="width: 100%;" v-model="filterdata.student_class" required>
                                            <option value="">
                                                SELECT
                                            </option>
                                             <option v-for="classlist in classess">{{ classlist }}</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3"  v-if="filterdata.student_class=='Nine' || filterdata.student_class=='Ten'" >
                                <div class='form-group' >
                                    <label>Group:</label>
                                    <select class='form-control' style='width: 100%;' v-model='filterdata.group' id='group' required>
                                    <option value=''>select</option>
                                    <option v-for="group in groups">{{ group }}</option>


                                    </select></div>
                                </div>
                                <div class="col-md-3 customFlex" style="margin-top:11px">
                                    <div class="form-group student_class mt-3">
                                        <input type="submit"  value="Search"   class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"   />
                                    </div>
                                </div>
                                </div>

            </form>

        </div>
        <div class="card-body">



        <button @click="Publish" v-if="$route.query.status" class="btn btn-success">Pending</button>
        <button @click="Publish" v-else class="btn btn-success">Approve</button>


        <router-link class="btn btn-info" :to="{name:'applicationResult',query:{status:'Approve',studentClass:filterdata.student_class,studentGroup:filterdata.group}}">Approved List</router-link>


        <router-link class="btn btn-info" :to="{name:'applicationResult'}">Pending List</router-link>


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
                                    <th class="tablecolhide">গ্রুপ</th>
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

                                    <td class="tablecolhide"><span v-if="student.StudentClass=='Nine' || student.StudentClass=='Ten'">{{ student.StudentGroup }}</span><span v-else>N/A</span></td>

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
    </div>


    </div>
</template>

<script>
export default {

    data(){
        return{
            actioncheck:[],
            preloader: false,
            allSelected: false,
            year: new Date().getFullYear(),
            students:{},
            form:{
                studentDatas:[]
            },
            filterdata:{
                student_class:'Six',
                group:'Humanities',
            }
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
            this.preloader = true
            var status = 'Pending';
            if(this.$route.query.status)status = 'Approve';
            var url = '';
            url = `/api/get/pending/student?StudentStatus=${status}&class=${this.filterdata.student_class}&group=${this.filterdata.group}`;
            var res = await this.callApi('get',`${url}`,[]);
            this.students = res.data
            this.preloader = false
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
        this.all_list('groups');
        setTimeout(() => {
            this.selectAll();
        }, 2000);

    },


}
</script>
