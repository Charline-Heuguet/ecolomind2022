<template>

<div class="fav-button">
    <button class="button-fav fav" name="favorite" type="button" v-on:click.prevent="ClickFav()">
        <img src="../assets/coeur-like.png" alt="coeur-vert" title="ajouter aux favoris">
    </button>
</div>
</template>

<script>
import axios from "axios";
import storage from "@/utils/storage";
export default {
    name: "FavorisComponent",
    data(){
        return{
            favData: {
                authorID: storage.get('userData').userID,
                astuce_id: this.astuce_id,
            },
        }
    },

    props :{
        astuce_id : Number,
    },

    created(){

        const base_url= "http://ecolomind.local/wp-json";
        
            // on fait un appel au custom Endpoint Checkfavorites pour savoir si l'utilisateur connecté actuel a deja liké ce post
            axios.get(base_url + "/wp/v2/ecolomind/checkfavorites?author_id="+this.favData.authorID+"&tips_id="+this.astuce_id)
            .then((response) => {
            
            let buttonFav = document.getElementsByClassName("button-fav")[0]; // Ca c'est le bouton fav
            
            //Si la longueur du tableau de response.data est sup a 0 (donc tableau pas vide = donc utlisateur a liké ce post)
            if(response.data.length>0){
                buttonFav.classList.toggle("fav"); //Alors on enleve la class fav 
                buttonFav.classList.toggle("unfav"); // On rajoute la class unfav 
            }
                buttonFav.classList.add("active"); // Ligne pour ne pas avoir la micro seconde d'affichage du coeur vert par defaut.
                
            });
 
    },


    methods : {
        async ClickFav(){

            //getElementsByClassName renvoie forcément un tableau car potentiellement plusieurs éléments ont cette classe.
            // on selectionne la premiere ligne du tableau
            let buttonFav = document.getElementsByClassName("button-fav")[0];
            
            // On ajoute ou enlève une classe au bouton
            buttonFav.classList.toggle("fav");
            buttonFav.classList.toggle("unfav");




            //Si notre bouton a la class fav : element.classList.contains() alors on ajoute author_id et astuce_id a la BDD
            //Si notre bouton a la class unfav, on fait un appel API qui ENVOIE (car POST) au endpoint unfavorites un author_id et un astuce_id
            // et c'est le endpoint qui transmet a la BDD les éléments à supprimer.            

            if (buttonFav.classList.contains("fav")){
                axios.post('http://ecolomind.local/wp-json/wp/v2/ecolomind/unfavorites', JSON.parse(JSON.stringify(this.favData)))
             .then()
            .catch(function(){
            // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
            return {data: null}
        });
            }

            if (buttonFav.classList.contains("unfav")){
                console.log("le bouton a la classe UNFAV")
                axios.post('http://ecolomind.local/wp-json/wp/v2/ecolomind/favorites', JSON.parse(JSON.stringify(this.favData)))
             .then()
             .catch(function(){

            // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
            return {data: null}
            });
            }



            

        },

        getCurrentUserName(){
            return storage.get('userData').user_display_name;
        },
    }
}
</script>






<style lang="scss">

.success{
    font-size: 12px;
    position: absolute;
    bottom: -10px;
    left: 0;
    right: 0;
}

.fav-button{
    display: inline-block;
}
.fav, .unfav{
    display: none;
    border: none;
    background: none;
    transition: all 0.6s;
    &.active{
        display: block;
    }
    &:hover{
        transform: scale(1.1);
    }
    img{
        width: 30px;
    }
} 

.fav {
    img{
        filter: grayscale(100%);
    }
}

</style>