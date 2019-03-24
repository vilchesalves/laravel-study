import Vue from 'vue';
import VueRouter from 'vue-router';

import './bootstrap';

import router from './routes';

Vue.use(VueRouter);

window.dashboard = new Vue({
  el: '#dashboard',
  router,
  template: '<router-view />',
});
