<template>
    <div>
        <loader v-if="preloader == true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <div class="breadcrumbs-area">
            <h3>Onlineexam</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Onlineexam</li>
            </ul>
        </div>
        <div class="card height-auto">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <router-link class="btn-fill-md radius-4 text-light bg-orange-red"
                            v-if="" to="">
                            GO BACK
                        </router-link>
                    </div>
                    <div class="dropdown">
                        <router-link class="btn-fill-md text-light bg-dark-pastel-green float-right"
                            v-show="$localStorage.getItem('role') == 'admin' || $localStorage.getItem('role') == 'teacher' ? true : false"
                            style="display:none" :to="{ name: 'onlineexamnew' }">Add New</router-link>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div></div>
                    <div class="form-group">
                        <label for="">Search :</label>
                        <input type="text" v-model="title" @keyup="searchTitle" placeholder="Search By Title"
                            class="form-control">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table display data-table text-nowrap" id="tableid">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input checkAll">
                                        <label class="form-check-label">SL</label>
                                    </div>
                                </th>

                                <th>Class</th>
                                <th>Group</th>
                                <th>Subject</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Duration</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="looding">
                                <td colspan="8" style="    text-align: center;
    background: #042954;
    color: wheat;">Looding...</td>
                            </tr>
                            <tr v-else v-for="(onlineexam, index) in onlineexams.data">
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">{{ index + 1 }}</label>
                                    </div>
                                </td>
                                <td>{{ onlineexam.class }}</td>
                                <td>{{ onlineexam.group }}</td>
                                <td>{{ onlineexam.subject }}</td>
                                <td>{{ dataformater(onlineexam.start_date) }}</td>
                                <td>{{ dataformater(onlineexam.end_date) }}</td>
                                <td>{{ onlineexam.duration }} Min</td>



                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <router-link class="dropdown-item"
                                                :to="{ name: 'onlineexamView', params: { id: onlineexam.id } }"><i
                                                    class="fas fa-eye"></i> View All</router-link>
                                            <router-link class="dropdown-item"
                                                v-show="$localStorage.getItem('role') == 'admin' || $localStorage.getItem('role') == 'teacher' ? true : false"
                                                style="display:none"
                                                :to="{ name: 'onlineexamEdit', params: { id: onlineexam.id } }"><i
                                                    class="fas fa-cogs"></i> Edit</router-link>
                                            <span @click="actionclick(onlineexam.id)"
                                                v-show="$localStorage.getItem('role') == 'admin' || $localStorage.getItem('role') == 'teacher' ? true : false"
                                                style="display:none" class="dropdown-item"><i
                                                    class="fas fa-trash-alt fa-fw"></i> Delete</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
             
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    created() {

        this.ASSETURL = ASSETURL
        this.studentOrteacher_id = this.$localStorage.getItem('teacherOrstudent');
        this.studentclass = this.$localStorage.getItem('classname');
        if (this.$localStorage.getItem('role') == 'student' || this.$localStorage.getItem('role') == 'parent') {
            this.status = 'Published';
        }
    },
    data() {
        return {
            onlineexams: {},

            studentclass: '',
            group: '',
            subject: '',
            searchtype: "",
            title: "",
            ASSETURL: '',
            action: "",
            studentOrteacher_id: "",
            looding: true,
            preloader: true,

        }
    },
    methods: {

        dataformater(date) {
            return User.dateformat(date)[6];
        },
        onlineexamfun(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
var studentclassname = this.studentclass

    if(this.studentclass=='null'){
        studentclassname="";
    }



            this.timeout = setTimeout(() => {
                axios.get(`/api/onlineexam?page=${page}&filter[school_id]=${this.school_id}&filter[class]=${studentclassname}&filter[group]=${this.group}&filter[subject]=${this.subject}`)
                    .then(({ data }) => {
                        this.onlineexams = data;
                        if (data.data.length < 3) {
                            document.getElementById('tableid').classList.add('minheight');
                        } else {
                            document.getElementById('tableid').classList.remove('minheight');
                        }
                        this.looding = false
                        this.preloader = false;
                    })
                    .catch()
            }, 300);
        },
        searchTitle() {
            // this.searchtype = "filtertitle";
            this.onlineexamfun()
        },

        actionclick(id) {
            this.action = 'Delete'
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
                    axios.get(`/api/onlineexam/delete/${id}`)
                        .then(({ data }) => {
                            this.onlineexamfun();
                            Notification.customdelete(`Your data has been ${this.action}.`);
                        })
                        .catch(() => {
                            // this.$router.push({name: 'supplier'})
                        })
                }
            })
        }
    },
    mounted() {
        this.category = this.$route.params.category;

            this.onlineexamfun();


    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
