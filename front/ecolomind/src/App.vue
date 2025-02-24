<template>

<!-- Cette div est pour le theme au chargement de la page. -->
  <div :class="this.theme === 'light' ? 'light-theme' : 'dark-theme'" id="theme-color">
    
      <HeaderComponent />    
    <main>
      <router-view />
    </main>
    <FooterComponent />
    
  </div>
</template>


<script>
import storage from '@/utils/storage.js';
import FooterComponent from '@/components/FooterComponent.vue';
import HeaderComponent from '@/components/HeaderComponent.vue';
import UserServices from '@/services/UserServices';
export default {
  
  name: 'App',

  data(){
    return{       
      theme: "",
    }
  },

  components: {
    FooterComponent,
    HeaderComponent,
  },
  async created(){    
    const stateInLoad = await UserServices.isConnected();
    this.$store.commit('setConnectionState', stateInLoad);
    let color = storage.get('theme')
    if(color){
      this.theme = storage.get('theme')
    }else{
      this.theme = 'light'
    }
  }
}
</script>


<style lang="scss">

* {
  box-sizing: border-box;
  
}
html, body{
  margin: 0;
}

main{
  min-height: calc(100vh - 165px - 103px);
  max-width: 1400px;
  margin: 0 auto;
  padding: 40px 20px 0;
}

a{
  color: #2c3e50;
  text-decoration: none;
  font-weight: 700;

  &:visited{
    color:#2c3e50;
    text-decoration: none; 
  }

  &:active{
    color:white;
  }
}

h1{
  margin:0 0 50px;
  text-align: center;
}

#move{
  position: relative;
  margin-right: 60px;
}

.dark-theme{
  article{
      background-color: #25365133;
    }
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
@media screen and (max-width: 699px){
  .dark-theme{
    background-position: top;
  }
}

@media screen and (min-width: 820px){
  main{
    min-height: calc(100vh - 124px - 103px);
  }
}

.router-link-exact-active {
    color: #42b983;
}

</style>
