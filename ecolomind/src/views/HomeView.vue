<!-- Page d'accueil -->

<template>
 
  <div id="image"> 
      <div id="bureau"></div>
      <div id="chambre"></div>
      <div id="cuisine"></div>
      <div id="entree"></div>
      <div id="sdb"></div>
  </div>

</template>

<script>

// @ is an alias to /src

export default {
  name: 'HomeView',
  components: {
   
  }
 
 
}

 

</script>

<style lang="scss">


#image{
  display: grid;
  background-image: url('../assets/maison_vide_2.png');
  width: 103em;
  height: 102.5em;
  background-repeat: no-repeat;
  background-size: contain;
  
} 
#bureau{
  background-image: url('../assets/bureau.png');
  width:100%;
  height: 100%;
  background-repeat: no-repeat;
  grid-column: 3/5;
  grid-row: 2/5;
  margin-left: 1.6em;
  margin-top: 2.5em; 
}
#chambre{
  background-image: url('../assets/chambre.png');
  width: 100%;
  height:100%;
  background-repeat: no-repeat;
  grid-column: 2/5;
  grid-row: 2/5;
  margin-left: 0.7em;
  margin-top: 2.5em;
  
}
#cusine{
  background-image: url('../assets/cuisine.png');
  width: 100%;
  height: 100%;
  background-repeat: no-repeat;
  grid-column: 2/3;
  grid-row: 2/5;
}
#entree{
  background-image: url('../assets/entrée.png');
  width: 100%;
  height: 100%;
  background-repeat: no-repeat;
  grid-column: 2/5;
  grid-row: 3/5;
  margin-bottom: 14em;
  margin-left: 0.5em; 
}
#sdb{
  background-image: url('../assets/sdb.png');
  width: 200%;
  height:100%;
  background-repeat: no-repeat;
  margin-top: 1.4em;
  margin-left: 0.6em; 
}





</style>
