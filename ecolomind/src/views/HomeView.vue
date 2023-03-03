<!-- Page d'accueil -->

<template>


    <!-- Encart Dark/light mode -->
    <div v-if="this.theme == 'light'">
      <a href="" @click.prevent="changeTheme()" id="move" >
        <img src="@/assets/sun.svg" class="switcher" alt="soleil">
      </a>  
    </div>

    <div v-if="this.theme == 'dark'">        
        <a href="" @click.prevent="changeTheme()" id="move" >
            <img src="@/assets/lune.png" class="switcher" alt="soleil">
        </a> 
    </div>

    <div class="construction">
      
      <p><img src="@/assets/cone.svg" alt="pylone de chantier">CE SITE EST EN RENOVATION <img src="@/assets/barrier.svg" alt="barriere de chantier"></p>
      
    </div>
    
    <img src="@/assets/nuage.png" alt="" class="cloud" id="cloud"> 
    <p class="welcome"> Site de partage d'astuces écologiques dans la maison. </p>  
    <p class="welcome mobile-wl"> Découvrez-les en cliquant sur une des pièces ci-dessous</p>

<!-- La maison en dynamique -->
    <div id="image">  
        <img id="background" src="../assets/maison-vide-ok.png" alt="maison sans les pieces">
        <a href="">
          <img id="entree" src="../assets/entree.png" alt="entrée">
        </a>

        <router-link 
        v-for="room in rooms" 
        :key="room.id" 
        :to="{
          name: 'single-room',
          params: {
            id: room.id,
          }    
        }">

        <img :id="room.slug" :src="getUrlImg(room)" :alt="room.name">  

        </router-link>
      </div>

  <!-- version mobile -->

  <div class="mobile-home">
    
    <h1>Ecolomind</h1>
    <div class="cont-home">
          <router-link class="room"
            v-for="room in rooms" 
            :key="room.id" 
            :to="{
              name: 'single-room',
              params: {
                id: room.id,
              }    
            }">
            
   
      <h2>{{room.name}}</h2>

          </router-link>      
    </div>
  </div>
</template>



<script>

import TipsServices from "@/services/TipsServices";
import storage from '@/utils/storage';


// @ is an alias to /src
export default {
  name: 'HomeView',

  components: {
  },

  //les déclarations
  data(){
    return{
      rooms:[],
      theme: "",
    }
  },

  methods : 
  {
    getUrlImg(room){
        return require("../assets/"+room.slug+".png")
    },

    changeTheme(){
            this.theme = this.theme === "dark" ? "light" : "dark";
            storage.set('theme', this.theme);
            let themeColor = document.getElementById("theme-color");
            themeColor.classList.toggle("dark-theme");
            themeColor.classList.toggle("light-theme");
            
        },
  },

  async created(){
    this.rooms = await TipsServices.getAllRooms();

    let color = storage.get('theme')
        if(color){
            this.theme = storage.get('theme')
        }else{
            this.theme = 'light'
        }

    // mouvement du soleil / de la lune en fct de la souris
    addEventListener('mousemove', () => {
        var e = window.event;
        var posX = e.clientY;
        let move = document.getElementById('move');
        let viewport_width = window.innerHeight;
        let offSet = -15*posX/viewport_width;
        move.style.top = offSet+"px";
        });
  },
}
</script>



<style lang="scss" >

.construction{
  display: flex;
  justify-content: center;
  align-items: center;    
  
  p{
    border: 2px solid;
    background: #f8d7da;
    color: #ba3f51;
    padding: 15px;
    font-size: larger;
  }
  
  img{
    width: 40px;
    margin-left: 10px;
    margin-right: 10px;
  }
}


  h2{
      margin: 0;
    }

  .cont-home{
    text-align: center;
    a{
      display: inline-block;
      width: 100%;
    }
  }
  .switcher{
      max-width: 90px;
      float: right;
      margin-top: -30px;//on remonte un peu le soleil/la lune
  }
  
  .welcome {
    text-align: center;
  }
  .mobile-wl{
    display: none;
    font-size: 20px;
  }
  .mobile-home{
    p{
      margin-left: 2em;
    }
  }
  .cloud{
    margin: 15px 20px;
    width: 120px;
  }
  #image{
    display: none;
  }
  
  .room{
    text-align: center;
    padding: 11px;
    margin: 0 3px 20px 3px;
    border-radius: 40px;
    border: 2px solid;
    max-width: 380px;    
  }

  .dark-theme{
    
    .room{
      border: 2px solid #9aa5b1;    
      color: #9aa5b1;
    }
  }


@media screen and (min-width: 700px){
  .welcome{
    font-size: 20px;
  }
  .mobile-home{
  display: none;
  }     
  .mobile-wl{
    display: block;
  }
  .cloud{
    margin-top: 5px;
    margin-left: 20em;
    width: 300px;
  }
  // maison en dynamique
#image{
  display: block;
  // max-width: 60%;
  background-repeat: no-repeat;
  width: 80%;
  position: relative;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: -7px;
}
#background{
  width: 100%;
}
#salle-de-bain{
  width: 51%;
  height : 33.5%;
  position: absolute;
  top: 8%;
  left: 27.3%;
  transform: scale(1);
  transition: all .6s ; 
 filter:brightness(50%)
}
#chambre{
  width: 27%;
  position: absolute;
  height : 26%;
  top: 43%;
  left: 27.55%;
  transform: scale(1);
  transition: all .6s ; 
  filter:brightness(50%)
}
#salon{
  width: 22.1%;
  height : 26%;
  position: absolute;
  top: 43%;
  left: 56.04%;
  transform: scale(1);
  transition: all .6s ; 
  filter:brightness(50%)
}
#entree{
  width: 15%;
  height:27.2%;
  position: absolute;
  top: 70.3%;
  left: 27.5%;
  transform: scale(1);
  transition: all .6s ; 
  filter:brightness(50%)
}
#cuisine {
  width: 34.4%;
  height:27.2%;
  position: absolute;
  top: 70.3%;
  left: 43.8%;
   transform: scale(1);
  transition: all .6s ; 
  filter:brightness(50%)
}
#jardin{
  width: 22%;
  position: absolute;
  top: 84%;
  left: 2%;
  transform: scale(1);
  transition: all .6s ; 
  filter:brightness(50%)
}
#salle-de-bain:hover{
   /* transform: scale(1.1); */
   filter: brightness(100%);
}
#salon:hover{
  /* transform: scale(1.1); */
  filter: brightness(100%);
} 
#sdb:hover{
  filter: brightness(100%);
 /*  transform: scale(1.1); */
}
#entree:hover{
  filter: brightness(100%);
  /* transform: scale(1.1); */
}
#cuisine:hover{
  filter: brightness(100%);
  /* transform: scale(1.1); */
}
#chambre:hover{
  filter: brightness(100%);
/*   transform: scale(1.1); */
}
#jardin:hover{
   filter: brightness(100%); 
  animation: shake 0.8s cubic-bezier(.36,.07,.19,.97) both;
  transform: translate3d(0, 0, 0);
  backface-visibility: hidden;
  perspective: 1000px;
  transition: all .6s ;
}
@keyframes shake {
  10%, 90% {
    transform: translate3d(-1px, 0, 0);
  }

  20%, 80% {
    transform: translate3d(2px, 0, 0);
  }

  30%, 50%, 70% {
    transform: translate3d(-4px, 0, 0);
  }

  40%, 60% {
    transform: translate3d(4px, 0, 0);
  }
}
}

@media screen and (min-width: 950px){
  .switcher{
    max-width: 110px;
  }
}

@media screen and (min-width: 1150px){
  .switcher{
    max-width: 140px;
  }
}
</style>
