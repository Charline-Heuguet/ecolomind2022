<template>
  <div>

    <article>

      <h3>{{ comment.author_name }}</h3>
      <p v-html="comment.content.rendered"></p>


      <div v-if="comment.author == authorID">
        
        <a @click.prevent="toggleForm" :data-id="comment.id"> Modifier </a>
           <!-- le "Modifier" a le meme data-id que le form pour les rendre "unique" avec leur data-id  -->
        <form class="hidden" :data-id="comment.id" >

          <div>
            <label for="content">Commentaire</label>
            <textarea rows="3" v-model="modifiedcontent"> </textarea>
              <!-- v-model récupère le texte saisi de l'utilisateur et donc dans la fct° de 
              traitement du formulaire -->
          </div>

          <button type="submit" @click.prevent="updateComment">Envoyer</button>

        </form>

      </div>

    </article>



  </div>
</template>

<script>
  import axios from 'axios';
  //import TipsServices from '@/services/TipsServices';
  import storage from '@/utils/storage';

  export default {
    name: 'CommentComponent',

    data(){
      return{
        authorID: storage.get('userData').userID,
        modifiedcontent: "",        
      }      
    },

    props : {
        comment: Object,
    },
    
    methods:{ 

      //Probleme rencontré: 
      //Lors du clic sur "modifier", que ce soit le 1er ou le 6è commentaire,
      //Le form qui s'affichait était systematiquement le premier de la liste, on a donc décidé
      // de rendre le form qui s'affichera unique de par son id.

      toggleForm(event){
        console.log(event);
        //On récupère le dataset (l'id) de l'élément qui a été cliqué:
        let id = event.target.dataset.id; 
        //on selectionne le seul et unique formulaire qui a le data-id du bouton sur lequel on vient de cliquer
        let form = document.querySelector('form[data-id="'+id+'"]');
        //On ajoute la class "Shown" (qui va afficher) le form ciblé 
        form.classList.toggle('shown');
      },
      
      
      async updateComment(){

         await axios.post("http://ecolomind.local/wp-json/wp/v2/comments/" + this.comment.id, {
            content: this.modifiedcontent,
        }, {
            headers: {
                Authorization: "Bearer " + storage.get("userData").token
            }
        });
      },
      
    }
  }


  </script>

  <style lang="scss">
  
  .hidden{
    display: none;
  }

  .shown{
    display: block;
  }
  </style>