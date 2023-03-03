<template>
        <div>
            <img :src=" this.difficulty.description " alt="difficulté de l'astuce en étoile" class="difficulty-star">
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
    props: {
        astuce: Object,
    },

    created(){

        const base_url= "https://back.ecolomind.fr/wp-json";

       
        axios.get(base_url + "/wp/v2/difficulty?post="+this.astuce.id ).then((response) => {
                this.difficulty = response.data[0];
                console.log(this.difficulty);
            });
       
    }
}
</script>

<style lang="scss">

.dark-theme{
    .difficulty-star{
        filter: hue-rotate(45deg);       
    }
}


</style>