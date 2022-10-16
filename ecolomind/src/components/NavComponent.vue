<!-- Header et navbar !-->
<template>  
        <nav class="navb">
            <router-link to="/" class="test">Accueil</router-link>

<!-- On souhaite avoir une seule view pour les différentes pièces, donc on doit rendre la navBar dynamique, ce qui facilitera egalement si on veut 
rajouter une pièce plus tard. 
Dans le Json, Rooms est un tableau, on le déclare donc en tant que tel dans les data; la key est obligatoire (value-key). On boucle sur le tableau Rooms pour chaque Room.
L'attribut key permet d'identifier et de rendre unique chaque component   -->
            <router-link   
            v-for="room in rooms"
            :key="room.id" 
            :to="{
                    name: 'single-room', //nom de la route donnée dans Routers pour aller sur la view SingleRoomView
                    params: {
                        id: room.id, 
                    }
            }" class="test">{{room.name}}</router-link>

            <router-link to="/ajout-article" v-if="this.$store.state.userIsConnect" class="test">Proposer une astuce</router-link>

        </nav>  
       
</template>


<script>

//On importe le fichier TipsServices dans lequel se trouve les appels à API dont on aura besoin ici.

import TipsServices from '@/services/TipsServices.js';


export default ({
    name: 'NavComponent',


    // Data c'est une fonction qui permet de créer des propriétés locales au composant. 
    data() {
        return{
            rooms:[], //(dans le wp-json: rooms est un tableau)
        }
    },

    // On créé le hook Created qui sera déclenché quand le composant sera créé (pas encore affiché mais existant)
    async created(){

        this.rooms = await TipsServices.getAllRooms();
    }
    
})
</script>

<style lang="scss" >
@media screen and (max-width: 699px){
.navb{
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-top: 18px;
        a{
            display: flex;
            justify-content: center;
            margin: 7px 0;         
         }  
         .Proposer{
             border-bottom: solid;
         }
}                     
    .dark-theme{
        nav{
            a{
            color: #b9b9b9;
            &.router-link-exact-active {
            color: #42b983;
          }
        }
            .test{
                color: #a19d9d;
            }  
        }                    
    }
}
@media screen and (min-width: 700px){
    nav{
        display: flex;
        justify-content: space-around;
        border: solid 0px;
        border-radius: 30px;
        box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);
        padding: 20px 0;
        margin: 20px 0;
    }
    .dark-theme{      
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
    }
}



</style>

