import Vue from 'vue';

import ListingPage from '../components/ListingPage.vue'

var app = new Vue({

  el: '#app',

  components: {
    ListingPage
  },

  render: h => h(ListingPage)

});
