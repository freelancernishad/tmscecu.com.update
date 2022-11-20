require('../bootstrap');
import Vue from 'vue'


// var { BootstrapVue, IconsPlugin } = () => import('bootstrap-vue')

// import { BootstrapVue } from 'bootstrap-vue'
import {BForm,BFormInvalidFeedback} from 'bootstrap-vue/src/components/form'
import {BFormGroup} from 'bootstrap-vue/src/components/form-group'
import {BFormInput} from 'bootstrap-vue/src/components/form-input'
import {BFormSelect,BFormSelectOption,BFormSelectOptionGroup} from 'bootstrap-vue/src/components/form-select'
import {BInputGroup,BInputGroupAppend,BInputGroupPrepend,BInputGroupText,BInputGroupAddon} from 'bootstrap-vue/src/components/input-group'
import {BFormDatepicker} from 'bootstrap-vue/src/components/form-datepicker'
import {BFormFile} from 'bootstrap-vue/src/components/form-file'
import {BButton,BButtonClose} from 'bootstrap-vue/src/components/button'
import {BModal} from 'bootstrap-vue/src/components/modal'

Vue.component('BForm', BForm);
Vue.component('BFormInvalidFeedback', BFormInvalidFeedback);
Vue.component('BFormGroup', BFormGroup);
Vue.component('BFormInput', BFormInput);
Vue.component('BFormSelect', BFormSelect);
Vue.component('BFormSelectOption', BFormSelectOption);
Vue.component('BFormSelectOptionGroup', BFormSelectOptionGroup);

Vue.component('BInputGroup', BInputGroup);
Vue.component('BInputGroupAppend', BInputGroupAppend);
Vue.component('BInputGroupPrepend', BInputGroupPrepend);
Vue.component('BInputGroupText', BInputGroupText);
Vue.component('BInputGroupAddon', BInputGroupAddon);

Vue.component('BFormDatepicker', BFormDatepicker);
Vue.component('BFormFile', BFormFile);
Vue.component('BButton', BButton);
Vue.component('BButtonClose', BButtonClose);
Vue.component('BModal', BModal);

// Import Bootstrap and BootstrapVue CSS files (order is important)
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
// Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
// Vue.use(IconsPlugin)

import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes';
import User from '../helpers/User';
window.User = User
Vue.prototype.$appUrl = window.location.origin
import Notification from '../helpers/Notification';
window.Notification = Notification
import UnionSelect from './components/layouts/unonselect.vue'
Vue.component('UnionSelect', UnionSelect);

import SideBar from './components/layouts/SideBar.vue'
Vue.component('SideBar', SideBar);


import store from '../store'
// var store = () => import('../store')
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


const router = new VueRouter({
  routes,
  mode: 'history'
})
const app = new Vue({
    el: '#app',
    router,
    store
});
