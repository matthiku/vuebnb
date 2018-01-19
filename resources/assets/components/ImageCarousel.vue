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
export default {
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

</style>
