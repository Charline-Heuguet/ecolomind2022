<!-- Page a propos  -->

<template>

<container class= "about-us">

      <h1 style= "width:100%">La Team</h1>
 
          <div class="card">
            
              <div class="card-image"><img src= "../assets/woman-avatar-profil.jpeg"></div>

               <p class="card__name">Charline Heuguet</p>
               <p class="card__name">Product Owner</p>

          </div>  

        
          <div class="card">

            <div class="card-image"><img src= "../assets/man-avatar-profile.webp"></div>

             <p class="card__name">Guillaume Pourriere</p>
             <p class="card__name">Git Master</p>

          </div> 


       
          <div class="card">

            <div class="card-image"><img src= "../assets/man-avatar-profile.webp"></div>

            <p class="card__name">Alexandre Quemeneur</p>
            <p class="card__name">Lead Front</p>

          </div> 

        
          <div class="card">

            <div class="card-image"><img src= "../assets/man-avatar-profile.webp"></div>
         
            <p class="card__name">Fabio Chaher</p>
            <p class="card__name">Lead Back</p>
          
          </div> 

       
          <div class="card">

            <div class="card-image"><img src= "../assets/woman-avatar-profil.jpeg"></div>

              <p class="card__name">Jeanne Multon</p>
              <p class="card__name">Scrum Master</p>

            <ul class="social-icons">
                
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                
              </ul> 

            </div> 

  </container>

</template>

<style lang="scss" >

container{
  
  display: flex;
  justify-content: center;
  flex-wrap: wrap;

p{

  text-align:center;
  margin-bottom: 25px;
  margin-top: 18px;
  color: white;

}

.card{

  //background: #FFCED8;
   width: 180px;
   height: 300px;
   margin:90px;
   border-radius:15px;
   background-color: #667386;
  
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: rgba(0, 0, 0, 0.123);
  color: white;
  }

.card-image{
  height: 110px;
  width: 110px;
  border-radius: 50%;
  border: 5px solid #746d81;
  margin-top: 20px;
  box-shadow: 0 1px 50px rgb(39, 25, 235);
  // background-color: #FFBF00;
  // height:100px;
  // margin-bottom: 50px;
  // border-radius: 15px 15px 0 0;
  // box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);
    img{
      height:110px;
      width:110px;
      border-radius: 50%;
      margin-top: -8px;
      margin-left: -8px;
      
    }
  }

.card:hover{ 
background-color: rgb(209, 190, 190);
color: whitesmoke;
cursor: pointer;
transform: scale(1.03);
box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);
  }

.social-icons {
  padding: 0;
  list-style: none;
  margin: 1em;
}

.social-icons li {
  display: inline-block;
  margin: 0.15em;
  position: relative;
  font-size: 1em;
}

.social-icons i {
  color: #fff;
  position: absolute;
  top: 0.95em;
  left: 0.96em;
  transition: all 265ms ease-out;
}

.social-icons a {
  display: inline-block;
}

}

</style>
