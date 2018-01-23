<template>
  <div>

    <header-image
        v-if="images[0]"
        :image-url="images[0]"
        @header-clicked="openModal"
      >
    </header-image>

    <div class="listing-container">

      <div class="heading">
        <h1>{{ title }}</h1>
        <p>{{ address }}</p>
      </div>

      <hr>
      <div class="about">
        <h3>About this listing</h3>
        <expandable-text>{{ about }}</expandable-text>
      </div>

      <div class="lists">
        <feature-list title="Amenities" :items="amenities">
          <template slot-scope="amenity">
            <i class="fa fa-lg" v-bind:class="amenity.icon"></i>
            <span>{{ amenity.title }}</span>
          </template>
        </feature-list>

        <feature-list title="Prices" :items="prices">
          <template slot-scope="price">
              {{ price.title }}: <strong>{{ price.value }}</strong>
          </template>
        </feature-list>
      </div>

    </div>

    <modal-window ref="imagemodal">
      <image-carousel :images="images"></image-carousel>
    </modal-window>

  </div>  
</template>


<script>
  import { populateAmenitiesAndPrices } from '../js/helpers';

  import ImageCarousel from './ImageCarousel.vue'
  import ModalWindow from './ModalWindow.vue'
  import HeaderImage from './HeaderImage.vue'
  import FeatureList from './FeatureList.vue'
  import ExpandableText from './ExpandableText.vue'

  import routeMixin from '../js/route-mixin'

  export default {
    mixins: [ routeMixin],

    components: {
      ExpandableText,
      FeatureList,
      HeaderImage,
      ModalWindow,
      ImageCarousel
    },

    data() { 
      return {
        title: null,
        about: null,
        address: null,
        amenities: [],
        prices: [],
        images: []
      }
    },

    methods: {
      assignData ({ listing }) {
        Object.assign(this.$data, populateAmenitiesAndPrices(listing))
      },
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
