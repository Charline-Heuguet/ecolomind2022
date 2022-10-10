<!-- Formulaire de commentaire des articles -->

<template>
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
</template>

<script>
import TipsServices from '@/services/TipsServices';
export default {
    name: 'CommentFormComponent',
    data(){
        return {
            content: "",
        }
    },

    props: {
        astuce_id: Number,
    },
    methods : {
        async submitComment(){
            // console.log(this.content);
            await TipsServices.addComment(this.content, this.astuce_id);
            this.$emit('commentAdded');
        }
    }
}
</script>