<!-- Page Team Cards -->

<template>

<container class= "about-us">

      <h1 style= "width:100%">La Team</h1>
 
          <div class="card">
            
              <div class="card-image"><img src= "../assets/woman-avatar-profil.jpeg"></div>

               <p class="card__name">Charline Heuguet</p>
               <p class="card__name">Product Owner</p>
               <!-- <p class="about__me">A propos de moi</p> -->

                 <section class="socials-icons">
                  <a href="#"><img src= "../assets/github_repository_resource_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/twitter_logo_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/linkedin_logo_icon.png" alt=""></a>
                 </section>

          </div>  

          <div class="card">

            <div class="card-image"><img src= "../assets/man-avatar-profile.webp"></div>

             <p class="card__name">Guillaume Pourriere</p>
             <p class="card__name">Git Master</p>
             <!-- <p class="about__me">A propos de moi</p> -->

               <section class="socials-icons">
                <a href="#"><img src= "../assets/github_repository_resource_icon.png" alt=""></a>
                <a href="#"><img src= "../assets/twitter_logo_icon.png" alt=""></a>
                <a href="#"><img src= "../assets/linkedin_logo_icon.png" alt=""></a>
               </section>

          </div> 

          <div class="card">

            <div class="card-image"><img src= "../assets/man-avatar-profile.webp"></div>

            <p class="card__name">Alexandre Quemeneur</p>
            <p class="card__name">Lead Front</p>
            <!-- <p class="about__me">A propos de moi</p> -->

               <section class="socials-icons">
                  <a href="#"><img src= "../assets/github_repository_resource_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/twitter_logo_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/linkedin_logo_icon.png" alt=""></a>
               </section>

          </div> 

          <div class="card">

            <div class="card-image"><img src= "../assets/man-avatar-profile.webp"></div>
         
            <p class="card__name">Fabio Chaher</p>
            <p class="card__name">Lead Back</p>
            <!-- <p class="about__me">A propos de moi</p> -->

               <section class="socials-icons">
                <a href="#"><img src= "../assets/github_repository_resource_icon.png" alt=""></a>
                <a href="#"><img src= "../assets/twitter_logo_icon.png" alt=""></a>
                <a href="#"><img src= "../assets/linkedin_logo_icon.png" alt=""></a>
               </section>
          
          </div> 

       
          <div class="card">

            <div class="card-image"><img src= "../assets/woman-avatar-profil.jpeg" alt="" ></div>

              <p class="card__name">Jeanne Multon</p>
              <p class="card__name">Scrum Master</p>
              <!-- <p class="about__me">A propos de moi</p> -->

            
                <section class="socials-icons">
                  <a href="#"><img src= "../assets/github_repository_resource_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/twitter_logo_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/linkedin_logo_icon.png" alt=""></a>
                </section>
             
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
  margin-bottom: 15px;
  margin-top: 3px;
  
}

.card{
  width: 180px;
  height: 300px;
  margin:90px;
  border-radius:15px;
  background-color: #CBD8E8;
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: rgba(54, 48, 48, 0.123);
  color: white;

  }

.card-image{
  height: 110px;
  width: 110px;
  border-radius: 50%;
  border: 5px solid #746d81;
  margin-top: 20px;
  
    img{
      height:110px;
      width:110px;
      border-radius: 50%;
      margin-top: -5px;
      margin-left: -5px;
      
    }
  }

.card:hover{ 
background-color: rgb(176, 211, 83);
color: whitesmoke;
cursor: pointer;
transform: scale(1.03);
box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);

  }

.socials-icons{

    img{
      height: 20px;
      width: 20px;
      margin-top: -90px;
      margin:20px;
      margin-bottom: 1px;
    
    }

}

section{

display: flex;

}

}

</style>