<!-- Liste des commentaires -->
<template>
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
  </template>
  
  <script>
  export default {
    name: "CommentListComponent",
    props: {
      // on créé une props qui va nous permettre de récupérer les commentaires
      comments: Array,
      
    },

    
  }

  

  </script>