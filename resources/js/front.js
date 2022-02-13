import Vue from 'vue';
import App from './views/App.vue';
import ZoomOnHover from "vue-zoom-on-hover";

// app router
import router from './routes';

Vue.use(ZoomOnHover)
const root = new Vue({
    el: '#root',
    router,
    render: h => h(App),
})