import Vue from 'vue';

import App from '../components/App.vue'

import router from './router'

var app = new Vue({

  el: '#app',

  components: { App },

  render: h => h(App),

  router

});
