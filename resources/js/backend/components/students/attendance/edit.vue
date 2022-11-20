<template>
    <div>
        <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Staffs Attendence</h3>
            <ul>
                <li>
                    <router-link :to="{ name: 'home' }">Home</router-link>
                </li>
                <li>Staffs Attendence</li>
            </ul>
        </div>
        <div class="card height-auto">
            <div class="card-body">
                <router-link class="btn btn-danger my-5" v-if="$routerHistory.hasPrevious()"
                    :to="{ path: $routerHistory.previous().path }">
                    GO BACK
                </router-link>

                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Staffs Attendence</h3>
                    </div>
                    <div class="dropdown">
                    </div>
                </div>
                <div class="row gutters-8">
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <div class="form-group student_class">
                            <label>View :</label>
                            <select class="form-control" style="width: 100%;" v-model="veiwtype" id="view">
                                <option value="">select</option>
                                <option>Monthly</option>
                                <option>Daily</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group" v-if="veiwtype == 'Monthly'">
                        <div class='form-group'><label>Month:</label>
                            <input type='month' class='form-control' style='width: 100%;' v-model="dateormonth"
                                required />
                        </div>
                    </div>
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group" v-else-if="veiwtype == 'Daily'">
                        <div class='form-group'><label>Date:</label>
                            <input type='date' class='form-control' style='width: 100%;' v-model="dateormonth"
                                required />
                        </div>
                    </div>
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group customFlex" style="margin-top:11px">
                        <div class="form-group student_class">
                            <label></label>
                            <br>
                            <input type="button" @click="filter"
                                class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Filter" id="submit" />
                        </div>
                    </div>
                </div>
                <h5>
                    <div class="well tex-center">DATE :
                    </div>
                </h5>
                <h5>
                    <center> STAFFS ATTENDANCE</center>
                </h5>
                <form enctype="multipart/form-data" v-on:submit.prevent="formsubmit">

                    <div class="table-responsive">
                        <table class="table display text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Full Name</th>
                                    <th class="" scope="col">Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(att, index) in dailyatten">
                                    <td scope="col">{{ att.TeacherName }}</td>
                                    <td scope="col">
                                        <input type="radio" class="Present d-none"
                                            :id="'Present' + att.id" value="Present"
                                            v-model="form.attendence[att.id]" />
                                        <label class="Present att" :for="'Present' + att.id">Present</label>
                                        <input type="radio" class="d-none"
                                            :id="'Absent' + att.id" value="Absent" v-model="form.attendence[att.id]" />
                                        <label class="att" :for="'Absent' + att.id">Absent</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">SAVE
                            DATA</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: '/' })
        }
    },
    data() {
        return {
            form: {
                id: '',
                date: '',
                attendence: [],
                data: [],
            },
            dailyatten: [],
            classes: {},
            veiwtype: '',
            dateormonth: '',
        }
    },
    methods: {
        filter() {
            if (this.$router.currentRoute.path === `/school/staffs/attendance/${this.veiwtype}/${this.dateormonth}`) {
            } else {
                if (this.veiwtype == 'Daily') {
                    this.$router.push({ name: 'staffs_attendance_daily', params: { type: this.veiwtype, date: this.dateormonth } })
                } else if (this.veiwtype == 'Monthly') {
                    this.$router.push({ name: 'staffs_attendance_monthly', params: { type: this.veiwtype, date: this.dateormonth } })
                }
            }
            this.getdata()
        },
        getdata() {

            this.form.id = this.$route.params.id;
            this.form.date = this.dateormonth;

            axios.get(`/api/staff/attendance?veiwtype=${this.veiwtype}&dateormonth=${this.dateormonth}&id=${this.$route.params.id}`)
                .then(({ data }) => {
                    this.dailyatten = data;
                    this.dailyatten.forEach((value, index) => {
                        console.log(value)
                        this.form.attendence[value.id] = value.attendence;
                    });
                })
                .catch(() => {
                    // this.$router.push({name: 'supplier'})
                })
        },
        formsubmit() {
            axios.post(`/api/staff/attendance/submit`, this.form)
                .then(({ data }) => {

                    this.$router.push({ name: 'staffs_attendance_daily', params: { data: this.dateormonth } })
                    Notification.success();
                })
                .catch(() => {
                    // this.$router.push({name: 'supplier'})
                })
        }
    },
    mounted() {
        this.veiwtype = 'edit'
        this.dateormonth = this.$route.params.date
        this.classes = User.classlist();
        this.getdata();
    }
}
</script>
<style lang="css" scoped>
#img_size {
    width: 40px;
}
</style>
