<!--

NAME:
  HomePage

TYPE:
  Vue Component 

PURPOSE:  
  Entry page showing all available listings

IMPORTS:
  ListingSummaryGroup - show listings in rows

DATA:
  A mixin calles the local method 'assignData' to 
  populate the data either with an API call (AJAX)
  or via the data from the HTML head section
  (see route-mixin.js)

-->
<template>
  <div class="home-container">

    <listing-summary-group
        v-for="(group, country) in listing_groups"
        :key="country"
        :listings="group"
        :country="country"
        class="listing-summary-group"
      >
    </listing-summary-group>

  </div>
</template>


<script>
  import { groupByCountry } from '../../js/helpers'
  import ListingSummaryGroup from './ListingSummaryGroup.vue'

  export default {
    computed: {
      listing_groups() {
        return groupByCountry(this.$store.state.listing_summaries);
      }
    },

    components: {
      ListingSummaryGroup
    },

    methods: {
      assignData ({ listings }) {
        this.listing_groups = groupByCountry(listings)
      }      
    }
  }
</script>


<style>
  .home-container {
    margin: 0 auto;
    padding: 0 25px;
  }

  @media (min-width: 1131px) {
    .home-container {
      width: 1080px;
    }
  }

  @media (min-width: 1231px) {
    .home-container {
      width: 1180px;
    }
  }
</style>
