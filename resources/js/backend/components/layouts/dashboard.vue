<template>
    <div>


       <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light" id='topnavbar' v-show="$route.path === '/login' || $route.path === '/register' || $route.path === 'forget' ? false : true " >
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="/dashboard_asset/img/logo.png" alt="logo">
                    </a>
                </div>
                 <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="d-md-none mobile-nav-bar">
               <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" id="mobilenavClickbutton"  class="mobilenavClickbutton navbar-toggler sidebar-toggle-mobile">
                    <i class="mobilenavClickbutton fas fa-bars" id="mobilenavClickicon"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <li class="navbar-item header-search-bar">
                        <div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="flaticon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control" placeholder="Find Something . . .">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">


                            </div>
                            <div class="admin-img">
                                <img src="/dashboard_asset/img/figure/admin.jpg" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">


                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li>

                                     <router-link class="dropdown-item"    to="/school/logout" >
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
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color" v-show="$route.path === '/login' || $route.path === '/register' || $route.path === 'forget' ? false : true " id='leftnavbar'>
               <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <router-link    to="/school/"><img src="/dashboard_asset/img/logo1.png" alt="logo"></router-link>
                    </div>
               </div>
                <div class="sidebar-menu-content">



                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item sidebar-nav-item"  id="mainmenuDashboard">
                            <a href="#"  class="nav-link" @click="mainMenu('mainmenuDashboard','submenuDashboard')"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                            <ul class="nav sub-group-menu" id="submenuDashboard">
                                <li class="nav-item">
                                    <router-link    to="/school/" class="nav-link"><i class="fas fa-angle-right"></i> Admin</router-link>
                                </li>
                                <li class="nav-item">
                                    <a href="index3.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i> Students</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index4.html" class="nav-link"><i class="fas fa-angle-right"></i> Parents</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index5.html" class="nav-link"><i
                                            class="fas fa-angle-right"></i> Teachers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item" :class="{'active': subIsActive(['/school/students','/school/students/card'])}" id="mainmenuStudents">
                            <a href="#" class="nav-link"  @click="mainMenu('mainmenuStudents','submenuStudents')"><i class="flaticon-classmates"></i><span>Students</span></a>
                            <ul class="nav sub-group-menu" id="submenuStudents" :class="{'menu-open': subIsActive(['/school/students','/school/students/card'])}" v-bind:style="{'display:block': subIsActive(['/school/students','/school/students/card'])}">
                                <li class="nav-item">
                                    <router-link    to="/school/students" class="nav-link"><i class="fas fa-angle-right"></i> All
                                        Students</router-link>
                                </li>

                                <!-- <li class="nav-item">
                                    <router-link    to="/school/student-promotion" class="nav-link"><i
                                            class="fas fa-angle-right"></i> Student Promotion</router-link>
                                </li> -->
                                <li class="nav-item">
                                    <router-link    :to="{name:'studentCard'}" class="nav-link"><i class="fas fa-angle-right"></i> Student Card</router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item" id="mainmenuTeachers">
                            <a href="#" class="nav-link" @click="mainMenu('mainmenuTeachers','submenuTeachers')"><i class="flaticon-multiple-users-silhouette"></i><span>Teachers</span></a>
                            <ul class="nav sub-group-menu" id="submenuTeachers">
                                <li class="nav-item">
                                    <router-link    to="/school/staffs" class="nav-link"><i class="fas fa-angle-right"></i> All
                                        Teachers</router-link>
                                </li>



                                <li class="nav-item">
                                    <router-link    to="/school/staffs/attendance" class="nav-link"><i class="fas fa-angle-right"></i> Attendence</router-link>
                                </li>



                            </ul>
                        </li>

                        <li class="nav-item sidebar-nav-item" id="mainmenuPayments">
                            <a href="#" class="nav-link"  @click="mainMenu('mainmenuPayments','submenuPayments')"><i class="flaticon-technological"></i><span>Acconunt</span></a>
                            <ul class="nav sub-group-menu" id="submenuPayments">
                                <li class="nav-item">
                                    <router-link    to="/school/payment" class="nav-link"><i class="fas fa-angle-right"></i> Payments</router-link>
                                </li>

                            </ul>
                        </li>









                        <li class="nav-item"> <router-link    :to="{name:'studentsattendance'}" class="nav-link"><i class="flaticon-checklist"></i><span>Attendence</span></router-link> </li>




                        <li class="nav-item"> <router-link    :to="{ name:'routines' }" class="nav-link"><i class="flaticon-checklist"></i><span>Routines</span></router-link> </li>





                        <li class="nav-item sidebar-nav-item" id="mainmenuExam">
                            <a href="#" class="nav-link"  @click="mainMenu('mainmenuExam','submenuExam')"><i class="flaticon-shopping-list"></i><span>Exam</span></a>
                            <ul class="nav sub-group-menu" id="submenuDashboard">
                                <li class="nav-item">
                                    <router-link    to="/school/results" class="nav-link"><i class="fas fa-angle-right"></i> Result</router-link>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item sidebar-nav-item" id="mainmenuGallery">
                            <a href="#" class="nav-link"  @click="mainMenu('mainmenuGallery','submenuGallery')"><i class="flaticon-script"></i><span>Gallery</span></a>
                            <ul class="nav sub-group-menu" id="submenuGallery">
                                <li class="nav-item">
                                    <router-link    to="/school/gallery_category" class="nav-link"><i class="fas fa-angle-right"></i> Galley Category</router-link>
                                </li>
                                <li class="nav-item"><router-link    :to="{name:'gallerys'}" class="nav-link"><i class="fas fa-angle-right"></i> Gallery</router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item sidebar-nav-item" id="mainmenuNotice">
                            <a href="#" class="nav-link"  @click="mainMenu('mainmenuNotice','submenuNotice')"><i class="flaticon-script"></i><span>Notice</span></a>
                            <ul class="nav sub-group-menu" id="submenuDashboard">
                                <li class="nav-item">
                                    <router-link    :to="{ name:'smsNotice' }" class="nav-link"><i class="fas fa-angle-right"></i> Sms Notice</router-link>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item sidebar-nav-item" id="mainmenuBlogs">
                            <a href="#" class="nav-link"  @click="mainMenu('mainmenuBlogs','submenuBlogs')"><i class="flaticon-script"></i><span>Blogs</span></a>
                            <ul class="nav sub-group-menu" id="submenuDashboard">
                                <li class="nav-item">
                                    <router-link    :to="{name:'blogs'}" class="nav-link"><i class="fas fa-angle-right"></i>Posts</router-link>
                                </li>

                                <li class="nav-item"><router-link    :to="{ name:'blogcategorys' }" class="nav-link"><i class="fas fa-angle-right"></i> Post Categories</router-link>
                                </li>

                            </ul>
                        </li>




                        <li class="nav-item"><router-link    :to="{name:'events'}" class="nav-link"><i class="flaticon-script"></i><span>Events</span></router-link></li>


                        <li class="nav-item sidebar-nav-item" id="mainmenuSettings">
                            <a href="#" class="nav-link"  @click="mainMenu('mainmenuSettings','submenuSettings')"><i class="flaticon-script"></i><span>Settings</span></a>
                            <ul class="nav sub-group-menu" id="submenuSettings">
                                <li class="nav-item">
                                    <router-link    to="/school/settings" class="nav-link"><i class="fas fa-angle-right"></i> School Profile</router-link>
                                </li>
                                <li class="nav-item"><router-link    to="/school/settings/seo" class="nav-link"><i class="fas fa-angle-right"></i> Seo Settings</router-link></li>
                                <li class="nav-item"><router-link    to="/school/settings/slider" class="nav-link"><i class="fas fa-angle-right"></i> Slider</router-link></li>


                            </ul>
                        </li>



                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">





        <slot/>





   <!-- Footer Area Start Here -->
   <footer class="footer-wrap-layout1" v-show="$route.path === '/login' || $route.path === '/register' || $route.path === 'forget' ? false : true " >
    <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
            href="#">PsdBosS</a></div>
</footer>
<!-- Footer Area End Here -->
</div>
</div>











    </div>
</template>
<script>
export default {
    created() {

    },
    data() {
        return {
 isDropped: false
        }
    },
    methods: {


  subIsActive(input) {
    const paths = Array.isArray(input) ? input : [input]
    return paths.some(path => {
      return this.$route.path.indexOf(path) === 0 // current path starts with this path string
    })
  },


            mainMenu(id,id2){



	if ( $("#"+id).hasClass("active") && $("#"+id2).hasClass("menu-open") ){
      $('#'+id).removeClass('active')
      $('#'+id2).removeClass('menu-open')
      $('#'+id2).css('display', 'none');
      } else {
      	$('#'+id).addClass('active')
      	$('#'+id2).addClass('menu-open')
        $('#'+id2).css('display', 'block');
      }

            }
    },
    mounted() {

    }
}
</script>
