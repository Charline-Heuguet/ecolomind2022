<!-- Liste des commentaires -->
<template>
  <div>
    <form v-if="this.$store.state.userIsConnect">
        
        <div >
          <label for="content">Commentaire</label>
          <textarea
            rows="3"
            v-model="content"
          ></textarea>
        </div>
        <button
          type="submit"
          @click.prevent="submitComment"
        >
          Envoyer
        </button>
      </form>
      <div v-if="this.success" class="success">Merci d'avoir partagé votre avis !</div>

        <section>
          
          <h2>{{ this.comments.length }} commentaire(s)</h2>

          <CommentComponent 
          v-for="comment in comments"
          :key="comment.id"
          :comment="comment" />
          
          
        </section>
    </div>
  </template>


  <script>
    import CommentComponent from '@/components/CommentComponent.vue'
    import axios from 'axios';
    import TipsServices from '@/services/TipsServices';
    import storage from '@/utils/storage';

  export default {
    name: 'CommentListComponent',
    components: {
      CommentComponent
    },

    data(){
      return{
        comments: false,
        commentsnumber: 0,
        content: "",
        success : false,
        authorID: storage.get('userData').userID,
        commentID: "",
        modifiedcontent: "",
      }
      
    
    },
    created(){
      this.readcomment();
    },
    methods:{
      
      async submitComment(){
        //console.log(this.content);
        await TipsServices.addComment(this.content, this.$route.params.id);
        this.$emit('commentAdded'); 
        this.readcomment();
        this.success = true;
      },

      readcomment(){ 
        const base_url= "http://ecolomind.local/wp-json";
        axios.get(base_url + "/wp/v2/comments?post="+this.$route.params.id ).then((response) => {
          this.comments = response.data;
          this.commentsnumber = this.comments.lenght;
        });  
      },
    }
  }
  </script>

 