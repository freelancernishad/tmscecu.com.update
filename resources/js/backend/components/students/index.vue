<template>
    <div>
        <loader v-if="preloader == true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Students</h3>
            <ul>
                <li>
                    <router-link :to="{ name: 'home' }">Home</router-link>
                </li>
                <li>All Students</li>
            </ul>
        </div>
        <!-- Breadcubs Area End Here -->
        <!-- Student Table Area Start Here -->
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <router-link class="btn-fill-md radius-4 text-light bg-orange-red"
                             to="">
                            GO BACK
                        </router-link>
                    </div>
                    <div class="dropdown">



                        <button class="btn-fill-lg font-normal text-light gradient-pastel-green float-right" @click="TransOldTen">Transfer to Old Ten</button>



                    </div>
                </div>
                <div class="row gutters-8">
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <div class="form-group student_class">
                            <select class="form-control" style="width: 100%;" v-model="student_class">
                                <option value="">
                                    SELECT
                                </option>
                                <option>
                                    All
                                </option>
                                <option v-for="classlist in classess">{{ classlist }}</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <div class="form-group student_class">
                            <select class="form-control" style="width: 100%;" v-model="status" id="getthis" required>
                                <option value="">
                                    SELECT
                                </option>
                                <option value="Active">
                                    Active
                                </option>
                                <option value="Pending">
                                    New Applications
                                </option>
                                <option value="Failed">
                                    Failed
                                </option>
                                <option value="Reject">
                                    Reject
                                </option>
                                <option value="Approve">
                                    Application Aproved
                                </option>
                                <option value="old">
                                    Old Students
                                </option>
                            </select>
                        </div>
                    </div>


                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <div class="form-group student_class">
                            <select class="form-control" style="width: 100%;" v-model="year" id="getthis" required>
                                <option value="">SELECT</option>
                                <option>{{ Nextyear }}</option>
                                <option>{{ Currenyear }}</option>
                                <option>{{ Peviousyear }}</option>
                            </select>
                        </div>
                    </div>




                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <button type="submit" class="fw-btn-fill btn-gradient-yellow" @click="search">SEARCH</button>
                    </div>
                </div>



                <div class="row">
                    <div class="d-flex align-items-end col-md-6" v-if="actioncheck != ''">
                        <div class="form-group">
                            <label for="">Action :</label>
                            <select class="form-control" v-model="action" style="width:200px">
                                <option value="">Select</option>
                                <option>Active</option>
                                <option>Pending</option>
                                <option>Reject</option>
                                <!-- <option>Delete</option> -->
                                <option>Approve</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <button class="fw-btn-fill btn-gradient-yellow" @click="actionclick">Action</button>
                        </div>
                    </div>
                    <div v-else class="col-md-6"></div>


                    <form @submit.stop.prevent="searchname" class="form-group col-md-6" style="display: flex;justify-content: space-between;">
                        <!-- <label for="">Search :</label> -->
                        <input type="text" v-model="name"  placeholder="Search By Name" class="form-control" style="    border-right: 0px !important;border-top-right-radius: 0;border-bottom-right-radius: 0;">
                            <button type="button" class="fw-btn-fill btn-gradient-yellow" style="width: 84px;border-top-left-radius: 0;border-bottom-left-radius: 0;" >Search</button>
                    </form>


                </div>





                <a v-if="searchtype == 'filterclass'"
                    class="btn-fill-lg font-normal text-light gradient-pastel-green float-right" target="_blank"
                    :href="'/dashboard/student_list/pdf/' + year + '/' + student_class + '/' + school_id" >Download Student List</a>
                
                <a v-if="searchtype == 'filterclass'" style="margin-right: 11px;"
                    class="btn-fill-lg font-normal text-light gradient-pastel-green float-right" target="_blank"
                    :href="'/dashboard/student_list_stipend/pdf/' + year + '/' + student_class + '/' + school_id" >উপবৃত্তি তালিকা </a>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="8">Class {{ student_class }}</th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" @click="selectAll"
                                                v-model="allSelected">
                                            <label class="form-check-label">#</label>
                                        </div>
                                    </th>
                                    <th>ছবি</th>
                                    <th>নাম</th>
                                    <th class="tablecolhide">শ্রেণী</th>
                                    <th class="tablecolhide">পিতার নাম</th>
                                    <th class="tablecolhide">মাতার নাম</th>



                                  <th class="tablecolhide" v-if="$route.params.status=='Pending'">স্কুল</th>
                                  <th class="tablecolhide" v-else>উপবৃত্তি</th>


                                  <th class="tablecolhide" v-if="$route.params.status=='Pending'">আবেদনের তারিখ</th>
                                    <!-- <th class="tablecolhide" @click="sortby('StudentPhoneNumber')">ফোন</th>  -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="looding">
                                    <td colspan="10" style="    text-align: center;
        background: #042954;
        color: wheat;">Looding...</td>
                                </tr>
                                <tr v-else v-for="(student,index) in students.data" :key="student.id">


                                    <td v-if="$route.params.status=='Pending'">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" v-model="actioncheck"
                                                :value="student.id">
                                            <label class="form-check-label">{{ index+pageNO }}</label>
                                        </div>
                                    </td>

                                    <td v-else>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" v-model="actioncheck"
                                                :value="student.id">
                                            <label class="form-check-label">{{ student.StudentRoll }}</label>
                                        </div>
                                    </td>


                                    <td class="text-center">
                                        <router-link :to="{ name: 'studentImage', params: { id: student.id } }">
                                            <img :id="'student_image' + student.id" class='student_image'
                                                style="    width: 33px !important;height: 34px;border-radius: 50%;"
                                                :src="$asseturl+student.StudentPicture" alt="image"
                                                @error="imageLoadError()">
                                        </router-link>
                                    </td>
                                    <td>{{ student.StudentName }}</td>
                                    <td class="tablecolhide">{{ student.StudentClass }}</td>
                                    <td class="tablecolhide" style="text-transform: uppercase;">{{ student.StudentFatherNameBn }}</td>
                                    <td class="tablecolhide" style="text-transform: uppercase;">{{ student.StudentMotherNameBn }}</td>
                                    <td class="tablecolhide"  v-if="$route.params.status=='Pending'">{{ student.preSchool }}</td>
                                    <td class="tablecolhide" v-else>{{ student.stipend }}</td>
                                    <td class="tablecolhide" v-if="$route.params.status=='Pending'">{{ dateformatGlobal(student.JoiningDate)[3] }}</td>
                                    <!-- <td class="tablecolhide">{{ student.StudentPhoneNumber }}</td> -->
                                    <td>

                                        <button @click="studentView(student, index, $event.target)" class="btn btn-info"><i class="fas fa-eye"></i> View</button>
                                        <router-link class="btn btn-success" :to="{ name: 'studentedit', params: { id: student.id } }"><i class="fas fa-cogs"></i> Edit</router-link>

                                        <!-- <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                                <a class="btn btn-info dropdown-item" target="_blank"
                                                    :href="'/dashboard/student/card/single/' + student.id + '/' + student.school_id" ><i class="fas fa-card"></i> Card</a>



                                                <router-link class="btn btn-info dropdown-item"
                                                    :to="{ name: 'studentview', params: { id: student.id } }"><i
                                                        class="fas fa-eye"></i>
                                                    View</router-link>



                                                <router-link class="btn btn-success dropdown-item"
                                                    :to="{ name: 'studentedit', params: { id: student.id } }"><i
                                                        class="fas fa-cogs"></i> Edit</router-link>
                                            </div>
                                        </div> -->



                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
            </div>
            <div class="card-footer">
                <Pagination :total-rows="TotalRows" :route-name="RouteName" :route-params="RouteParams" :total-page="Totalpage"></Pagination>
            </div>
        </div>
        <!-- <button @click="show">show</button>
    <modal name="imageupload">
        This is my first modal
    </modal> -->

    <b-modal :id="infoModal.id" size="lg" :title="infoModal.title" >


        <div class="rootContainer">

<div class="headerSection">

    <table width='100%' style='margin-bottom:20px' border='0'>
        <tr>
            <td width='110px' style='border:0 !important'>
                <img width='75px'  style='overflow:hidden;float:right' :src='$asseturl+schoolSettings.logo' alt=''>
            </td>
            <td style='border:0 !important;padding-left: 15px;'>
                <p class='fontsize2' style='font-size:30px;    margin-bottom: -10px;'> {{ schoolSettings.SCHOLL_NAME }} </p>
                <p class='fontsize1' style='font-size:20px;margin-bottom: 2px;'> {{ schoolSettings.SCHOLL_ADDRESS }}  </p>
                <p class='fontsize1' style='font-size:12px;margin-bottom: 2px;'>website: www.tepriganjhighschool.edu.bd </p>
            </td>
            <td style='border:0 !important'>
                <label for="fileupload" id="fileChoiceLable">
            <img style="    width: 150px;" :src="$asseturl+infoModal.content.StudentPicture"  alt="" />
        </label>
            </td>


        </tr>
    </table>




    <a target="_blank" :href="'/dashboard/student/info/download/'+infoModal.content.id" class="btn btn-info">Download</a>


    <table class="tableTag" width="100%" border="" style="margin-top:20px ;margin-bottom:20px ;">

        <tr>
            <th>শ্রেণিঃ {{ infoModal.content.StudentClass }}</th>
            <th>ধর্মঃ {{ infoModal.content.StudentReligion }}</th>
            <th>লিঙ্গঃ {{ infoModal.content.StudentGender }}</th>
            <th>গ্রুপঃ  <span v-if="infoModal.content.StudentClass=='Nine' || infoModal.content.StudentClass=='Ten'">{{ infoModal.content.StudentGroup }}</span> <span v-else>N/A</span> </th>
        </tr>

        <tr>
            <th>শিক্ষার্থীর নাম (বাংলা) </th>
            <th>শিক্ষার্থীর নাম (English) </th>
            <th>শিক্ষার্থীর জন্ম তারিখ </th>
            <th>শিক্ষার্থীর জন্ম নিবন্ধন নং </th>

        </tr>
        <tr>
            <td> {{ infoModal.content.StudentName }}</td>
            <td style="text-transform:uppercase"> {{ infoModal.content.StudentNameEn }}</td>
            <td> {{ dateformatGlobal(infoModal.content.StudentDateOfBirth)[3] }}</td>
            <td> {{ infoModal.content.StudentBirthCertificateNo }}</td>

        </tr>
        <tr>
            <th>পিতার নাম (বাংলা) </th>
            <th>পিতার নাম (English) </th>
            <th>পিতার জাতীয় পরিচয়পত্র নং </th>
            <th>পিতার জন্ম নিবন্ধন নং </th>

        </tr>
        <tr>
            <td>{{ infoModal.content.StudentFatherNameBn }}</td>
            <td style="text-transform:uppercase">{{ infoModal.content.StudentFatherName }}</td>
            <td>{{ infoModal.content.StudentFatherNid }}</td>
            <td>{{ infoModal.content.StudentFatherBCN }}</td>

        </tr>
        <tr>
            <th>মাতার নাম (বাংলা) </th>
            <th>মাতার নাম (English) </th>
            <th>মাতার জাতীয় পরিচয়পত্র নং </th>
            <th>মাতার জন্ম নিবন্ধন নং </th>

        </tr>
        <tr>
            <td>{{ infoModal.content.StudentMotherNameBn }}</td>
            <td style="text-transform:uppercase">{{ infoModal.content.StudentMotherName }}</td>
            <td>{{ infoModal.content.StudentMotherNid }}</td>
            <td>{{ infoModal.content.StudentMotherBCN }}</td>

        </tr>

        <tr>
            <th>পিতা/মাতা জীবিত না থাকলে অভিভাবকের নাম (বাংলা)</th>
            <th>অভিভাবকের নাম (English) </th>
            <th>অভিভাবকের জাতীয় পরিচয়পত্র নং </th>
            <th>অভিভাবকের সাথে শিক্ষার্থীর সম্পর্ক </th>
        </tr>
        <tr>
            <td>{{ infoModal.content.guardNameBn }}</td>
            <td style="text-transform:uppercase">{{ infoModal.content.guardName }}</td>
            <td>{{ infoModal.content.guardNid }}</td>
            <td >{{ infoModal.content.guardRalation }}</td>

        </tr>
        <tr>
            <th>অভিভাবকের পেশা</th>


            <td colspan="3">{{ infoModal.content.StudentFatherOccupation }}</td>
        </tr>
        <tr>
            <th>অভিভাবকের মাসিক আয়</th>


            <td colspan="3">{{ infoModal.content.parentEarn }}</td>
        </tr>
        <tr>
            <th>মোবাইল নাম্বার</th>


            <td colspan="3">{{ infoModal.content.StudentPhoneNumber }}</td>
        </tr>

        <tr>
            <th colspan="2">শিক্ষার্থীর ধরন</th>
            <th colspan="2">শিক্ষার্থীর কোটা</th>

        </tr>
        <tr>
            <td colspan="2">{{ infoModal.content.StudentCategory }}</td>
            <td colspan="2">{{ infoModal.content.StudentKota }}</td>


        </tr>

        <tr>
            <th colspan="2">পূর্বে অধ্যায়নরত স্কুল এর নাম</th>
            <th colspan="2">পূর্বে অধ্যায়নরত শ্রেণি</th>

        </tr>
        <tr>
            <td colspan="2">{{ infoModal.content.preSchool }}</td>
            <td colspan="2">{{ infoModal.content.preClass }}</td>
        </tr>



        <tr>
            <th>কোন ভাই/বোন অত্র প্রতিষ্ঠানে অধ্যয়নরত কি না</th>
            <th>অধ্যয়নরত ভাই/বোনের নাম</th>
            <th>অধ্যয়নরত ভাই/বোনের শ্রেণি</th>
            <th>অধ্যয়নরত ভাই/বোনের রোল</th>
        </tr>
        <tr>
            <td>{{ infoModal.content.bigBroSis }}</td>
            <td>{{ infoModal.content.bigBroSisName }}</td>
            <td>{{ infoModal.content.bigBroSisClass }}</td>
            <td>{{ infoModal.content.bigBroSisRoll }}</td>

        </tr>
        <tr>
            <th>ঠিকানা</th>
            <td colspan="3">বিভাগঃ- {{ infoModal.content.division }}, জেলাঃ- {{ infoModal.content.district }}, উপজেলাঃ- {{ infoModal.content.upazila }}, ইউনিয়নঃ- {{ infoModal.content.union }}, পোস্ট অফিসঃ- {{ infoModal.content.post_office }}({{ infoModal.content.AreaPostalCode }}), গ্রামঃ- {{ infoModal.content.StudentAddress }}</td>
        </tr>


    </table>



</div>

</div>

            <template #modal-footer>
<div></div>
      </template>
        </b-modal>






    </div>
</template>
<script>
export default {
    created() {


        if (this.$route.params.classname && this.$route.params.status) {
            this.student_class = this.$route.params.classname
            this.status = this.$route.params.status
            this.searchtype = 'filterclass'
        }



    },
    data() {
        return {
            students: {},
            studentsall: [],

            actioncheck: [],
            action: "",
            ASSETURL: '',
            searchtype: "",
            name: "",
            student_class: "All",
            status: "Active",


            Nextyear: new Date().getFullYear()+1,
            Currenyear: new Date().getFullYear(),
            Peviousyear: new Date().getFullYear()-1,
            year: new Date().getFullYear(),
            timeout: null,
            allSelected: false,
            field: '',
            sorttype: '',
            icon: '',
            looding: true,
            preloader: true,


            PerPageData: '20',
            TotalRows: '1',
            Totalpage: [],
            RouteName:'',
            RouteParams:{},
            pageNO: 1,

            infoModal: {
                id: 'info-modal',
                title: '',
                content: {},
                content_id: '',
            },



        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                if(this.$route.params.classname && this.$route.params.status){
                    this.student_class = this.$route.params.classname
                    this.status = this.$route.params.status
                }else{
                    this.student_class = "All"
                    this.status = "Active"
                }
                this.allstudents()
            },
            deep: true
        }
    },
    methods: {
        imageLoadError() {
            return true;
        },
        selectAll: function () {
            this.actioncheck = [];
            if (!this.allSelected) {
                this.studentsall.forEach(student => {
                    this.actioncheck.push(student.id);
                })
            }
        },
        sortby(field) {
            this.field = field
            if (this.sorttype == '') {
                this.sorttype = '-'
                this.icon = 'fas fa-sort-amount-up-alt fa-fw'
            } else {
                this.sorttype = ''
                this.icon = 'fas fa-sort-amount-down-alt fa-fw'
            }
            this.allstudents('short')
        },
      async  allstudents(type='') {
       if(type=='search') this.looding = true;
       if(type=='') this.preloader = true;
            var page = 1;
            if (this.$route.query.page) page = this.$route.query.page;

            clearTimeout(this.timeout);
            var url = '';
            var sort = 'id';

            var classsearch = '';

            if(this.$route.params.status=='Pending'){
                this.sorttype = '-';
                this.field = 'id';
            }


            if (this.field != '') {
                sort = `sort=${this.sorttype}${this.field}`;
            }
            if (this.searchtype == '') {
                url = `/api/students/list?page=${page}&${sort}&filter[school_id]=${this.school_id}&filter[StudentStatus]=${this.status}`;
            } else if (this.searchtype == 'filterclass') {
                if (this.student_class == 'All') {
                    classsearch = '';
                } else {
                    classsearch = this.student_class;
                }
                url = `/api/students/list?page=${page}&filter[StudentStatus]=${this.status}&filter[StudentClass]=${classsearch}&filter[Year]=${this.year}&filter[school_id]=${this.school_id}&${sort}`;
            } else if (this.searchtype == 'filtername') {
                url = `/api/students/list?page=${page}&filter[StudentName]=${this.name}&${sort}&filter[school_id]=${this.school_id}&filter[StudentStatus]=${this.status}`;
            }


            var res = await this.callApi('get',`${url}`,[]);

            this.students = res.data
            this.studentsall = res.data.data

            this.TotalRows = `${res.data.total}`;
            this.PerPageData = `${res.data.per_page}`;
            this.Totalpage = res.data.links
            if(this.$route.params.classname && this.$route.params.status){

                this.RouteName = 'studentssearch'
                this.RouteParams = { classname: this.student_class, status: this.status }
            }else{

                this.RouteName = 'students'
            }

            if(page==1){

                this.pageNO = 1;
                }else{
                this.pageNO = (page-1)*this.PerPageData+1;

                }

            this.looding = false
             this.preloader = false;

            // this.timeout = setTimeout(() => {

            //     axios.get(url)
            //         .then(({ data }) => {
            //
            //             this.students = data
            //             this.studentsall = data.data

            //         })
            //         .catch()
            // }, 300);
        },
        search() {
            if (this.$router.currentRoute.path === `/school/students/${this.student_class}/${this.status}`) {
            } else {
                this.$router.push({ name: 'studentssearch', params: { classname: this.student_class, status: this.status } })
            }
            this.looding = true
            this.searchtype = "filterclass";
            this.allstudents('search')
        },
        searchname() {
            this.searchtype = "filtername";
            this.allstudents('search')
        },










        actionclick() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes, ${this.action} it!`
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(`/api/student/${this.action}`, this.actioncheck)
                        .then(({ data }) => {
                            if (this.action == 'Delete') {
                                Notification.customdelete(`Your data has been ${this.action}.`);
                            } else {
                                Notification.customsucess(`Your data has been move to ${this.action}.`);
                            }
                            this.allstudents();
                        })
                        .catch(() => {
                            // this.$router.push({name: 'supplier'})
                        })
                }
            })
        },



        TransOldTen() {
            Swal.fire({
                title: 'Are you sure?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes!`
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post(`/api/student/transferto/old`, [])
                        .then(({ data }) => {
                                Notification.customsucess(`Successfully Done`);
                            this.allstudents();
                        })
                        .catch(() => {
                            // this.$router.push({name: 'supplier'})
                        })
                }
            })
        },




        studentView(item, index, button){

            // this.infoModal.title = `${item.applicant_name}`
            this.infoModal.content = item


            // console.log(item)


            this.$root.$emit('bv::show::modal', this.infoModal.id, button)


        }





    },
    mounted() {

        this.allstudents();
    }
}
</script>
</script>
<style lang="css" >
#img_size {
    width: 40px;
}
#imageUpload {
    display: none;
}
#profileImage {
    cursor: pointer;
}
#profile-container {
    width: 150px;
    height: 150px;
    overflow: hidden;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
}
#profile-container img {
    width: 150px;
    height: 150px;
}




.fileUpload {
    width: 195px;
    height: 195px;
    border: 1px solid;
	position: absolute;
    top: 0;
    right: 0;
}
#fileChoiceLable{
	width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}




        .rootContainer {
            margin: 25px;
            border: 1px solid;
            padding: 5px 21px;
        }
        .tableTag, .tableTag td, .tableTag th {
            border: 1px solid;
            border-collapse: collapse;
            padding: 3px 7px;
        }
        td.tableRowHead {
            background: #d1d1d1;
        }

        td {
            height: 20px;
        }


        .modal-backdrop {
            background-color: #0000007d !important;
        }


</style>
