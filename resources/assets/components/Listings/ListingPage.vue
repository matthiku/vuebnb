<!--

NAME:
  ListingPage

TYPE:
  Vue Component 

PURPOSE:  
  Shows the complete Listing of an item


-->
<template>
  <div v-if="listing.id">

    <header-image
        v-if="listing.images"
        :image-url="listing.images[0]"
        @header-clicked="openModal"
        :id="listing.id"
      >
    </header-image>

    <div
        class="listing-container">

      <div class="heading">
        <h1>{{ listing.title }}</h1>
        <p>{{ listing.address }}</p>
      </div>

      <hr>
      <div class="about">
        <h3>About this listing</h3>
        <expandable-text>{{ listing.about }}</expandable-text>
      </div>

      <div class="lists">
        <feature-list title="Amenities" :items="listing.amenities">
          <template slot-scope="amenity">
            <i class="fa fa-lg" v-bind:class="amenity.icon"></i>
            <span>{{ amenity.title }}</span>
          </template>
        </feature-list>

        <feature-list title="Prices" :items="listing.prices">
          <template slot-scope="price">
              {{ price.title }}: <strong>{{ price.value }}</strong>
          </template>
        </feature-list>
      </div>

    </div>

    <modal-window ref="imagemodal">
      <image-carousel :images="listing.images"></image-carousel>
    </modal-window>

  </div>  
</template>


<script>
  import { populateAmenitiesAndPrices } from '../../js/helpers';

  import ImageCarousel from '../Helper/ImageCarousel.vue'
  import ModalWindow from '../Helper/ModalWindow.vue'
  import HeaderImage from './HeaderImage.vue'
  import FeatureList from './FeatureList.vue'
  import ExpandableText from '../Helper/ExpandableText.vue'

  export default {
    components: {
      ExpandableText,
      FeatureList,
      HeaderImage,
      ModalWindow,
      ImageCarousel
    },

    computed: {
      listing () {
        return populateAmenitiesAndPrices(
          this.$store.getters.getListing(this.$route.params.listing)
        )
      }
    },

    methods: {
      openModal () {
        this.$refs.imagemodal.modalOpen = true;
      }
    }
    
  }
</script>


<style>
  .heading {
    margin-bottom: 2em;
  }

  .heading h1 {
    font-size: 32px;
    font-weight: 700;
  }

  .heading p {
    font-size: 15px;
    color: #767676;
  }

  .about {
    margin-top: 2em;
  }

  .about h3 {
    font-size: 22px;
  }
</style>
