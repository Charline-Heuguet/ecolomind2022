<template>
    <div>

        <article>
        <h3>{{ comment.author_name }}</h3>
        <p v-html="comment.content.rendered"></p>

        <p v-html="comment.author"></p>
        <p v-html="authorID"></p>

        <div v-if="comment.author == authorID">
            Modifier 
            <div>{{comment.id}}</div>
            
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
      
      async updateComment(){
        console.log(this.comment.id);
        console.log(this.modifiedcontent);

         await axios.post("http://ecolomind.local/wp-json/wp/v2/comments/" + this.comment.id, {
            content: this.modifiedcontent,
        }, {
            headers: {
                Authorization: "Bearer " + storage.get("userData").token
            }
        });
        //await TipsServices.modifyComment(this.comment.id,this.modifiedcontent);
        

      }

       
    }
  }
  </script>