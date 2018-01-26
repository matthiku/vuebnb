<!--

NAME:
  ListingSave

TYPE:
  Vue Component 

PURPOSE:  
  Shows an icon or button to save/remove the current item to the favourites list

PROPS:
  Parent (caller) must provide:
  - the 'id' of the item
  - (optional)(boolean) whether this should be rendered as a button

READS:
  (Vuex Store) state.saved

WRITES:
  (Vuex Store Commit) 'toggleSaved'

-->
<template>
  <div class="listing-save" @click.stop="toggleSaved()">

    <button v-if="button">
      <i  class="fa fa-lg"
          :class="icon"
        ></i>
      {{ message }}
    </button>

    <i v-else class="fa fa-lg" :class="icon"></i>

  </div>
</template>


<script>
  export default {
    props: [ 'id', 'button' ],

    computed: {
      isListingSaved () {
        return this.$store.state.saved.find(saved => saved === this.id)
      },
      icon () {
        if (this.loading) return 'fa-spin fa-spinner'
        if (this.isListingSaved) return 'fa-heart'
        return 'fa-heart-o'
      },
      message () {
        return this.isListingSaved ? 'Saved' : 'Save'
      },
      loading () {
        return this.$store.state.loading && this.$store.state.loading_id === this.id
      }
    },
    
    methods: {
      toggleSaved() {
        this.$store.dispatch('toggleSaved', this.id)
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

  .listing-save i {
    padding-right: 4px;
  }

  .listing-save .fa-heart-o {
    color: #808080;
  }

  .listing-save .fa-heart {
    color: red;
  }
</style>
