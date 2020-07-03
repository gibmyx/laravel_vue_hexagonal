require('./bootstrap');

import CxltToastr from 'cxlt-vue2-toastr';
import VueResource from 'vue-resource';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

window.Vue = require('vue');
window.tkn = document.head.querySelector('meta[name="csrf-token"]').content;

//importacion de estilos
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css';


const toastrConfigs = {
    position: 'top right',
    showDuration: 2000,
    timeOut: 5000,
    progressBar: true,
    successColor: 'green',
    infoColor: 'blue',
    warningColor: 'orange',
    errorColor: 'red',
};

Vue.use(CxltToastr, toastrConfigs);
Vue.use(VueResource);
// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

Vue.component('crud', require('./Componentes/CrudHexagonal.vue').default);

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', document.head.querySelector('meta[name="csrf-token"]').content);
    next();
});

const app = new Vue({
    el: '#app',
    data: {
        menu: 0,
    }
});
