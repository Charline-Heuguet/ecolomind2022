<template>

<div class="fav-button">
    <button class="fav" name="favorite" type="button" v-on:click.prevent="ClickFav()">
        <img src="../assets/coeur-like.png" alt="coeur-vert" title="ajouter aux favoris">
    </button>
</div>
</template>




<script>
import axios from "axios";
import storage from "@/utils/storage";
export default {
    name: "ButtonFavoritesComponent",
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


    methods : {
        async ClickFav(){
            //console.log(JSON.parse(JSON.stringify(this.favData)));

             axios.post('http://ecolomind.local/wp-json/wp/v2/ecolomind/favorites', JSON.parse(JSON.stringify(this.favData)))
             .then()
             .catch(function(){
            // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
            return {data: null}
            });


            let buttonFav = document.querySelector('.fav-button');
            buttonFav.classList.toggle('favhidden');

            let buttonUnFav = document.querySelector('.unfav');
            buttonUnFav.classList.toggle('favhidden');      
        },


        getCurrentUserName(){
            return storage.get('userData').user_nicename;
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
.fav{
    border: none;
    background: none;
    transition: all 0.6s;
    &:hover{
        transform: scale(1.1);
    }
    img{
        width: 30px;
    }

} 

</style>