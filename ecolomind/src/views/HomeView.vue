<!-- Page d'accueil -->

<template>

<div id="image" :style="backgroundImage">


<!-- <img id="bureau" src="@/assets/bureau.png" alt=""> -->

</div>
  
</template>

<script>
// @ is an alias to /src



export default {
  name: 'HomeView',
  data(){
    return{ image: "@/assets/maison_vide.png",}
  }

 
}
</script>

<style lang="scss" scoped>

#image{

}
/* #vide{
 width:20%;
 height: 20%; 
}
#bureau{
  width: 10%;
  height: 10%;
} */ 
</style>
