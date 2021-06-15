require('./bootstrap');
window.Vue = require('vue').default;

import Form from 'vform';
window.Form = Form;

let Fire =new Vue();
window.Fire = Fire;

import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.Toast = Toast;

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '200px'
})

let routes = [
	{ 
		path: "/data-kampus", 
		name: "dataKampus",
		component:require('./components/admin/DataKampusComponent.vue').default
	},
	{ 
		path: "/data-kampus/:kampusId", 
		name: "dataJurusan",
		component:require('./components/admin/JurusanComponent.vue').default
	},
	{ 
		path: "/blog", 
		name: "blog",
		component:require('./components/admin/BlogComponent.vue').default
	}
]

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const router = new VueRouter({
	routes,
	mode: 'history'
});

const app = new Vue({
    el: '#app',
	router
});
