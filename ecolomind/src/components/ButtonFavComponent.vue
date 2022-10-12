<template>
    <button name="favorite" type="button" v-on:click.prevent="ClickFav()">
        <img src="../assets/coeur-like.png" alt="coeur-vert">
    </button>
</template>



<script>
import axios from "axios";
import storage from "@/utils/storage";
//import TipsServices from '@/services/TipsServices';
export default {
    name: "ButtonFavoritesComponent",
    data(){
        return{
            favData: {
                authorID: storage.get('userData').userID,
                astuce_id: this.astuce_id,
            }
        }
    },

    props :{
        astuce_id : Number,
    },


    methods : {
        async ClickFav(){
            console.log(JSON.parse(JSON.stringify(this.favData)));

             axios.post('http://ecolomind.local/wp-json/wp/v2/ecolomind/favorites', JSON.parse(JSON.stringify(this.favData)))
             .then(response => console.log(response))
            .catch(function(){
            // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
            return {data: null}
        })
        },

        getCurrentUserName(){
            return storage.get('userData').user_display_name;
        },
    }
}
</script>