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
 
    <section>
      <h2>{{ this.comments.length }} commentaire(s)</h2>
      <article
        v-for="comment in comments"
        :key="comment.id"
        >
        <h3>{{ comment.author_name }}</h3>
        <p v-html="comment.content.rendered"></p>
      </article>
    </section>
    </div>
  </template>



  <script>
  import axios from 'axios';
  import TipsServices from '@/services/TipsServices';
  export default {
    name: 'CommentListComponent',
    data(){
      return{
        comments: false,
        commentsnumber: 0,
        content: "",
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
      },
      readcomment(){ 
              const base_url= "http://ecolomind.local/wp-json";
                   axios.get(base_url + "/wp/v2/comments?post="+this.$route.params.id ).then((response) => {
                    this.comments = response.data;
                   
                    this.commentsnumber = this.comments.lenght;
                });  
      } 
    }
  }
  </script>

 