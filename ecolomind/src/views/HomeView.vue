<!-- Page d'accueil -->

<template>
 <div id="image">
    <img id="background" src="../assets/maison-vide.png" alt="">
    <img id="sdb" src="../assets/sdb.png" alt="" >
    <img id="entree" src="../assets/entrée.png" alt="">
    <img id="bureau" src="../assets/bureau.png" alt="">
    <img id="cuisine" src="../assets/cuisine.png" alt="">
    <img id="chambre" src="../assets/chambre.png" alt="">
    <img id="potager"  src="../assets/potager.png" alt="" />
    </div>
</template>

<script>

// @ is an alias to /src
export default {
  name: 'HomeView',
  components: {
  }
</script>

<style lang="scss">

#image{
  max-width: 60%;
  background-repeat: no-repeat;
  width: 80%;
  position: relative;
  margin-left: auto;
  margin-right: auto;

}
#background{
  width: 100%;
}
#sdb{
  width: 50.7333333%;
  position: absolute;
  top: 7.36%;
  left: 27.45%;
  transform: scale(1);
  transition: all .6s ; 
 filter:brightness(50%)
}
#chambre{
  width: 27%;
  position: absolute;
  top: 38.7%;
  left: 27.55%;
  transform: scale(1);
  transition: all .6s ; 
  filter:brightness(50%)
}
#bureau{
 width: 22.1%;
  position: absolute;
  top: 38.7%;
  left: 56.04%;
  transform: scale(1);
  transition: all .6s ; 
  filter:brightness(50%)
}
#entree{
  width: 14.8%;
  position: absolute;
  top: 63.4%;
  left: 27.5%;
  transform: scale(1);
  transition: all .6s ; 
  filter:brightness(50%)
}
#cuisine {
  width: 34.4%;
  position: absolute;
  top: 63.4%;
  left: 43.9%;
   transform: scale(1);
  transition: all .6s ; 
  filter:brightness(50%)
}
#potager{
  width: 22%;
  position: absolute;
  top: 75%;
  left: 2%;
  transform: scale(1);
  transition: all .6s ; 
  filter:brightness(50%)
}
#bureau:hover{
  /* transform: scale(1.1); */
  filter: brightness(100%);
} 
#sdb:hover{
  filter: brightness(100%);
 /*  transform: scale(1.1); */
}
#entree:hover{
  filter: brightness(100%);
  /* transform: scale(1.1); */
}
#cuisine:hover{
  filter: brightness(100%);
  /* transform: scale(1.1); */
}
#chambre:hover{
  filter: brightness(100%);
/*   transform: scale(1.1); */
}
#potager:hover{
  filter: brightness(100%);
  transform: scale(1.1); 
}
</style>
