<!-- Page d'une astuce unique avec espace commentaires (ajout et liste) -->

<template>

    <div id="SingleView">
        
        <h3>TITRE DE L'ASTUCE</h3>
        <img src="" alt="">        

        <p>NOM DE L'AUTEUR</p>
        <article> CONTENU DE L'ARTICLE</article>
        <img src="" alt="">

        <h4> Espace commentaires</h4>          
            <form>
                <label for="comment"> Ajoutez votre commentaire</label>
                <input type="text" name="comment" id="comment">

                <button type="submit" @click.prevent="submitComment">Envoyez</button>
            </form>
        <div>
            <CommentListComponent />
        </div>
        

    </div>
</template>

<script>

import axios from 'axios';

export default({
    name: 'SingleTipsView',

    data(){
        return{
            astuce: false,
            comments : false,

        }
    },

    async created()
    {
        
    },

    methods: {

        /**
         * Cette fonction est éxectué deux fois. Une fois au moment de la création du composant et une fois à chaque fois qu'un commentaire est ajouté
         */
        
         readComments(){
              const base_url =  "http://ecolomind.local/wp-json";
              axios.get(base_url + "/wp/v2/comments?tips="+this.astuce.id ).then((response) => {
                 this.comments = response.data;
                 console.log(this.comments);
                });
         }
   }
})
</script>



