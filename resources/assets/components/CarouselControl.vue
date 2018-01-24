<!--

NAME:
  CarouselControl

TYPE:
  Vue Single File Component 

PURPOSE:  
  Providse controls (icons) to scroll items in the parent

PARENT:
  ImageCarousel

PROPS:
  (number) dir: Direction: -1 (left) 1 (right)

EVENT:
  emits the 'change-image' event with the direction as payload

-->
<template>
  <i 
      :class="classes"
      @click="clicked"
    >
  </i>
</template>


<script>
export default {
  name: 'CarouselControl',

  props: ['dir'],

  computed: {
    classes () {
      return 'carousel-control fa fa-2x fa-chevron-' + this.dir;
    }
  },

  methods: {
    clicked () {
      this.$emit('change-image', this.dir === 'left' ? -1 : 1);
    }
  }
}
</script>


<style>
  .carousel-control {
    padding: 1rem;
    color: #ffffff;
    opacity: 0.85;
    cursor: pointer;
  }

  @media (min-width: 744px) {
    .carousel-control {
      font-size: 3rem;
      cursor: pointer;
    }
  }
</style>
