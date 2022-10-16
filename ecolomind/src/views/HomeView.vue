<!-- Page d'accueil -->

<template>
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

  

  // computed:
  // {
  //   // location.reload();
  // }
}
</script>



<style lang="scss" >
@media screen and (max-width: 699px){
  #image{
  display: none;
}

}
@media screen and (min-width: 700px){   
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
