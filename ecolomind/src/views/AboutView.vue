<!-- Page a propos  -->

<template>

<container class= "contact">

      <h1>La Team</h1>
 
          <div class="card">
              <div class="card-image"></div>
              <h2>Charline</h2>
              <h2>Heuguet</h2>
              <h2>Product Owner</h2>
          </div>  

        
          <div class="card">
            <div class="card-image"></div>
            <h2>Guillaume</h2>
            <h2>Pourrière</h2>
            <h2>Git Master</h2>
          </div> 

       
          <div class="card">
            <div class="card-image"></div>
            <h2>Alexandre</h2>
            <h2>Quemeneur</h2>
            <h2>Lead Front</h2>
          </div> 

        
          <div class="card">
            <div class="card-image"></div>
            <h2>Fabio</h2>
            <h2>CHAHER</h2>
            <h2>Lead Back</h2>
          </div> 

       
          <div class="card">
            <div class="card-image"></div>
            <h2>Jeanne</h2>
            <h2>Multon</h2>
            <h2>Scrum Master</h2>
          </div> 

  </container>

</template>

<style lang="scss" >

container{
  display: flex;
  justify-content: center;
  flex-wrap: wrap;

.card{
  background: #FFCED8;
  width: 270px;
  height: 400px;
  margin:10px;
  border-radius:15px;
  }
  
.card-image{
  background-color: #FFBF00;
  height:150px;
  margin-bottom: 50px;
  border-radius: 15px 15px 0 0;
  box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);
  }

.card:hover{ 
background-color: rgb(88, 7, 7);
color: whitesmoke;
cursor: pointer;
transform: scale(1.03);
box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);
  }

}

</style>
