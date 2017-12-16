import VueRouter from 'vue-router';
import Dashboard from './components/admin/DashboardComponent.vue';
import showAllExams from './components/admin/exams/showAllExams.vue';
import showQuestions from './components/admin/exams/showQuestions.vue';
import router from './router';
import vSelect from 'vue-select'



require('./bootstrap');

window.Vue = require('vue');
Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('dashboard',Dashboard);
Vue.component('showAllExams',showAllExams);
Vue.component('showQuestions',showQuestions);
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('slim-select', require('./components/SlimeSelectComponent.vue'));
Vue.component('v-select', vSelect);

const app = new Vue({
    el: '#app',
    router,
    data: {

    },
    methods: {
        w3_open() {
            // this.mySidebar=document.getElementById("mySidebar");
            // this.overlayBg=document.getElementById("myOverlay");
            if (this.mySidebar.style.display === 'block') {
                this.mySidebar.style.display = 'none';
                this.overlayBg.style.display = "none";

            } else {
                this.mySidebar.style.display = 'block';
                this.overlayBg.style.display = "block";
            }
        },
        w3_close() {
            this.mySidebar.style.display = 'none';
            this.overlayBg.style.display = "none";
        }
    },
    computed: {
        mySidebar: {
            get() {
                return this.mySidebar = document.getElementById("mySidebar");
            }
        },
        overlayBg: {
            get() {
                return this.mySidebar = document.getElementById("myOverlay");
            }
        }
    }
});
