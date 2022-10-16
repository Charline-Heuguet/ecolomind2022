<!-- Page d'accueil -->

<template>
  
    <img src="@/assets/nuage.png" alt="" class="cloud" id="cloud">   
 <div id="image">
    <img id="background" src="../assets/maison-vide-ok.png" alt="maison sans les pieces">

    <a href="">
      <img id="entree" src="../assets/entree.png" alt="">
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

  <div class="mobile-home">
    <h1>Ecolomind</h1>
    <p>text du site</p>

    <div class="cont-home">
      <div class="room room-bed">
        <h2>Chambre</h2>
      </div>
      <div class="room room-kitchen">
        <h2>Cuisine</h2>
      </div>
      <div class="room room-garden">
        <h2>Jardin</h2>
      </div>
      <div class="room room-bath">
        <h2>Salle de bain</h2>
      </div>
      <div class="room room-living">
        <h2>Salon</h2>
      </div>
    </div>
  </div>
</template>



<script>

import TipsServices from "@/services/TipsServices";


// @ is an alias to /src
export default {
  name: 'HomeView',
  components: {
  },

  //les déclarations
  data(){
    return{
      rooms:[],
    }
  },

  methods : 
  {
    getUrlImg(room){
        return require("../assets/"+room.slug+".png")
    }
  },

  async created()
  {
    this.rooms = await TipsServices.getAllRooms();
  },
}
</script>



<style lang="scss" >
@media screen and (max-width: 699px){
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
  .cont-home{
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: repeat(5, 1fr);
    grid-column-gap: 5px;
    grid-row-gap: 10px;
  }
  .room{
    max-width: 98%;
    max-height: 30em;
    margin: 0 3% 0 3%;
    border-radius: 20px;
    background: no-repeat url('~@/assets/jardin.png'), linear-gradient(96.2deg, rgba(185, 227, 152, 0.31) 37.45%, rgba(129, 176, 91, 0.5) 68.53%);;
  }
  .room-bed{
    grid-area: 1 / 1 / 2 / 2;
   
  }
  .room-kitchen{
    grid-area: 2 / 1 / 3 / 2;
    
  }
  .room-garden{
    grid-area: 3 / 1 / 4 / 2;
   
  }
  .room-bath{
    grid-area: 4 / 1 / 5 / 2;
    
  }
  .room-living{
    grid-area: 5 / 1 / 6 / 2;
   
  }
}

@media screen and (min-width: 700px){
  .mobile-home{
  display: none;
  }     
  .cloud{
    margin: 5em 05em;
    width: 300px;
  }
#image{
  max-width: 60%;
  background-repeat: no-repeat;
  width: 80%;
  position: relative;
  margin-left: auto;
  margin-right: auto;

}
#background{
  width: 100%;
}
#salle-de-bain{
  width: 51%;
  position: absolute;
  top: 8.1%;
  left: 27.3%;
  transform: scale(1);
  transition: all .6s ; 
 filter:brightness(50%)
}
#chambre{
  width: 27%;
  position: absolute;
  height : 25.8%;
  top: 43%;
  left: 27.55%;
  transform: scale(1);
  transition: all .6s ; 
  filter:brightness(50%)
}
#salon{
  width: 22.1%;
  height : 25.8%;
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
</style>
