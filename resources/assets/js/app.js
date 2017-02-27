
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('sweetalert');
require('slug');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('pages', require('./components/Pages/Pages.vue'));
Vue.component('page-create', require('./components/Pages/PageCreate.vue'));
Vue.component('page-edit', require('./components/Pages/PageEdit.vue'));

Vue.component('users', require('./components/Users/Users.vue'));
Vue.component('user-view', require('./components/Users/UserView.vue'));

Vue.use(require('vue-resource'));
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('content');

const app = new Vue({
    el: '#app'
});
