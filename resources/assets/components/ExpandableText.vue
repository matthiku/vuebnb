<!--

NAME:
  ExpandableText

TYPE:
  Vue Single File Component 

PURPOSE:  
  Shows text in a paragraph of limited height 
  with the option to extend to the full text

PARENT:
  ListingPage

DATA:
  (text) provided via the default slot

-->
<template>
  <div>

    <p :class="{contracted: contracted}">
      <slot></slot>
    </p>

    <button 
        class="more"
        @click="contracted = !contracted"
      >
      {{ contracted ? '+ More' : '- Less'}}
    </button>

  </div>  
</template>


<script>
  export default {
    data () {
      return {
        contracted: true
      }
    }
  }
</script>


<style>
  p {
    white-space: pre-wrap;
  }

  .contracted {
    height: 250px;
    overflow: hidden;
  }

  .about button.more {
    background: transparent;
    border: 0;
    color: #008489;
    padding: 0;
    font-size: 17px;
    font-weight: bold;
  }

  .about button.more:hover, 
  .about button.more:focus, 
  .about button.more:active {
    text-decoration: underline;
    outline: none;
  }

</style>
