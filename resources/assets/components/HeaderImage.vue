<!--

NAME:
  HeaderImage

TYPE:
  Vue Sigle File Component

PURPOSE:  
  Shows the complete Listing of an item

DATA:
  A mixin calles the local method 'assignData' to 
  populate the data with either with an API call (AJAX)
  or via the data from the HTML head section
  (see route-mixin.js)

CHILD:
  ListingSave.vue
  - shows a button or icon that enables the user to save this listing as favourite

-->
<template>
  <div class="header">
    <div 
      class="header-img" 
      :style="headerImageStyle" 
      @click="$emit('header-clicked')"
    >
      <listing-save :id="id" :button="true"></listing-save>

      <button class="view-photos">View Photos</button>

    </div>
  </div>
</template>

<script>
  import ListingSave from './ListingSave.vue'

  export default {
    components: { ListingSave },

    props: [ 'image-url', 'id' ],

    computed: {
      headerImageStyle() {
        return {
          'background-image': `url(${this.imageUrl})`
        };
      }
    }
  }
</script>

<style>
  .header {
    height: 320px;
  }

  .header .header-img {
    background-repeat: no-repeat;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-position: 50% 50%;
    background-color: #f5f5f5;
    height: 100%;
    cursor: pointer;
    position: relative;
  }

  .header .header-img button {
    font-size: 14px;
    padding: 7px 18px;
    color: #484848;
    line-height: 1.43;
    background: #ffffff;
    font-weight: bold;
    border-radius: 4px;
    border: 1px solid #c4c4c4;
  }

  .header .header-img button.view-photos {
    position: absolute;
    bottom: 20px;
    left: 20px;
  }
</style>