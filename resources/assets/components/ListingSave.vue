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
      <i :class="classes"></i>
      {{ message }}
    </button>

    <i v-else :class="classes"></i>

  </div>
</template>


<script>
  export default {
    props: [ 'id', 'button' ],

    computed: {
      isListingSaved () {
        return this.$store.state.saved.find(saved => saved === this.id)
      },
      classes () {
        return {
          'fa': true,
          'fa-lg': true,
          'fa-heart': this.isListingSaved,
          'fa-heart-o': !this.isListingSaved
        }
      },
      message () {
        return this.isListingSaved ? 'Saved' : 'Save'
      }
    },
    
    methods: {
      toggleSaved() {
        // Implement this
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
