<template>
     <div>
            <span>Niveau de difficulté :</span>
            {{this.difficulty.name}}
        </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'DifficultyTipsComponent',

    data(){
        return {
            difficulty : "",

        }

    },

    created(){

        const base_url= "http://ecolomind.local/wp-json";

        axios.get(base_url + "/wp/v2/tips/"+this.$route.params.id+"?_embed").then((response) => {
            this.astuce = response.data;

        axios.get(base_url + "/wp/v2/difficulty?post="+this.astuce.id ).then((response) => {
                this.difficulty = response.data[0];
            });
        });
    }
}
</script>