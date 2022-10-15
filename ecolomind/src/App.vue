<template>
  <div :class="this.theme === 'light' ? 'light-theme' : 'dark-theme'" >
    <div  class="header-container">
      <HeaderComponent />
      <div v-if="this.theme == 'light'">
        <a href="" @click.prevent="changeTheme()" id="move" ><img src="@/assets/soleil.png" class="switcher" alt="soleil"></a>  
      </div>
      <div v-if="this.theme == 'dark'">        
          <a href="" @click.prevent="changeTheme()" id="move" ><img src="@/assets/lune.png" class="switcher" alt="soleil"></a> 
      </div>   
    </div>
    <NavComponent />
    <router-view />
    <FooterComponent />
    </div>
</template>


<script>
import storage from '@/utils/storage.js';
import NavComponent from '@/components/NavComponent.vue';
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
  methods: {
    changeTheme(){
      this.theme = this.theme === "dark" ? "light" : "dark";
      storage.set('theme', this.theme); 
    },    
  },
  components: {
    NavComponent,
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

    addEventListener('mousemove', () => {
      var e = window.event;
      var posX = e.clientY;
      let move = document.getElementById('move');
      let viewport_width = window.innerHeight;
      let offSet = -15*posX/viewport_width;
      move.style.top = offSet+"px";
    });
  }
}


</script>


<style lang="scss">
body{
  margin: 0;
}
h1{
  margin-left: 10px;
}
h2{
  margin-left: 10px;
}
h3{
  margin-left: 10px;
}
* {
  box-sizing: border-box;
  
}
#move{
  position: relative;
}
a{
  &.router-link-exact-active {
    color: #42b983;
  }
}
.header-container{
  display: flex;
    justify-content: space-between;
}
.switcher{
  max-width: 120px;
  margin-right: 5vh;
  margin-top: 2vh;
}
.light-theme{
    background: linear-gradient(180deg, rgb(105, 177, 219) 0%, rgba(255,255,255,1) 100%);
      nav{
        a{
          color: #2c3e50;
          &.router-link-exact-active {
            color: #42b983;
          }
        }
      }

  .card{   
    background-color: #c7d3e3;
    border: 2px solid  #a7b2c0;
      p{
        color: #6c6f74;
      }
  }

}
.dark-theme{       
    background: url('~@/assets/stars.png'), linear-gradient(180deg, #053A79 0%, #5C6269 100%);
    background-size: contain;
    background-position: center;
    color: #b9b9b9;
      nav{
        background: linear-gradient(270.35deg, #253651 7.88%, rgba(54, 77, 113, 0.5) 100.72%);
        border-radius: 100px;
        z-index: 10;
          a{
            color: #b9b9b9;
            &.router-link-exact-active {
            color: #42b983;
          }
        }
      }

    .card{
      color: #e8e8ee;
      background-color: #253651;
      border: 2px solid  #a7b2c0;
    }
      .user-state{       
        background: linear-gradient(270.35deg, #253651 7.88%, rgba(54, 77, 113, 0.5) 100.72%);        
        border-radius: 30px;
        span{
          color: #b9b9b9;
        }
          a{           
            color: #b9b9b9;
        }
    }
    article{
      a{
        color: #b9b9b9;
        #suite{
          color: #9a19b4;
        }
      }
    }
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

</style>
