<template>
    <div class="ingredients-tips">
        <p>Ingrédients :</p>
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
    props: {
        astuce: Object,
    },

    created(){

        const base_url= "http://ecolomind.local/wp-json";
        

            axios.get(base_url + "/wp/v2/ingredients?post="+this.astuce.id ).then((response) => {
                this.ingredient = response.data;
                
            });
 
    }

}
</script>