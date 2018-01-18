import Vue from 'vue';
import sample from './data';

var app = new Vue({
  el: '#app',

  data: {
    title: sample.title,
    address: sample.address,
    about: sample.about,
    contracted: true,
    amenities: sample.amenities,
    prices: sample.prices,
    headerImageStyle: {
      'background-image': 'url(images/header.jpg)'
    },
    modalOpen: false
  },

  methods: {
    escapeKeyListener: function(evt) {
      if (evt.keyCode === 27 && this.modalOpen) {
        this.modalOpen = false;
      }
    }
  },

  watch: {
    modalOpen: function () {
      var className = 'modal-open';
      if (this.modalOpen) {
        document.body.classList.add(className);
      } else {
        document.body.classList.remove(className);
      }
    }
  },

  created: function () {
    document.addEventListener('keyup', this.escapeKeyListener);
  },

  destroyed: function () {
    document.removeEventListener('keyup', this.escapeKeyListener);
  }

});
