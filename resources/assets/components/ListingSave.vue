<template>
  <div class="listing-save" @click.stop="toggleSaved()">

    <i class="fa fa-lg fa-heart-o"></i>

  </div>
</template>


<script>
  export default {
    props: [ 'id' ],
    methods: {
      toggleSaved() {
        // Implement this
      }
    }
  }
</script>


<style>
  .listing-save {
    position: absolute;
    top: 20px;
    right: 20px;
    cursor: pointer;
  }

  .listing-save .fa-heart-o {
    color: #ffffff;
  }
</style>
