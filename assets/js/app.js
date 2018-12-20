import Vue from 'vue';
import app from './vue/components/app';
import router from './vue/router';
import VueBootstrapTypeahead from 'vue-bootstrap-typeahead';

const $ = require('jquery');
require('bootstrap');

Vue.component('vue-bootstrap-typeahead', VueBootstrapTypeahead);

new Vue({
    el: '#vueApp',
    template: '<app/>',
    components: { app },
    router: router
});
