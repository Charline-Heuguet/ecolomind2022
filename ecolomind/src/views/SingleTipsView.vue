<!-- Page d'une astuce unique avec espace commentaires (ajout et liste) -->

<template>

    <div id="SingleView">
        
        <h3 v-html="this.astuce.title.rendered"></h3>
        <!-- <img src="" alt="">         -->

        <p v-html="this.astuce._embedded.author.name"></p>
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
        }
    },

    created()
    {
        const base_url= "http://ecolomind.local/wp-json";

        axios.get(base_url + "/wp/v2/tips/"+this.$route.params.id+"?_embed").then((response) => {
            this.astuce = response.data;
            console.log(this.astuce);

            axios.get(base_url + "/wp/v2/ingredients?tips="+this.astuce.id ).then((response) => {
                this.ingredients = response.data;
            });
            console.log(this.ingredients);

            this.readComments();
        })

        
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



