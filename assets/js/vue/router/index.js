import Vue from 'vue';
import VueRouter from 'vue-router';
import ipAddress from '../components/ipAddress';
import ipAddresses from '../components/ipAddresses';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: ipAddress },
        { path: '/addresses', component: ipAddresses }
    ],
});
