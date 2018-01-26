<!--

NAME:
  ImageCarousel

TYPE:
  Vue Component 

PURPOSE:  
  Shows a single image at a time with controls to scroll to the next/previous image

PROPS:
  Parent (caller) must provide:
  - an array of images

-->
<template>
  <div class="image-carousel">

    <img v-bind:src="image"/>

    <div class="controls">
      <carousel-control dir="left" @change-image="changeImage"></carousel-control>
      <carousel-control dir="right" @change-image="changeImage"></carousel-control>
    </div>

  </div>
</template>

<script>
import CarouselControl from './CarouselControl.vue'

export default {
  components: {
    CarouselControl
  },

  props: ['images'],

  data() {
    return {
      index: 0
    }
  },

  computed: {
    image () {
      return this.images[this.index];
    }
  },

  methods: {
    changeImage (val) {
      let idx = this.index + parseInt(val);
      if (idx < 0) this.index = this.images.length - 1;
      else if (idx >= this.images.length) this.index = 0;
      else this.index = idx;
    }
  }
}
</script>

<style>
.image-carousel img {
  width: 100%;
}

.image-carousel {
  height: 100%;
  margin-top: -12vh;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}

.image-carousel .controls {
  position: absolute;
  width: 100%;
  display: flex;
  justify-content: space-between;
}
</style>
