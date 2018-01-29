import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

import router from './router'

import axios from 'axios'
// attach to all axios requests
axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest',
  'X-CSRF-TOKEN': window.csrf_token  
}

export default new Vuex.Store({
  state: {
    auth: false,
    saved: [],
    loading: false,
    loading_id: null,
    listing_summaries: [],
    listings: [],
    serverData: []
  },

  mutations: {
    toggleSaved(state, id) {
      // try to find this id in the array
      let index = state.saved.findIndex(saved => saved === id);
      // if not found, push it into the array
      if (index === -1) {
        state.saved.push(id);
        // if found, remove it from the array
      } else {
        state.saved.splice(index, 1);
      }
      state.loading = false
    },
    addData(state, { route, data }) {
      // save authentication data from the host
      if (data.auth) {
        state.auth = data.auth;
      }      
      // push the new data into the Vuex store
      if (route === 'listing') {
        state.listings.push(data.listing);
      } else {
        state.listing_summaries = data.listings;
      }      
    }
  },

  actions: {
    toggleSaved ({ commit, state }, id) {
      // only if user is logged in
      if (state.auth) {
        state.loading = true
        state.loading_id = id
        axios.post('/api/user/toggle_saved', { id })
          .then(
            () => commit('toggleSaved', id)
          )
      } else {
        router.push('/login')
      }
    }
  },

  getters: {
    getListing (state) {
      return id => state.listings.find(listing => id == listing.id)
    }
  }

})
