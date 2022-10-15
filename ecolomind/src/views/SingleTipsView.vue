<!-- Page d'une astuce unique avec espace commentaires (ajout et liste) -->

<template>

    <div id="SingleView" v-if="isloaded">

        
        <div class="title">      
            <h3 v-html="this.title"></h3>
        </div>

        
        <div class="difficulty">Difficulté:
            <DifficultyTipsComponent :astuce="this.astuce" />
        </div> 

        

        <p>Ajouter aux favoris </p>
        <ButtonFavComponent v-if="this.$store.state.userIsConnect"
            :astuce_id ="this.astuce.id"
        />        
        <ButtonUnFavComponent v-if="this.$store.state.userIsConnect"
            :astuce_id="this.astuce.id"
        />
        
          

        <div class="ingredients">
            <IngredientsTipsComponent :astuce="this.astuce" />
        </div>

        
        
        <p class="content" v-html="this.astuce.content.rendered"></p>

        <p class="author"> 
            Cette astuce est proposée par : <span v-html="this.author.name"></span>
        </p>


        <!-- <div>
            <TargetTipsComponent :astuce="this.astuce" />
        </div> -->

        <!-- <div class="ingredients">
            <ToolsTipsComponent :astuce="this.astuce" />
        </div> -->

        <!-- <div class="roomtips">
            <RoomTipsComponent :astuce="this.astuce" />
        </div> -->
        <div>
            <CommentListComponent />
        </div>

    </div>
</template>

<script>
// import ToolsTipsComponent from '@/components/ToolsTipsComponent.vue';
//import RoomTipsComponent from '@/components/RoomTipsComponent.vue';
//import TargetTipsComponent from '@/components/TargetTipsComponent.vue';
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
        //TargetTipsComponent,
        //RoomTipsComponent,
        //ToolsTipsComponent,
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

#SingleView {
    .title{
        display: flex;
        justify-content: center;

    }
    .difficulty{
        img{  
            max-width: 70px;
        }
    }

    .ingredients{
        display: flex;
        justify-content: center;
            span{
                font-weight: 600;
            }
            ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
            }    
    }
        
    .content{
        
    }
    .author{

    }
    
}

    



</style>



