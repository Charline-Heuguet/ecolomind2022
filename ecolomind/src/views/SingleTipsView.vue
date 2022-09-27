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

        <CommentListComponent />

    </div>
</template>


// <script>

// On importe le fichier TipsServices dans lequel se trouve les appels à API dont on aura besoin ici.
// import TipsServices from '@/services/TipsServices.js';


// export default {
//     name:"SingleTipsView",

//     data(){
//         return{
//             content: "blablabla_try comments",
//         }
//     },

//     props: {
//         roomId: Number
//     },


//     methods : {
//         async submitComment(){
//             // console.log(this.content);
//             await TipsServices.addComment(this.content, this.roomId);
//             this.$emit('commentAdded');
//         }
//     }
// }
// </script>