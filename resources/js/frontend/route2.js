let layout = require('./components/layouts/layout.vue').default;
let blank = require('./components/layouts/blank.vue').default;


// let login = require('./components/auth/login.vue').default;
let login = () => import('./components/auth/login.vue')
// let register = require('./components/auth/register.vue').default;
let register = () => import('./components/auth/register.vue')
// let forget = require('./components/auth/forget.vue').default;
let forget = () => import('./components/auth/forget.vue')

// let certificate = require('./components/form/aftersubmit.vue').default;
let certificate = () => import('./components/form/aftersubmit.vue')
// let application = require('./components/form/index.vue').default;
let application = () => import('./components/form/index.vue')
// let blogs = require('./components/blogs/index.vue').default;
let blogs = () => import('./components/blogs/index.vue')
// let blogread = require('./components/blogs/read.vue').default;
let blogread = () => import('./components/blogs/read.vue')
// let sonodVerify = require('./components/sonodVerify.vue').default;
let sonodVerify = () => import('./components/sonodVerify.vue')
// let sonodsearch = require('./components/sonodsearch.vue').default;
let sonodsearch = () => import('./components/sonodsearch.vue')
// let contact = require('./components/contact.vue').default;
let contact = () => import('./components/contact.vue')

// let home = require('./components/home.vue').default;
let home = () => import('./components/home.vue')
let reject = require('./components/reject.vue').default;
let PageNotFound = require('./components/404.vue').default;


let prefix = '/'
export const routes = [
    { path:  `${prefix}`, component: home, name:'home',meta: { layout: layout } },
    { path: `${prefix}login`, component: login, name:'login',meta: { layout: blank } },
    { path:  `${prefix}register`, component: register, name:'register',meta: { layout: layout } },
    { path:  `${prefix}forget`, component: forget, name:'forget',meta: { layout: layout } },
    { path:  `${prefix}contact`, component: contact, name:'contact',meta: { layout: layout } },
    { path:  `${prefix}preview`, component: certificate, name:'certificate',meta: { layout: layout } },
    { path:  `${prefix}verification/sonod/:id`, component: sonodVerify, name:'sonodVerify',meta: { layout: layout } },
    { path:  `${prefix}sonod/search`, component: sonodsearch, name:'sonodsearch',meta: { layout: layout } },
    { path:  `${prefix}application/:name`, component: application, name:'application',meta: { layout: layout } },
    { path:  `${prefix}blogs/:name`, component: blogs, name:'blogs',meta: { layout: layout } },
    { path:  `${prefix}blogs/read/:id`, component: blogread, name:'blogread',meta: { layout: layout } },
    { path:  `${prefix}reject/:id`, component: reject, name:'reject',meta: { layout: layout } },

  { path: "*", component: PageNotFound }

]

