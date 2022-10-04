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
<<<<<<< HEAD
      export default{
=======
  export default {
>>>>>>> eb26af1531242df161865c931afab32f1f3d0f99
    name: "CommentListComponent",
    props: {
      // on crée une props qui va nous permettre de récupérer les commentaires
      comments: Array,
<<<<<<< HEAD
      title: String,
      content: String,
    }, 
  }


=======
    },

  }
>>>>>>> eb26af1531242df161865c931afab32f1f3d0f99
  </script>