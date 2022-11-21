<!-- Page d'une astuce unique avec espace commentaires (ajout et liste) -->

<template>

    <div id="SingleView" v-if="isloaded">

        
        <div class="title">      
            <h1 v-html="this.title"></h1>
        </div>

        <div class="column">
            <div class="tip-header">
                <div class="difficulty">
                    <p>Difficulté :</p>
                    <DifficultyTipsComponent :astuce="this.astuce" />
                </div> 
          
                <div class="buttons" v-if="this.$store.state.userIsConnect" >
                    <p>Ajouter aux favoris </p>

                    <FavorisComponent
                        :astuce_id="this.astuce.id"
                    />

                    <!-- <ButtonFavComponent 
                        :astuce_id ="this.astuce.id"
                    />

                    <ButtonUnFavComponent
                        :astuce_id="this.astuce.id" 
                    /> -->
                </div>
            </div>
            
            

            <div class="ingredients">
                <IngredientsTipsComponent :astuce="this.astuce" />
            </div>
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
// import ButtonFavComponent from '@/components/ButtonFavComponent.vue'
// import ButtonUnFavComponent from '@/components/ButtonUnFavComponent.vue'
import FavorisComponent from '@/components/FavorisComponent.vue';

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

        // ButtonFavComponent,
        // ButtonUnFavComponent,
        FavorisComponent

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
            //console.log(this.astuce);

            
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
.success-com{
    display: flex;
    justify-content: center;
    color: rgb(45, 160, 97);
    margin-bottom: 1em;
}
#SingleView {
    max-width: 1100px;
    margin: 0 auto;
    padding: 15px;
    .ingredients{
        li{
          list-style-type: none;  
        }
        
    }
    .favhidden{
        display: none;
    }

    .buttons{
        position: relative;
    }
    
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
        p{
            font-weight: 600;
        }
    }
    
    .difficulty{
        img{  
            max-width: 70px;
        }
    }

    .ingredients-tips{
        display: flex;
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
            outline-color: #acd14f;
            width: 100%;
            margin: 10px 0;
            padding: 15px;
            border-radius: 20px;
            margin-bottom: 15px;
            background-color: #c7d3e3;
            border: 2px solid #a7b2c0;
            font-family: Arial, Helvetica, sans-serif;
        }  
        button{
            border: none;
            color: #404041;
            font-weight: bold;
            border-radius: 20px;
            background-color: #acd14f;
            padding: 15px 30px;
            &:hover{
                transform: scale(1.07);
                transition: transform 0.6s;
            }
        }           
    }

    .comment-list{
        text-align: center;
        padding: 25px 0;
    }
    .author{
        margin-top: 40px;
        span{
            font-style: italic;
        }
    }

    .commentaires{
        background-color: #deeddb;
        border: 1px solid #684d41;
        border-radius: 20px;
        padding: 15px;
        margin-bottom: 20px;
        h3{
            margin: 0;
        }
    }
    
    h2{
        margin: 20px 0 15px 0;
        padding: 15px 0 20px 0 ;
        border-bottom: 1px solid white;
    }

    
}

.dark-theme{
    #SingleView{
        .commentaires{
            color: black;
            a{
                color: black;
                font-style: italic;
            }
        }
    }
} 

@media screen and (min-width: 769px){
    #SingleView{
        .column{
            float: left;
            width: 300px;
            margin-right: 50px;            
        }
        .content, .author{
            margin-left: 350px;
        }
        .comment{
            margin-bottom: 15em;
        }
    }
    
}



</style>



