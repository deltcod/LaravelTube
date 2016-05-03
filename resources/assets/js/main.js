import Vue from 'vue';

const app = new Vue(require('./app.vue'));

Vue.config.debug = false;
Vue.use(require('vue-resource'));

app.$mount('app');
