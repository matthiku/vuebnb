<!--

NAME:
  ListingSummary

TYPE:
  Vue Component 

PURPOSE:  
  Shows a single item as part of a listing,
  provides:
  - a link to the details page
  - (ListingSave) an option to add this item to the user's favourites

PROPS:
  Parent (caller) must provide:
  - (listing): the item as an opject

-->
<template>
  <div class="listing-summary">

    <router-link
        tag="div" 
        class="wrapper cursor-pointer"
        :to="{name: 'listing', params: {listing: listing.id}}" 
      >

      <div class="thumbnail" :style="backgroundImageStyle"></div>

      <div class="info title">
        <span>{{ listing.price_per_night }}</span>
        <span>{{ listing.title }}</span>
      </div>

      <div class="info address">{{ listing.address }}</div>

    </router-link>

    <listing-save :id="listing.id"></listing-save>

  </div>
</template>


<script>
  import ListingSave from './ListingSave.vue'

  export default {
    components: { ListingSave },

    props: ['listing'],

    computed: {
      backgroundImageStyle() {
        return {
          'background-image': `url("${this.listing.thumb}")`
        }
      }
    }
  }
</script>


<style>
  .cursor-pointer {
    cursor: pointer;
  }

  .listing-summary {
    flex: 0 0 auto;
    position: relative;
  }

  .listing-summary a {
    text-decoration: none;
  }

  .listing-summary .wrapper {
    max-width: 350px;
    display: block;
  }

  .listing-summary .thumbnail {
    width: 350px;
    height: 250px;
    background-size: cover;
    background-position: center;
  }

  .listing-summary .info {
    color: #484848;
    word-wrap: break-word;
    letter-spacing: 0.2px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .listing-summary .info.title {
    padding-top: 5px;
    font-weight: 700;
    font-size: 16px;
    line-height: 24px;
  }

  .listing-summary .info.address {
    font-size: 14px;
    line-height: 18px;
  }
  
  @media (max-width: 400px) {
    .listing-summary .listing-save {
      left: 15px;
      right: auto;
    }
  }

</style>
