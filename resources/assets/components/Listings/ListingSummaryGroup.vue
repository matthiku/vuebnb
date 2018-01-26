<!--

NAME:
  ListingSummaryGroup

TYPE:
  Vue Component 

PURPOSE:  
  Shows a row of items with scroll controls on both sides

PROPS:
  Parent (caller) must provide:
  - a text for the title
  - an array of items

-->
<template>
  <div class="listing-summary-group">

    <h1>Places in {{ country }}</h1>

    <div class="listing-carousel">

      <div class="controls">
        <carousel-control
            dir="left"
            :style="leftArrowStyle"
            @change-image="change"
          ></carousel-control>
        <carousel-control
            dir="right"
            :style="rightArrowStyle"
            @change-image="change"
          ></carousel-control>
      </div>

      <div class="listing-summaries-wrapper">
        <div class="listing-summaries"
            :style="style"
          >
          <listing-summary
            v-for="listing in listings"
            :listing="listing"
            :key="listing.id"
          ></listing-summary>
        </div>
      </div>

    </div>
  </div>
</template>


<script>
  const rowSize = 3
  const listingSummaryWidth = 365

  import ListingSummary from './ListingSummary.vue'
  import CarouselControl from '../Helper/CarouselControl.vue'

  export default {
    props: [ 'country', 'listings' ],
    components: {
      CarouselControl,
      ListingSummary
    },
    data () {
      return { offset: 0 }
    },
    computed: {
      style () {
        return { transform: `translateX(${this.offset * listingSummaryWidth}px)` }
      },
      leftArrowStyle () {
        return {
          visibility: (this.offset >= 0 ? 'hidden' : 'visible')
        }
      },
      rightArrowStyle () {
        return {
          visibility: (this.offset < -(this.listings.length - rowSize) ? 'hidden' : 'visible')
        }
      }
    },
    methods: {
      change (val) {
        let dir = parseInt(val)
        if (dir < 0 && this.offset < 0) this.offset += rowSize
        if (dir > 0 && this.offset > -(this.listings.length)) this.offset -= rowSize
      }
    }
  }
</script>


<style>
  .listing-summary-group {
    padding-bottom: 20px;
  }

  .listing-summaries {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    transition: transform 0.5s;
  }
  .listing-summaries > .listing-summary {
    margin-right: 15px;
  }

  .listing-summaries > .listing-summary:last-child {
    margin-right: 0;
  }

  .listing-carousel {
    position: relative;
  }

  .listing-carousel .controls {
    display: flex;
    justify-content: space-between;
    position: absolute;
    top: calc(50% - 45px);
    left: -45px;
    width: calc(100% + 90px);
  }

  .listing-carousel .controls .carousel-control{
    color: #c5c5c5;
    font-size: 1.5rem;
    cursor: pointer;
  }

  .listing-summaries-wrapper {
    overflow: hidden;
  }
</style>
