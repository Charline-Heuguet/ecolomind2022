<template>
    <div>
        <span>Ingrédients :</span>
            <ul>
                <li 
                    v-for="ingredients of this.ingredient"
                    :key="ingredients.id"
                    v-html="ingredients.name"
                    >  
                </li>
            </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name:  'IngredientsTipsComponent',

    data(){
        return{
            ingredient: [],

        }
    },

    created(){

        const base_url= "http://ecolomind.local/wp-json";
        
         axios.get(base_url + "/wp/v2/tips/"+this.$route.params.id+"?_embed").then((response) => {
        this.astuce = response.data;

            axios.get(base_url + "/wp/v2/ingredients?post="+this.astuce.id ).then((response) => {
                this.ingredient = response.data;
                // console.log('ici les ingredients');
                // console.log(this.ingredient);
            });
         });   
    }

}
</script>