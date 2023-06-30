require('../bootstrap');
import Vue from 'vue'

// Vue.prototype.$themes = 'theme1'
// Vue.prototype.$themes = 'default'
const themeName = 'theme1';



import { BButton, BModal,VBModal  } from 'bootstrap-vue'
Vue.component('b-modal', BModal)
Vue.component('b-button', BButton)



import 'bootstrap-vue/dist/bootstrap-vue.css'



import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes';
import User from '../helpers/User';
window.User = User
Vue.prototype.$appUrl = window.location.origin
import Notification from '../helpers/Notification';
window.Notification = Notification



let UnionSelect = require(`./components/layouts/${themeName}/unonselect.vue`).default;
// import UnionSelect from "./components/layouts/" + theme + "/unonselect.vue";
Vue.component('UnionSelect', UnionSelect);


import adsense from './components/Adsense.vue'
Vue.component('adsense', adsense);



// import SideBar from `./components/layouts/${this.$themes}/SideBar.vue`
let SideBar = require(`./components/layouts/${themeName}/SideBar.vue`).default;
Vue.component('SideBar', SideBar);



import store from '../store'
window.Reload = new Vue();
import Swal from 'sweetalert2'
window.Swal = Swal;



import VeeValidate from 'vee-validate'
Vue.use(VeeValidate, {
  // This is the default
  inject: true,
  // Important to name this something other than 'fields'
  fieldsBagName: 'veeFields',
  // This is not required but avoids possible naming conflicts
  errorBagName: 'veeErrors'
})

import paginate from '../backend/components/notice/paginate.vue'
Vue.component('Pagination', paginate);



import loader from "vue-ui-preloader";

Vue.use(loader);


const router = new VueRouter({

  routes,
  mode: 'history',
})
const app = new Vue({
    el: '#app',
    created:function(){
        (function(d,s,id){
            var js;
            var fjs= d.getElementsByTagName(s)[0];
            if(d.getElementById(id)) return
            js = d.createElement(s)
            js.id = id
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0&appId=950733182430544&autoLogAppEvents=1"
            fjs.parentNode.insertBefore(js,fjs)
        }(document,'script','facebook-jssdk'))

    },
    base: process.env.APP_URL,

    router,
    store
});
