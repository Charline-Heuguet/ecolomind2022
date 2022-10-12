<template>
        <div>
            <img :src=" this.difficulty.description " alt="">
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

        const base_url= "http://ecolomind.local/wp-json";

       
        axios.get(base_url + "/wp/v2/difficulty?post="+this.astuce.id ).then((response) => {
                this.difficulty = response.data[0];
                console.log(this.difficulty);
            });
       
    }
}
</script>