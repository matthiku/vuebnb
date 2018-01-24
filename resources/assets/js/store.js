import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    saved: []
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
    }
  }
})
