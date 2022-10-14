<template>
    <article>

        <img :src="this.difficulty.description" :alt="this.difficulty.name" class="try">
       
        <router-link :to="{name: 'single-tips', params: {id: this.dbid}}">
            <h2 v-html="this.title"></h2> 
        </router-link> 

            <p v-html="this.excerpt"></p>

        <router-link :to="{name: 'single-tips', params: {id: this.dbid}}">
            <p id="suite">Lire la suite</p> 
        </router-link>    

    </article>
</template>

<script>
import axios from 'axios';


export default({
    name: 'TipsCardComponent',
    props: {
        dbid: Number,
        title: String,
        excerpt: String,
        difficultyId: Number,        
    },

    data(){
        return{
            difficulty: false,

        }
    },

    async created()
    {     
        const base_url= "http://ecolomind.local/wp-json";

        axios.get(base_url + "/wp/v2/difficulty/"+ this.difficultyId).then((response) => {
                this.difficulty = response.data;
                
            });
    },

})

</script>

<style lang="scss" scoped>

article{
    background-color: rgba($color: #FFCED8, $alpha: 0.5);
    border-radius: 15px;
    flex: 0 1 32%; //flex: capacité à s'étendre, capacité à se réduire et la largeur
    text-align: center;
    padding: 20px 20px 0px;
    margin: 10px 0;
    
    h2{
        text-align: left;
        margin: 0;
    }
}


.try{
    max-width: 50px;
}
#suite {
    text-align: right;
}

</style>