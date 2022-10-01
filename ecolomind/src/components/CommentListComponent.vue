<!-- Liste des commentaires -->
<template>
    <section>
      <h2>{{ this.comments.length }} commentaire(s)</h2>
      <article>
        <h3 v-html="this.title"></h3>
        <p v-html="this.content"></p>
      </article>
    </section>
  </template>
  
  <script>
  export default({
    name: "CommentListComponent",
    props: {
      // on crée une props qui va nous permettre de récupérer les commentaires
      comments: Array,
      title: String,
      content: String,
    }, 
  })
  </script>