<!-- Page d'une astuce unique avec espace commentaires (ajout et liste) -->

<template>

    <div id="SingleView">

        <div>      
            <h3 v-html="this.astuce.title.rendered"></h3>
            <!-- <img src="" alt="">         -->

            {{this.room.name}}
        </div>

       <p v-html="this.astuce._embedded.author.name"></p> 

        <div>
            <span>Astuce pour :</span>
            {{this.target.name}}
        </div>

        <div>
            <span>Niveau de difficulté :</span>
            {{this.difficulty.name}}
        </div>
        
        <div class="ingredients">
            <span>Ingrédients :</span>
            <ul>
                <li 
                    v-for="ingredient of this.ingredients"
                    :key="ingredient.id"
                    v-html="ingredient.name"
                    >  
                </li>
            </ul>
        </div>

        <div class="ingredients">
            <span>Ustensiles :</span>
            <ul>
                <li 
                    v-for="tool of this.tools"
                    :key="tool.id"
                    v-html="tool.name"
                    >  
                </li>
            </ul>
        </div>
        
        <p v-html="this.astuce.content.rendered"></p>
        <!-- <img src="" alt=""> -->

        <div>
            <CommentFormComponent 
            @commentAdded="this.readComments()"
            :astuce_id="this.astuce.id"
            />
            <CommentListComponent :comments="this.comments"/>
        </div>

    </div>
</template>

<script>
import CommentFormComponent from '@/components/CommentFormComponent';
import CommentListComponent from '@/components/CommentListComponent';
import axios from 'axios';

export default{
    name: 'SingleTipsView',
    components : {
        CommentListComponent,
        CommentFormComponent,
    },

    data(){
        return{
            astuce: false,
            ingredients: false,
            comments : false,
            difficulty : "",
            room : "",
            target : "",
            tools : false,
        }
    },

    created()
    {
        const base_url= "http://ecolomind.local/wp-json";

     

        // appel API
        axios.get(base_url + "/wp/v2/tips/"+this.$route.params.id+"?_embed").then((response) => {
            this.astuce = response.data;
         console.log(this.astuce);
            });
            axios.get(base_url + "/wp/v2/ingredients?post="+this.astuce.id ).then((response) => {
                this.ingredients = response.data;
            });

            axios.get(base_url + "/wp/v2/tools?post="+this.astuce.id ).then((response) => {
                this.tools = response.data;
            });

            axios.get(base_url + "/wp/v2/target?post="+this.astuce.id ).then((response) => {
                this.target = response.data[0];
            });

            axios.get(base_url + "/wp/v2/difficulty?post="+this.astuce.id ).then((response) => {
                this.difficulty = response.data[0];
            });

            axios.get(base_url + "/wp/v2/rooms?post="+this.astuce.id ).then((response) => {
                this.room = response.data[0];
            });

            this.readComments();
        

        
    },

    methods: {

        /**
         * Cette fonction est executée deux fois. Une fois au moment de la création du composant et une fois à chaque fois qu'un commentaire est ajouté
         */
        
            readComments(){
                const base_url =  "http://ecolomind.local/wp-json";
                axios.get(base_url + "/wp/v2/comments?post="+this.astuce.id ).then((response) => {
                    this.comments = response.data;
                    console.log(this.comments);
                });
            }
    }
}
</script>



