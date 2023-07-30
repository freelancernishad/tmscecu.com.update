let themeFolder = 'theme1';
// let themeFolder = 'default';


let layout = require(`./components/layouts/theme1/layout.vue`).default;
let blank = require(`./components/layouts/theme1/blank.vue`).default;


// let home = require('./components/home.vue').default;

let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;






let home = require(`./components/themes/theme1/index.vue`).default;
let frontteachers = require(`./components/themes/theme1/teachers.vue`).default;
let frontstudent_at_a_glance = require(`./components/themes/theme1/student_at_a_glance.vue`).default;
let frontstudent_list = require(`./components/themes/theme1/student_list.vue`).default;
let frontroutine = require(`./components/themes/theme1/routine.vue`).default;

let frontresult = require(`./components/themes/theme1/result.vue`).default;
let frontweakly_result = require(`./components/themes/theme1/weakly_result.vue`).default;
let frontnotice = require(`./components/themes/theme1/notice.vue`).default;
let noticesingle = require(`./components/themes/theme1/noticesingle.vue`).default;
let frontblogs = require(`./components/themes/theme1/blogs.vue`).default;
let frontblogsingle = require(`./components/themes/theme1/blogsingle.vue`).default;
let frontcontact_us = require(`./components/themes/theme1/contact_us.vue`).default;
let student_register = require(`./components/themes/theme1/register.vue`).default;
let payment = require(`./components/themes/theme1/payment2.vue`).default;
let tc = require(`./components/themes/theme1/tc.vue`).default;


let reject = require('./components/reject.vue').default;
let PageNotFound = require('./components/404.vue').default;


let prefix = '/'
export const routes = [
    { path:  `${prefix}`, component: home, name:'home',meta: { layout: layout } },
    { path: `${prefix}login`, component: login, name:'login',meta: { layout: blank } },
    { path:  `${prefix}register`, component: register, name:'register',meta: { layout: layout } },
    { path:  `${prefix}forget`, component: forget, name:'forget',meta: { layout: layout } },

    { path: `${prefix}teachers`, component: frontteachers, name:'frontteachers' ,meta: { layout: layout } },
    { path: `${prefix}student_at_a_glance`, component: frontstudent_at_a_glance, name:'frontstudent_at_a_glance' ,meta: { layout: layout } },
    { path: `${prefix}student_list`, component: frontstudent_list, name:'frontstudent_list' ,meta: { layout: layout } },
    { path: `${prefix}student_list/:classname`, component: frontstudent_list, name:'frontstudent_listsearch' ,meta: { layout: layout } },
    { path: `${prefix}routine`, component: frontroutine, name:'frontroutine' ,meta: { layout: layout } },
    { path: `${prefix}result`, component: frontresult, name:'frontresult' ,meta: { layout: layout } },
    { path: `${prefix}result/:studentclass/:group/:examType/:subject/:religion/:year/:roll/:school_id`, component: frontresult, name:'frontresultsearch' ,meta: { layout: layout } },
    { path: `${prefix}weakly_result`, component: frontweakly_result, name:'frontweakly_result' ,meta: { layout: layout } },
    { path: `${prefix}web/notice`, component: frontnotice, name:'frontnotice' ,meta: { layout: layout } },
    { path: `${prefix}web/notice/:id/:title`, component: noticesingle, name:'noticesingle' ,meta: { layout: layout } },
    { path: `${prefix}blogs`, component: frontblogs, name:'frontblogs' ,meta: { layout: layout } },
    { path: `${prefix}blogs/:slug`, component: frontblogsingle, name:'frontblogsingle' ,meta: { layout: layout } },
    { path: `${prefix}contact-us`, component: frontcontact_us, name:'frontcontact_us' ,meta: { layout: layout } },
    { path: `${prefix}student/register`, component: student_register, name:'student_register' ,meta: { layout: layout } },
    { path: `${prefix}student/payment`, component: payment, name:'payment' ,meta: { layout: layout } },
    { path: `${prefix}student/tc`, component: tc, name:'tc' ,meta: { layout: layout } },

    { path:  `${prefix}reject/:id`, component: reject, name:'reject',meta: { layout: layout } },

  { path: "*", component: PageNotFound }

]

