<template>
    <div>
        <loader v-if="preloader == true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
        <div class="breadcrumbs-area">
            <h3>Homework</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>Homework</li>
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
                            style="display:none" :to="{ name: 'homeworknew' }">Add New</router-link>
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
                                <th>Title</th>
                                <th>Class</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="looding">
                                <td colspan="6" style="    text-align: center;
    background: #042954;
    color: wheat;">Looding...</td>
                            </tr>
                            <tr v-else v-for="(homework, index) in homeworks.data">
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">{{ index + 1 }}</label>
                                    </div>
                                </td>
                                <td>{{ homework.title }}</td>
                                <td>{{ homework.class }}</td>
                                <td>{{ dataformater(homework.startdate) }}</td>
                                <td>{{ dataformater(homework.enddate) }}</td>
                                <td>{{ homework.status }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <router-link class="dropdown-item"
                                                :to="{ name: 'homeworksView', params: { id: homework.id } }"><i
                                                    class="fas fa-eye"></i> View All</router-link>
                                            <router-link class="dropdown-item"
                                                v-show="$localStorage.getItem('role') == 'admin' || $localStorage.getItem('role') == 'teacher' ? true : false"
                                                style="display:none"
                                                :to="{ name: 'homeworkEdit', params: { id: homework.id } }"><i
                                                    class="fas fa-cogs"></i> Edit</router-link>
                                            <span @click="actionclick(homework.id)"
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
            <div class="card-footer">


<Pagination :total-rows="TotalRows" :route-name="RouteName" :route-params="RouteParams" :total-page="Totalpage"></Pagination>



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
            homeworks: {},

            searchtype: "",
            title: "",
            ASSETURL: '',
            action: "",
            looding: true,
            preloader: true,
            studentOrteacher_id: '',
            studentclass: '',
            status: '',


            PerPageData: '20',
            TotalRows: '1',
            Totalpage: [],
            RouteName:'',
            RouteParams:{},


        }
    },
    methods: {

        dataformater(date) {
            return User.dateformat(date)[6];
        },
       async homeworkfun(page) {


var studentclassname = this.studentclass

    if(this.studentclass=='null'){
        studentclassname="";
    }
    var page = 1;
            if (this.$route.query.page) page = this.$route.query.page;

        var res = await this.callApi('get',`/api/homework?page=${page}&filter[school_id]=${this.school_id}&filter[class]=${studentclassname}&filter[status]=${this.status}&filter[title]=${this.title}`,[]);
        this.homeworks = res.data;
        if (data.data.length < 3) {
                            document.getElementById('tableid').classList.add('minheight');
                        } else {
                            document.getElementById('tableid').classList.remove('minheight');
                        }
                        this.looding = false
                        this.preloader = false;


        },
        searchTitle() {
            // this.searchtype = "filtertitle";
            this.homeworkfun()
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
                    axios.get(`/api/homework/delete/${id}`)
                        .then(({ data }) => {
                            this.homeworkfun();
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

            this.homeworkfun();

        console.log(this.$localStorage.getItem('teacherOrstudent'))
    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
