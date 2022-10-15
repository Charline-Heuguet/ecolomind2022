<!-- Page d'une astuce unique avec espace commentaires (ajout et liste) -->

<template>

    <div id="SingleView" v-if="isloaded">

        
        <div>      
            <h3 v-html="this.title"></h3>
        </div>

        <div>
            <DifficultyTipsComponent :astuce="this.astuce" />
        </div> 

        <div>
            <RoomTipsComponent :astuce="this.astuce" />
        </div>

            <span> Cette astuce est proposée par : </span>
            <span v-html="this.author.name"></span>
        
        <div>
            <ButtonFavComponent v-if="this.$store.state.userIsConnect"
            :astuce_id ="this.astuce.id"
            />

            <ButtonUnFavComponent v-if="this.$store.state.userIsConnect"
            :astuce_id="this.astuce.id"
            />
        </div>    

        <div>
            <TargetTipsComponent :astuce="this.astuce" />
        </div>

             
        
        <div class="ingredients">

            <IngredientsTipsComponent :astuce="this.astuce" />
        </div>

        <div class="ingredients">
            <ToolsTipsComponent :astuce="this.astuce" />
        </div>
        
        <p v-html="this.astuce.content.rendered"></p>

        


        <div>
            <CommentListComponent />
        </div>

    </div>
</template>

<script>
import ToolsTipsComponent from '@/components/ToolsTipsComponent.vue';
import RoomTipsComponent from '@/components/RoomTipsComponent.vue';
import TargetTipsComponent from '@/components/TargetTipsComponent.vue';
import IngredientsTipsComponent from '@/components/IngredientsTipsComponent.vue';
import CommentListComponent from '@/components/CommentListComponent.vue';
import DifficultyTipsComponent from '@/components/DifficultyTipsComponent.vue';
import ButtonFavComponent from '@/components/ButtonFavComponent.vue'
import ButtonUnFavComponent from '@/components/ButtonUnFavComponent.vue'

import axios from 'axios';

export default{
    name: 'SingleTipsView',
    components : {
        CommentListComponent,
        IngredientsTipsComponent,
        DifficultyTipsComponent,
        TargetTipsComponent,
        RoomTipsComponent,
        ToolsTipsComponent,
        ButtonFavComponent,
        ButtonUnFavComponent

    },

    data(){
        return{
            astuce: false,
            tools : false,
            title : "",
            author : "",
            newcomments: [],
            isloaded: false,
        }
    },

    created()
    {
       
        const base_url= "http://ecolomind.local/wp-json";

 
        // appel API
        axios.get(base_url + "/wp/v2/tips/"+this.$route.params.id+"?_embed").then((response) => {
            this.astuce = response.data;
            console.log(this.astuce);

            
            axios.get(base_url + "/wp/v2/ingredients?post="+this.astuce.id ).then((response) => {
                this.ingredients = response.data;
            });

            this.title= response.data.title.rendered;
            const em = Object.assign({}, this.astuce._embedded);           



            this.author = em.author[0];

            
            this.isloaded = true;

            
            
        });   


        

    },
    mounted(){
        // this.$nextTick(function(){console.log(this.astuce)});
        
    },

}
</script>




<style lang="scss">

.ingredients {

    border: 2px solid #a7b2c0;
    background-color: rgba(199, 211, 227, 0.7960784314);

}


</style>



