import Vue from 'vue';
import App from '../components/App.vue'
import router from './router'
import store from './store'

var app = new Vue({
  el: '#app',
  components: { App },
  render: h => h(App),
  router,
  store
});
