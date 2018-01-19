import Vue from 'vue';
import { populateAmenitiesAndPrices } from './helpers';

let model = JSON.parse(window.vuebnb_listing_model);
model = populateAmenitiesAndPrices(model)

import ImageCarousel from '../components/ImageCarousel.vue'
import CarouselControl from '../components/CarouselControl.vue'

var app = new Vue({
  el: '#app',

  data: Object.assign(model, {
    headerImageStyle: {
      'background-image': `url(${model.images[0]})`
    },
    contracted: true,
    modalOpen: false
  }),

  methods: {
    escapeKeyListener (evt) {
      if (evt.keyCode === 27 && this.modalOpen) {
        this.modalOpen = false;
      }
    }
  },

  watch: {
    modalOpen () {
      var className = 'modal-open';
      if (this.modalOpen) {
        document.body.classList.add(className);
      } else {
        document.body.classList.remove(className);
      }
    }
  },

  components: {
    ImageCarousel,
    CarouselControl
  },

  created () {
    document.addEventListener('keyup', this.escapeKeyListener);
  },

  destroyed () {
    document.removeEventListener('keyup', this.escapeKeyListener);
  }

});
