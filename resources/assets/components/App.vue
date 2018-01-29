<!--

NAME:
  App

TYPE:
  Vue Single File Component 

PURPOSE:  
  Main page of this app

PARENT:
  none

CHILDREN:
  (toolbar), RouterView, CustomFooter

-->
<template>
  <div>

    <div id="toolbar">

      <!-- brand logo and name -->
      <router-link 
          :to="{name: 'home'}">
        <img class="icon" :src="logoUrl">
        <h1>vuebnb</h1>
      </router-link>

      <!-- navigation menu -->
      <ul class="links cursor-pointer">
          <router-link 
              v-if="routeName != 'home'"
              tag="li" 
              :to="{name: 'home'}"
            >All Listings
          </router-link>

          <router-link 
              v-if="routeName != 'saved' && authenticated"
              tag="li" 
              :to="{name: 'saved'}"
            >Saved Listings<sup v-if="savedCount">({{ savedCount }})</sup>
          </router-link>

          <router-link
              v-if="!authenticated"
              tag="li" 
              :to="{name: 'login'}"
            >Login
          </router-link>

          <li 
              v-if="authenticated"
              @click="logout"
              class="router-link-active">
            Logout
            <form 
                style="display: hidden"
                action="/logout"
                method="post"
                id="logout">
              <input type="hidden" name="_token" :value="csrf_token">
            </form>
          </li>
      </ul>
    </div>

    <router-view></router-view>

    <custom-footer></custom-footer>

  </div>  
</template>


<script>
  import CustomFooter from './CustomFooter.vue'

  export default {
    components: { CustomFooter },
    data () {
      return {
        csrf_token: window.csrf_token
      }
    },
    computed: {
      authenticated () {
        return this.$store.state.auth
      },
      routeName () {
        return this.$route.name
      },
      savedCount () {
        return this.$store.state.saved.length
      },
      logoUrl () {
        return `${window.cdn_url || ''}images/logo.png`
      }
    },
    methods: {
      logout () {
        document.getElementById('logout').submit()
      }
    }
  }
</script>


<style>
  #toolbar {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #e4e4e4;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
  }

  #toolbar .icon {
    height: 34px;
    padding: 16px 12px 16px 24px;
    display: inline-block;
  }

  #toolbar h1 {
    color: #4fc08d;
    display: inline-block;
    font-size: 28px;
    margin: 0;
  }

  #toolbar a {
    display: flex;
    align-items: center;
    text-decoration: none;    
  }

  #toolbar ul {
    display: flex;
    align-items: center;
    list-style: none;
    padding: 0 24px 0 0;
    margin: 0;
  }

  @media (max-width: 373px) {
    #toolbar ul  {
      padding-right: 12px;
    }
  }

  #toolbar ul li {
    padding: 10px 10px 0 10px;
  }

  ul li.router-link-exact-active {
    text-decoration: underline;
  }

  #toolbar ul li a {
    text-decoration: none;
    line-height: 1;
    color: inherit;
    font-size: 13px;
    padding-bottom: 8px;
    letter-spacing: 0.5px;
    cursor: pointer;
  }

  #toolbar ul li a:hover {
    border-bottom: 2px solid #484848;
    padding-bottom: 6px;
  }
</style>
