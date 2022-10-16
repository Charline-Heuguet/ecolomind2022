<template>
<div class="fav-button unfav hidden">
    <button class="fav" name="favorite" type="button" v-on:click.prevent="RemoveFav()">
        <img src="../assets/coeur-unlike.png" alt="coeur-gris" title="retirer des favoris">
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
        async RemoveFav(){
            // console.log(JSON.parse(JSON.stringify(this.favData)));

             axios.post('http://ecolomind.local/wp-json/wp/v2/ecolomind/unfavorites', JSON.parse(JSON.stringify(this.favData)))
             .then()
            .catch(function(){
            // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
            return {data: null}
        });

        let buttonFav = document.querySelector('.fav-button');
        buttonFav.classList.toggle('hidden');

        let buttonUnFav = document.querySelector('.unfav');
        buttonUnFav.classList.toggle('hidden');
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

button.fav{
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