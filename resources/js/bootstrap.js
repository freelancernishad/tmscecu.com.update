import Vue from 'vue'

// console.log(window.location.port)



if(window.location.port=='8000'){
Vue.prototype.$asseturl = '/'
Vue.prototype.$withWWW = 2
Vue.prototype.$withOutWWW = 1
}else{
Vue.prototype.$asseturl = '/public/'
Vue.prototype.$withWWW = 4
Vue.prototype.$withOutWWW = 3
}

localStorage.setItem('getschoolid','125983')


Vue.prototype.$localStorage = localStorage
window.ASSETURL = Vue.prototype.$asseturl
// Vue.prototype.$appName = process.env.MIX_FILE_PATH
// console.log(process.env.MIX_FILE_PATH)
import User from './helpers/User';
window.User = User
import Notification from './helpers/Notification';
window.Notification = Notification
import common from './common'
Vue.mixin(common)
// window._ = require('lodash');
window.Noty = require('noty');
try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.RootUrl = window.location.origin;
// window.ASSETURL = '/public/';
// window.ASSETURL = '/';
