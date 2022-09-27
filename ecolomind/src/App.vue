<template>
  <HeaderComponent />
  <NavComponent />
  <router-view />
  <FooterComponent />
</template>


<script>
import NavComponent from '@/components/NavComponent.vue';
import FooterComponent from '@/components/FooterComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';
import UserServices from '@/services/UserServices';
export default {
  name: 'App',
  components: {
    NavComponent,
    FooterComponent,
    HeaderComponent,
  },


  async created(){
    const stateInLoad = await UserServices.isConnected();
    this.$store.commit('setConnectionState', stateInLoad);
  }
}


</script>


<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
