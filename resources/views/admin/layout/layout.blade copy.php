<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AKKHOR | Home 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_asset/fonts/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_asset/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <style>
        :root{
            --color-animation1: #9370DB;
            --color-animation2: #9370DB;
            --color-animation3: #9370DB;
            --border-size: 3px solid transparent;
        }
        :root{
            --time-animation1: spin-circular 1.5s linear infinite;
            --time-animation2: spin-circular 2s linear infinite;
            --time-animation3: spin-circular 3s linear infinite;
        }
        #overlay-circular {
          height: 100%;
          width: 100%;
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          z-index:1000;
        }
        .loader-circular {
            display: block;
            position: relative;
            left: 50%;
            top: 50%;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border-radius: 50%;
            border: 5px solid transparent;
            border-top-color: #ff9633;
            -webkit-animation: spin-circular 2s linear infinite;
            animation: spin-circular 2s linear infinite;
        }
        .loader-circular:before {
            content: "";
            position: absolute;
            top: 5px;
            left: 5px;
            right: 5px;
            bottom: 5px;
            border-radius: 50%;
            border: 5px solid transparent;
            border-top-color: #ffffff;
            -webkit-animation: spin-circular 21s linear infinite;
            animation: spin-circular 21s linear infinite;
        }
        .loader-circular:after {
            content: "";
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border-radius: 50%;
            border: 5px solid transparent;
            border-top-color: #17fd3d;
            -webkit-animation: spin-circular 1.5s linear infinite;
            animation: spin-circular 1.5s linear infinite;
        }
        @-webkit-keyframes spin-circular {
        0%   {
                transform: rotate(0deg);
        }
        100% {
                transform: rotate(360deg);
        }
        }
        @keyframes spin-circular {
        0%   {
                transform: rotate(0deg);
        }
        100% {
                transform: rotate(360deg);
        }
        }
        </style>

</head>

<body>
    <div id="app" >


<div id="overlay-circular" class="preloadervue" style="background-color: #4747c7;    z-index: 9999999;"><div class="loader-circular"></div></div>

    {{--
===========================  ===========================  ===========================  ===========================  ===========================
                                                                Frontent layout
===========================  ===========================  ===========================  ===========================  ===========================
        --}}
        <div v-if="$route.path === '/login' || $route.path === '/register' || $route.path === 'forget' || $route.path === '/'" >
            <h1 id='topnavbar'>hello</h1>
            <router-view></router-view>
        </div>


   {{--
    ===========================  ===========================  ===========================  ===========================  ===========================
                                                                 backent layout
    ===========================  ===========================  ===========================  ===========================  ===========================
    --}}
<div  id="wrapper" class="wrapper bg-ash" v-else >


        <div class="navbar navbar-expand-md header-menu-one bg-light" id='topnavbar' v-show="$route.path === '/login' || $route.path === '/register' || $route.path === 'forget' ? false : true " >
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="{{ asset('dashboard_asset/img/logo.png') }}" alt="logo">
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
                                {{-- <h5 class="item-title">{{ Auth::user()->name }}</h5>
                                <span>{{ Auth::user()->role }}</span> --}}

                            </div>
                            <div class="admin-img">
                                <img src="{{ asset('dashboard_asset/img/figure/admin.jpg') }}" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                {{-- <h6 class="item-title">{{ Auth::user()->name }}</h6> --}}

                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li>

                                     <router-link class="dropdown-item"  onclick="navhide()"  to="/school/logout" >
                                        <i class="flaticon-turn-off"></i> {{ __('Logout') }}
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
                        <router-link  onclick="navhide()"  to="/school/"><img src="{{ asset('dashboard_asset/img/logo1.png') }}" alt="logo"></router-link>
                    </div>
               </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <router-link  onclick="navhide()"  to="/school/" class="nav-link"><i class="fas fa-angle-right"></i> Admin</router-link>
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
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-classmates"></i><span>Students</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <router-link  onclick="navhide()"  to="/school/students" class="nav-link"><i class="fas fa-angle-right"></i> All
                                        Students</router-link>
                                </li>
                                {{-- <li class="nav-item">
                                    <router-link  onclick="navhide()"  to="/school/students/form" class="nav-link"><i class="fas fa-angle-right"></i>Admission Form</router-link>
                                </li> --}}
                                <li class="nav-item">
                                    <router-link  onclick="navhide()"  to="/school/student-promotion" class="nav-link"><i
                                            class="fas fa-angle-right"></i> Student Promotion</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link   onclick="navhide()" :to="{name:'studentCard'}" class="nav-link"><i class="fas fa-angle-right"></i> Student Card</router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i
                                    class="flaticon-multiple-users-silhouette"></i><span>Teachers</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <router-link  onclick="navhide()"  to="/school/staffs" class="nav-link"><i class="fas fa-angle-right"></i> All
                                        Teachers</router-link>
                                </li>

                                {{-- <li class="nav-item">
                                    <router-link  onclick="navhide()"  to="/school/staffs/form" class="nav-link"><i class="fas fa-angle-right"></i>Add
                                        Teacher</router-link>
                                </li> --}}

                                <li class="nav-item">
                                    <router-link  onclick="navhide()"  to="/school/staffs/attendance" class="nav-link"><i class="fas fa-angle-right"></i> Attendence</router-link>
                                </li>



                            </ul>
                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-technological"></i><span>Acconunt</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <router-link  onclick="navhide()"  to="/school/payment" class="nav-link"><i class="fas fa-angle-right"></i> Payments</router-link>
                                </li>

                            </ul>
                        </li>









                        <li class="nav-item"> <router-link   onclick="navhide()" :to="{name:'studentsattendance'}" class="nav-link"><i class="flaticon-checklist"></i><span>Attendence</span></router-link> </li>




                        <li class="nav-item"> <router-link   onclick="navhide()" :to="{ name:'routines' }" class="nav-link"><i class="flaticon-checklist"></i><span>Routines</span></router-link> </li>





                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>Exam</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <router-link  onclick="navhide()"  to="/school/results" class="nav-link"><i class="fas fa-angle-right"></i> Result</router-link>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-script"></i><span>Gallery</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <router-link  onclick="navhide()"  to="/school/gallery_category" class="nav-link"><i class="fas fa-angle-right"></i> Galley Category</router-link>
                                </li>
                                <li class="nav-item"><router-link   onclick="navhide()" :to="{name:'gallerys'}" class="nav-link"><i class="fas fa-angle-right"></i> Gallery</router-link>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-script"></i><span>Notice</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <router-link   onclick="navhide()" :to="{ name:'smsNotice' }" class="nav-link"><i class="fas fa-angle-right"></i> Sms Notice</router-link>
                                </li>
                                {{-- <li class="nav-item"><router-link  onclick="navhide()"  to="/school/notice" class="nav-link"><i class="fas fa-angle-right"></i> Website Notice</router-link></li> --}}

                            </ul>
                        </li>

                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-script"></i><span>Blogs</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <router-link   onclick="navhide()" :to="{name:'blogs'}" class="nav-link"><i class="fas fa-angle-right"></i>Posts</router-link>
                                </li>

                                <li class="nav-item"><router-link   onclick="navhide()" :to="{ name:'blogcategorys' }" class="nav-link"><i class="fas fa-angle-right"></i> Post Categories</router-link>
                                </li>

                            </ul>
                        </li>




                        <li class="nav-item"><router-link   onclick="navhide()" :to="{name:'events'}" class="nav-link"><i class="flaticon-script"></i><span>Events</span></router-link></li>


                        <li class="nav-item sidebar-nav-item">
                            <a href="#" class="nav-link"><i class="flaticon-script"></i><span>Settings</span></a>
                            <ul class="nav sub-group-menu">
                                <li class="nav-item">
                                    <router-link  onclick="navhide()"  to="/school/settings" class="nav-link"><i class="fas fa-angle-right"></i> School Profile</router-link>
                                </li>
                                <li class="nav-item"><router-link  onclick="navhide()"  to="/school/settings/seo" class="nav-link"><i class="fas fa-angle-right"></i> Seo Settings</router-link></li>
                                <li class="nav-item"><router-link  onclick="navhide()"  to="/school/settings/slider" class="nav-link"><i class="fas fa-angle-right"></i> Slider</router-link></li>


                            </ul>
                        </li>



                    </ul>
                </div>
            </div>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">






                <router-view></router-view>




   <!-- Footer Area Start Here -->
   <footer class="footer-wrap-layout1" v-show="$route.path === '/login' || $route.path === '/register' || $route.path === 'forget' ? false : true " >
    <div class="copyright">© Copyrights <a href="#">akkhor</a> 2019. All rights reserved. Designed by <a
            href="#">PsdBosS</a></div>
</footer>
<!-- Footer Area End Here -->
</div>
</div>

</div>




</div>



    <script src="{{ asset('js/app.js') }}"></script>
<!-- Plugins js -->
{{-- <script src="{{ asset('dashboard_asset/js/plugins.js') }}"></script> --}}
<!-- Popper js -->
<script src="{{ asset('dashboard_asset/js/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('dashboard_asset/js/bootstrap.min.js') }}"></script>
<!-- Counterup Js -->
{{-- <script src="{{ asset('dashboard_asset/js/jquery.counterup.min.js') }}"></script> --}}
<!-- Moment Js -->
{{-- <script src="{{ asset('dashboard_asset/js/moment.min.js') }}"></script> --}}
<!-- Waypoints Js -->
{{-- <script src="{{ asset('dashboard_asset/js/jquery.waypoints.min.js') }}"></script> --}}
<!-- Scroll Up Js -->
<script src="{{ asset('dashboard_asset/js/jquery.scrollUp.min.js') }}"></script>
<!-- Full Calender Js -->
{{-- <script src="{{ asset('dashboard_asset/js/fullcalendar.min.js') }}"></script> --}}
<!-- Chart Js -->
{{-- <script src="{{ asset('dashboard_asset/js/Chart.min.js') }}"></script> --}}
{{-- <script src="{{ asset('dashboard_asset/js/jquery.dataTables.min.js') }}"></script> --}}
    <!-- Select 2 Js -->
    {{-- <script src="{{ asset('dashboard_asset/js/select2.min.js') }}"></script> --}}
    <!-- Date Picker Js -->
    {{-- <script src="{{ asset('dashboard_asset/js/datepicker.min.js') }}"></script> --}}
<!-- Custom Js -->
<script src="{{ asset('dashboard_asset/js/main.js') }}"></script>



<script>

function navhide(){
    document.getElementById('wrapper').classList.remove('sidebar-collapsed-mobile');
}



// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("topnavbar");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("fixednav");
  } else {
    header.classList.remove("fixednav");
  }
}
// console.log(document.readyState)

if (document.readyState == "loading") {
   document.getElementsByClassName('preloadervue')[0].style.display="none"
}


</script>

</body>

</html>
