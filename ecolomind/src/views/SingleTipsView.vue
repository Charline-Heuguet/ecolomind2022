<!-- Page d'une astuce unique avec espace commentaires (ajout et liste) -->

<template>

    <div id="SingleView" v-if="isloaded">

        
        <div class="title">      
            <h1 v-html="this.title"></h1>
        </div>

        <div class="tip-header">
            <div class="difficulty">
                <p>Difficulté :</p>
                <DifficultyTipsComponent :astuce="this.astuce" />
            </div> 

        
            <div>
                <p>Ajouter aux favoris </p>
                <ButtonFavComponent v-if="this.$store.state.userIsConnect"
                    :astuce_id ="this.astuce.id"
                />        
                <ButtonUnFavComponent v-if="this.$store.state.userIsConnect"
                    :astuce_id="this.astuce.id"
                />
            </div>
        </div>
        
          

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
        <div class="comment">
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

    padding: 15px;
    
    .title{
        display: flex;
        justify-content: center;
    }
    .tip-header{
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid white;
    }
    
    .difficulty{
        img{  
            max-width: 70px;
        }
    }

    .ingredients-tips{
        display: flex;
        justify-content: center;
        justify-content: space-between;
        margin-bottom: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid white;
        p{
            font-weight: 600;
        }
        ul{
            margin: 15px 0 0 0;
            padding: 0;
        }    
        
    }
        
    .comment{
        label{
            font-weight: 600;
            display: block;
            text-align: center;
        }
        textarea{
            display: block;
            width: 100%;
            margin: 10px 0;
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: #c7d3e3;
            border: 2px solid #a7b2c0;
        }  
        button{
            border: none;
            color: #404041;
            font-weight: bold;
            border-radius: 20px;
            background-color: #acd14f;

        }           
    }

    .comment-list{
        text-align: center;
    }
    .author{
        span{
            font-style: italic;
        }
    }    
}

    



</style>



