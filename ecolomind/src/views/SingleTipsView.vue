<!-- Page d'une astuce unique avec espace commentaires (ajout et liste) -->

<template>

    <div id="SingleView">
        
        <h3 v-html="this.astuce.title.rendered"></h3>
        <!-- <img src="" alt="">         -->

        <!-- <p v-html="this.astuce._embedded.author.name"></p> -->
        <p v-html="this.astuce.content.rendered"></p>
        <!-- <img src="" alt=""> -->

        <h4>Espace commentaires</h4>          
        <form @click.prevent="submitComment">
            <label for="comment">Ajoutez votre commentaire :</label><br/>
            <input type="text" name="comment" id="comment">

            <button type="submit">Envoyez</button>
        </form>

        <!-- <div>
            <CommentListComponent 
                v-for="comment in comments"
                :key="comment.id"
                :title="comment.title.rendered"
                :content="comment.excerpt.rendered"
            />
        </div> -->
        

    </div>
</template>

<script>

// import CommentListComponent from '@/components/CommentListComponent';
import axios from 'axios';

export default({
    name: 'SingleTipsView',
    // components : {
    //     CommentListComponent,
    // },

    data(){
        return{
            astuce: false,
            // comments : false,
        }
    },

    async created()
    {
        const base_url= "http://ecolomind.local/wp-json";

        axios.get(base_url + "/wp/v2/tips/"+this.$route.params.id+"?_embed").then((response) => {
            this.astuce = response.data;
            console.log(this.astuce);
        })

        // this.readComments();
    },

    // methods: {

    //     /**
    //      * Cette fonction est éxectué deux fois. Une fois au moment de la création du composant et une fois à chaque fois qu'un commentaire est ajouté
    //      */
        
    //         readComments(){
    //             const base_url =  "http://ecolomind.local/wp-json";
    //             axios.get(base_url + "/wp/v2/comments?tips="+this.astuce.id ).then((response) => {
    //                 this.comments = response.data;
    //                 console.log(this.comments);
    //             });
    //         }
    // }
})
</script>



