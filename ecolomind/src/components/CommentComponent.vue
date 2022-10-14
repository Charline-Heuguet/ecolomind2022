<template>
    <div>

        <article>
        <h3>{{ comment.author_name }}</h3>
        <p v-html="comment.content.rendered"></p>

        <p v-html="comment.author"></p>
        <p v-html="authorID"></p>

        <div v-if="comment.author == authorID">
            Modifier
            <form>

            <div>
                <label for="content">Commentaire</label>
                <textarea rows="3" v-model="modifiedcontent"> </textarea>
                
            </div>

            <button
                type="submit"
                @click.prevent="updateComment"
            >
                Envoyer
            </button>

            </form>

        </div>


        </article>



    </div>
</template>

<script>
  
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
      
      async updateComment(){
        //await TipsServices.modifyComment(this.commentID,this.modifiedcontent);
        

      }

       
    }
  }
  </script>