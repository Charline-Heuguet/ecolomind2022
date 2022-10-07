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

* {
  box-sizing: border-box;
  
}
body{
    background: rgb(196,211,229);
    background: linear-gradient(180deg, rgba(196,211,229,1) 0%, rgba(255,255,255,1) 100%);
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;

}

</style>
