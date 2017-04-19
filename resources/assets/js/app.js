/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import vSelect from 'vue-select'
Vue.component('v-select', vSelect)

Vue.component('courses-select', require('./components/select/CoursesSelect.vue'));
Vue.component('instructors-select', require('./components/select/InstructorsSelect.vue'));


Vue.component('dashboard', require('./components/Dashboard.vue'));

Vue.component('admin-users-list', require('./components/admin/UsersList.vue'));
Vue.component('admin-courses-list', require('./components/admin/CoursesList.vue'));
Vue.component('admin-sections-list', require('./components/admin/SectionsList.vue'));

Vue.component('faculty-courses-list', require('./components/faculty/CoursesList.vue'));
Vue.component('faculty-requests-list', require('./components/faculty/RequestsList.vue'));
Vue.component('faculty-requests-create', require('./components/faculty/RequestsCreate.vue'));

Vue.component('registrar-requests-list', require('./components/registrar/RequestsList.vue'));
Vue.component('registrar-settings', require('./components/registrar/Settings.vue'));



toastr.options = {
    "closeButton": false,
    "positionClass": "toast-bottom-right",
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "2000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}


const app = new Vue({
    el: '#app',

    data: {
        users: [],
        courses: [],
        sections: [],
        instructors: []
    },

    created() {

        axios.get('/api/users').then(response => {
            this.users = response.data;
            // setTimeout(function () {
                $('#dataTable').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            // }, 500);

        });

        axios.get('/api/courses').then(response => {
            this.courses = response.data;
        });

        axios.get('/api/sections').then(response => {
            this.sections = response.data;
        });

        axios.get('/api/instructors').then(response => {
            this.instructors = response.data;
        });
    }
});
