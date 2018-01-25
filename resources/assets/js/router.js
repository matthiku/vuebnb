import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import ListingPage from '../components/ListingPage.vue'
import HomePage from '../components/HomePage.vue'
import SavedPage from '../components/SavedPage.vue'

import axios from 'axios';
import store from './store';

let router = new VueRouter({

  mode: 'history',

  routes: [
    { 
      path: '/',
      component: HomePage,
      name: 'home' 
    },
    { 
      path: '/listing/:listing',
      component: ListingPage,
      name: 'listing'
    },
    {
      path: '/saved',
      component: SavedPage,
      name: 'saved'
    }
  ]

});

// before each route change (or page reload),
// make sure we have the relvant data for the page
router.beforeEach((to, from, next) => { 
  // read the data delivered in the header of the page (if any)
  let serverData = JSON.parse(window.vuebnb_server_data)

  // first check if we already have the requested data in the store!
  if (
    to.name === 'listing'
      ? store.getters.getListing(to.params.listing)
      : store.state.listing_summaries.length > 0
  ) {
    next()
  }

  // if there was no data, we need to get it via an AJAX call  
  else if (!serverData.path || to.path !== serverData.path) {
    axios.get(`/api${to.path}`)
      .then(({ data }) => {
        store.commit('addData', { route: to.name, data })
        next();
      })
  }
  // save the data from the HEAD section into our Vuex State
  else {
    store.commit('addData', { route: to.name, data: serverData })
    next()
  }
})

export default router
