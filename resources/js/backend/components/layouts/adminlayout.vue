<template>
    <div id="wrapper" class="wrapper bg-ash"
        :class="{ 'sidebar-collapsed': sidebarstatus, 'sidebar-collapsed-mobile': mobileSidebar }">
        <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40"
            objectbg="#999793" opacity="80" name="circular"></loader>


        <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light" id='topnavbar'>
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <h3 style="    margin-bottom: 0;">
                        <router-link :to="{ name: 'home' }" class="text-white">
                            {{ user.position }} Panel
                            <!-- <img width="80%" src="http://esoft4u.tmscedu.com/asset/img/Logo123.png" alt="logo"> -->
                        </router-link>
                    </h3>
                </div>
                <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link" @click="sidebarstatus = !sidebarstatus">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">
                <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse"
                    data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" class="navbar-toggler sidebar-toggle-mobile"
                    @click="mobileSidebar = !mobileSidebar">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <li class="navbar-item header-search-bar">
                        <div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <!-- <span class="flaticon-search" aria-hidden="true"></span> -->
                                </button>
                            </span>
                            <!-- <input type="text" class="form-control" placeholder="Find Something . . ."> -->
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title">{{ user.name }}</h5>
                                <span>{{ user.role }}</span>
                            </div>
                            <div class="admin-img">
                                <img :src="$asseturl + 'dashboard_asset/img/figure/admin.jpg'" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">{{ $localStorage.getItem('user') }}</h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li>
                                        <router-link class="dropdown-item" :to="{name:'profile'}">
                                            <img :src="$asseturl + 'dashboard_asset/img/figure/admin.jpg'" alt="Admin">
                                            Profile
                                        </router-link>
                                    </li>

                                    <li>
                                        <router-link class="dropdown-item" :to="{ name: 'logout' }">
                                            <i class="flaticon-turn-off"></i> Logout
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
                <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="/" style="    padding: 10px !important;">
                            {{ user.position }} Panel
                            <!-- <img width="80%" src="http://esoft4u.tmscedu.com/asset/img/Logo123.png" alt="logo"> -->

                        </a>
                    </div>
                </div>
                <div class="sidebar-menu-content" id="dashboardheight">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view navBar">





                        <!-- <li v-for="(menuList,index) in userPermission" class="nav-item" @click="submenu(index)" v-if="menuList.read">
                            <router-link :to="{name:menuList.name}" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>{{ menuList.resourceName }}</span></router-link>
                        </li> -->


                        <li class="nav-item" @click="submenu(0)">
                            <router-link :to="{ name: 'home' }" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></router-link>
                        </li>


                        <li class="nav-item sidebar-nav-item"  v-if="$localStorage.getItem('role')=='admin'" :class="{ active: selected == 2 }">
                            <a href="javascript:void(0)" class="nav-link" @click="submenu(2)"><i class="flaticon-multiple-users-silhouette"></i><span>Staffs</span></a>
                        <transition name="slide">
                            <ul class="nav sub-group-menu menu-open child" v-if="selected == 2" style="display:block">
                                <li class="nav-item">
                                    <router-link   :to="{name:'staffs'}" class="nav-link"><i class="fas fa-angle-right"></i> All Staffs</router-link>
                                </li>
                                <li class="nav-item" >
                                    <router-link   :to="{name:'staffsattendance'}" class="nav-link"><i class="fas fa-angle-right"></i> Attendence</router-link>
                                </li>
                            </ul>
                        </transition>
                        </li>


                         <li class="nav-item sidebar-nav-item" :class="{ active: selected == 1 }" >
                            <a href="javascript:void(0)" class="nav-link" @click="submenu(1)"><i class="flaticon-technological"></i><span>Students</span></a>
                            <transition name="slide">
                                <ul class="nav sub-group-menu menu-open child" v-if="selected == 1"
                                    style="display:block">

                                    <li class="nav-item">
                                        <router-link :to="{ name: 'students' }" class="nav-link"><i class="fas fa-angle-right"></i> All Students </router-link>
                                    </li>

                                    <li class="nav-item">
                                        <router-link :to="{ name: 'studentssearch',params: { classname: 'All', status: 'Pending' } }" class="nav-link"><i class="fas fa-angle-right"></i> New Applications </router-link>
                                    </li>

                                    <li class="nav-item">
                                        <router-link :to="{ name: 'studentsform' }" class="nav-link"><i class="fas fa-angle-right"></i> Admission Form </router-link>
                                    </li>

                                    <li class="nav-item">
                                        <router-link :to="{ name: 'applicationPermission' }" class="nav-link"><i class="fas fa-angle-right"></i> Admission Confirm </router-link>
                                    </li>

                                    <li class="nav-item">
                                        <router-link :to="{ name: 'studentsReports' }" class="nav-link"><i class="fas fa-angle-right"></i> Reports </router-link>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <router-link :to="{ name: 'students' }" class="nav-link"><i class="fas fa-angle-right"></i> Student Promotion </router-link>
                                    </li> -->

                                    <!-- <li class="nav-item">
                                        <router-link :to="{ name: 'studentCard' }" class="nav-link"><i class="fas fa-angle-right"></i> Student Card </router-link>
                                    </li> -->

                                </ul>
                            </transition>
                        </li>
<!--
                        <li class="nav-item"  v-if="$localStorage.getItem('role')=='teacher'"><router-link   :to="{name:'events'}" class="nav-link"><i class="flaticon-script"></i><span>Profile</span></router-link></li> -->


<!-- <li class="nav-item"  @click="submenu(0)"><router-link   :to="{name:'homeworks'}" class="nav-link"><i class="flaticon-script"></i><span>Home Work</span></router-link></li> -->


<!-- <li class="nav-item"  @click="submenu(0)"><router-link :to="{name:'questionbank'}" class="nav-link"><i class="flaticon-script"></i><span>Questinbank</span></router-link></li> -->


<!-- <li class="nav-item"  @click="submenu(0)"><router-link    :to="{name:'onlineexam'}" class="nav-link"><i class="flaticon-script"></i><span>Online Exam</span></router-link></li> -->


<!-- <li class="nav-item"  @click="submenu(0)"><router-link   :to="{name:'chat'}" class="nav-link"><i class="flaticon-script"></i><span>Massege</span></router-link></li> -->





<li class="nav-item sidebar-nav-item" :class="{ active: selected == 3 }">
    <a href="javascript:void(0)" class="nav-link" @click="submenu(3)"><i class="flaticon-technological"></i><span>Acconunt</span></a>
    <transition name="slide">
    <ul class="nav sub-group-menu menu-open child" v-if="selected == 3" style="display:block">

        <li class="nav-item">
            <router-link   :to="{name:'payment_reports'}" class="nav-link"><i class="fas fa-angle-right"></i> Payment Reports</router-link>
        </li>

        <li class="nav-item">
            <router-link   :to="{name:'payment'}" class="nav-link"><i class="fas fa-angle-right"></i> Payments</router-link>
        </li>

        <li class="nav-item">
            <a   href="/dashboard/student/paymnetsheet/annual?school_id=125983" class="nav-link"><i class="fas fa-angle-right"></i> Annually Report</a>
        </li>

    </ul>
</transition>
</li>









<li class="nav-item"  @click="submenu(0)" > <router-link    :to="{name:'studentsattendance'}" class="nav-link"><i class="flaticon-checklist"></i><span>Attendence</span></router-link> </li>




<li class="nav-item" @click="submenu(0)" > <router-link  :to="{ name:'routines' }" class="nav-link"><i class="flaticon-checklist"></i><span>Routines</span></router-link> </li>





<li class="nav-item sidebar-nav-item"  :class="{ active: selected == 40 }">
    <a href="javascript:void(0)" class="nav-link" @click="submenu(40)"><i class="flaticon-shopping-list"></i><span>Assessment</span></a>
    <transition name="slide">
    <ul class="nav sub-group-menu menu-open child" v-if="selected == 40" style="display:block">

        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link"><i class="fas fa-angle-right"></i>Assessment List</a>
        </li>

        <li class="nav-item">
            <router-link   :to="{name:'Assessmentcreate'}" class="nav-link"><i class="fas fa-angle-right"></i>New Assessment</router-link>
        </li>


    </ul>
</transition>
</li>


<li class="nav-item sidebar-nav-item"  :class="{ active: selected == 4 }">
    <a href="javascript:void(0)" class="nav-link" @click="submenu(4)"><i class="flaticon-shopping-list"></i><span>Result</span></a>
    <transition name="slide">
    <ul class="nav sub-group-menu menu-open child" v-if="selected == 4" style="display:block">

        <li class="nav-item">
            <router-link   :to="{name:'results'}" class="nav-link"><i class="fas fa-angle-right"></i> Result Sheet</router-link>
        </li>

        <li class="nav-item">
            <router-link   :to="{name:'marksheet'}" class="nav-link"><i class="fas fa-angle-right"></i> Mark Sheet</router-link>
        </li>

        <li class="nav-item">
            <router-link   :to="{name:'resultlog'}" class="nav-link"><i class="fas fa-angle-right"></i> Result Log</router-link>
        </li>


        <li class="nav-item">
            <router-link   :to="{name:'applicationResult'}" class="nav-link"><i class="fas fa-angle-right"></i> Application Result</router-link>
        </li>

    </ul>
</transition>
</li>
<!--
<li class="nav-item sidebar-nav-item" :class="{ active: selected == 5 }">
    <a href="javascript:void(0)" class="nav-link" @click="submenu(5)"><i class="flaticon-script"></i><span>Gallery</span></a>
    <transition name="slide">
    <ul class="nav sub-group-menu menu-open child" v-if="selected == 5" style="display:block">
        <li class="nav-item">
            <router-link   :to="{name:'categorys'}" class="nav-link"><i class="fas fa-angle-right"></i> Galley Category</router-link>
        </li>
        <li class="nav-item"><router-link   :to="{name:'gallerys'}" class="nav-link"><i class="fas fa-angle-right"></i> Gallery</router-link>
        </li>
    </ul>
</transition>
</li> -->

<li class="nav-item sidebar-nav-item" :class="{ active: selected == 6 }">
    <a href="javascript:void(0)" class="nav-link" @click="submenu(6)"><i class="flaticon-script"></i><span>Notice</span></a>
    <transition name="slide">
    <ul class="nav sub-group-menu menu-open child" v-if="selected == 6" style="display:block">
        <li class="nav-item">
            <router-link    :to="{ name:'notice' }" class="nav-link"><i class="fas fa-angle-right"></i> Notice</router-link>
        </li>
        <li class="nav-item">
            <router-link    :to="{ name:'smsNotice' }" class="nav-link"><i class="fas fa-angle-right"></i> Sms Notice</router-link>
        </li>


    </ul>
</transition>
</li>

<li class="nav-item sidebar-nav-item" :class="{ active: selected == 7 }">
    <a href="javascript:void(0)" class="nav-link" @click="submenu(7)"><i class="flaticon-script"></i><span>Blogs</span></a>
    <transition name="slide">
    <ul class="nav sub-group-menu menu-open child" v-if="selected == 7" style="display:block">
        <li class="nav-item">
            <router-link    :to="{name:'blogs'}" class="nav-link"><i class="fas fa-angle-right"></i>Posts</router-link>
        </li>

        <li class="nav-item"><router-link    :to="{ name:'blogcategorys' }" class="nav-link"><i class="fas fa-angle-right"></i> Post Categories</router-link>
        </li>

    </ul>
</transition>
</li>




<!-- <li class="nav-item" @click="submenu(0)"><router-link   :to="{name:'events'}" class="nav-link"><i class="flaticon-script"></i><span>Events</span></router-link></li> -->


<li class="nav-item sidebar-nav-item" :class="{ active: selected == 8 }">
    <a href="javascript:void(0)" class="nav-link" @click="submenu(8)"><i class="flaticon-script"></i><span>Settings</span></a>
    <transition name="slide">
    <ul class="nav sub-group-menu menu-open child" v-if="selected == 8" style="display:block">

        <li class="nav-item"><router-link    :to="{name:'fees',params:{name:'exam_fee'}}" class="nav-link"><i class="fas fa-angle-right"></i> Exam Fees</router-link></li>
        <li class="nav-item"><router-link    :to="{name:'fees',params:{name:'Admission_fee'}}" class="nav-link"><i class="fas fa-angle-right"></i> Admission Fees</router-link></li>
        <li class="nav-item"><router-link    :to="{name:'fees',params:{name:'monthly_fee'}}" class="nav-link"><i class="fas fa-angle-right"></i> Monthly Fees</router-link></li>

        <li class="nav-item"><router-link    :to="{name:'fees',params:{name:'session_fee'}}" class="nav-link"><i class="fas fa-angle-right"></i> Session Fees</router-link></li>
        <li class="nav-item"><router-link    :to="{name:'fees',params:{name:'registration_fee'}}" class="nav-link"><i class="fas fa-angle-right"></i> Registration Fees</router-link></li>

        <li class="nav-item"><router-link    :to="{name:'fees',params:{name:'form_filup_fee'}}" class="nav-link"><i class="fas fa-angle-right"></i> Form Filup Fees</router-link></li>

        <li class="nav-item"><router-link    :to="{name:'fees',params:{name:'letter_of_appreciation'}}" class="nav-link"><i class="fas fa-angle-right"></i> প্রশংসা পত্রের ফি</router-link></li>



        <li class="nav-item"><router-link    :to="{name:'settings'}" class="nav-link"><i class="fas fa-angle-right"></i> School Profile</router-link></li>
        <li class="nav-item"><router-link    :to="{name:'seoSettings'}" class="nav-link"><i class="fas fa-angle-right"></i> Seo Settings</router-link></li>
        <li class="nav-item"><router-link    :to="{name:'sliderSettings'}" class="nav-link"><i class="fas fa-angle-right"></i> Slider</router-link></li>





    </ul>
</transition>
</li>

<li class="nav-item">
                            <router-link :to="{ name: 'trxcheck' }" class="nav-link"><i
                                    class="flaticon-dashboard"></i><span>Trx check</span></router-link>
                        </li>








                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <slot></slot>
                <!-- Footer Area Start Here -->
                <!-- <footer class="footer-wrap-layout1">
                    <div class="copyright">© Copyrights <a href="#">Company name</a> 2019. All rights reserved.
                        Developed by <a target="_blank"
                            href="https://api.whatsapp.com/send?phone=8801909756552&text=I%27m%20interested%20in%20your%20services">Freelancer
                            Nishad</a></div>
                </footer> -->
                <!-- Footer Area End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
</template>
<script>
export default {
    props: ['user','classesList','school_detials'],
    async created() {

        this.$store.commit('setschoolinfo', this.school_detials)

        // console.log(this.classesList)
        if (!User.loggedIn()) {
            window.location.href = '/login'
        }else{
            // console.log(this.user.role);
            if(this.user.role=='data_entry_oparetor'){
                this.$router.push({name:'resultsoparetor'});
            }else if(this.user.role=='camera_man'){
                this.$router.push({name:'fileupload'});
            }else if(this.user.role=='application_permission'){
                this.$router.push({name:'applicationPermission'});
            }else if(this.user.role=='tcVerifications'){
                this.$router.push({name:'tcVerifications'});
            }else if(this.user.role=='assessment'){
                this.$router.push({name:'Assessmentsinglecreate'});
            }else if(this.user.role=='formfill'){
                this.$router.push({name:'formFillupList'});
            }
        }
        this.$store.commit('setUpdateUser', this.user)
        this.$store.commit('setUpdateClasses', this.classesList)
        if (localStorage.getItem('selectedMenu')) {
            this.selected = localStorage.getItem('selectedMenu')
        }
        window.addEventListener("resize", this.myEventHandler);
        window.addEventListener("scroll", this.myscroll);
    },
    destroyed() {
        window.removeEventListener("resize", this.myEventHandler);
        window.removeEventListener("scroll", this.myscroll);
    },
    data() {
        return {
            selected: 0,
            preLooding: false,
            sidebarstatus: false,
            mobileSidebar: false,
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                this.sidebarstatus = false
                this.mobileSidebar = false
            },
            deep: true
        }
    },
    methods: {
        myscroll() {
            var header = document.getElementById("topnavbar");
            var sticky = header.offsetTop;
            if (window.pageYOffset > sticky) {
                header.classList.add("fixednav");
            } else {
                header.classList.remove("fixednav");
            }
        },
        submenu(ref) {

            if (this.selected > 0) {
                if (ref == this.selected) {
                    this.selected = 0
                    localStorage.setItem('selectedMenu', 0)
                } else {
                    this.selected = ref
                    localStorage.setItem('selectedMenu', ref)
                }
            } else {
                this.selected = ref
                localStorage.setItem('selectedMenu', ref)
            }
        }
    },
    mounted() {
    }
}
</script>
<style>
ul.nav.sub-group-menu.menu-open.child {
    padding: 0 !important;
}

ul.nav.sub-group-menu.menu-open.child li {
    padding: 10px 0;
}

.slide-enter-active {
    -moz-transition-duration: 0.3s;
    -webkit-transition-duration: 0.3s;
    -o-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -moz-transition-timing-function: ease-in;
    -webkit-transition-timing-function: ease-in;
    -o-transition-timing-function: ease-in;
    transition-timing-function: ease-in;
}

.slide-leave-active {
    -moz-transition-duration: 0.3s;
    -webkit-transition-duration: 0.3s;
    -o-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -moz-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
    -webkit-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
    -o-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
    transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
}

.slide-enter-to,
.slide-leave {
    max-height: 100px;
    overflow: hidden;
}

.slide-enter,
.slide-leave-to {
    overflow: hidden;
    max-height: 0;
}

a.nav-link span {
    font-size: 14px !important;
}
textarea.form-control {
    background: #b9b9b9 !important;
}
</style>
