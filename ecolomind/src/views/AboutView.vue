<template>
  <h1 >La Team</h1>
  <div class= "about-us">
        
            <div class="card">            
                <img src= "../assets/woman-avatar-profil.jpeg" alt="" class="card-image">
                <p class="card__name">Charline Heuguet</p>
                <p class="card__name">Product Owner</p>
                  <section class="socials-icons">
                    <a href="#"><img src= "../assets/github_repository_resource_icon.png" alt=""></a>
                    <a href="#"><img src= "../assets/twitter_logo_icon.png" alt=""></a>
                    <a href="#"><img src= "../assets/linkedin_logo_icon.png" alt=""></a>
                  </section>
            </div>  

            <div class="card">
              <img src= "../assets/man-avatar-profile.webp" alt="" class="card-image">
              <p class="card__name">Guillaume Pourriere</p>
              <p class="card__name">Git Master</p>
                <section class="socials-icons">
                  <a href="#"><img src= "../assets/github_repository_resource_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/twitter_logo_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/linkedin_logo_icon.png" alt=""></a>
                </section>
            </div> 

            <div class="card">
              <img src= "../assets/man-avatar-profile.webp" alt="" class="card-image">
              <p class="card__name">Alexandre Quemeneur</p>
              <p class="card__name">Lead Front</p>
                <section class="socials-icons">
                  <a href="#"><img src= "../assets/github_repository_resource_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/twitter_logo_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/linkedin_logo_icon.png" alt=""></a>
                </section>
            </div> 

            <div class="card">
              <img src= "../assets/man-avatar-profile.webp" alt="" class="card-image">       
              <p class="card__name">Fabio Chaher</p>
              <p class="card__name">Lead Back</p>
                <section class="socials-icons">
                  <a href="#"><img src= "../assets/github_repository_resource_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/twitter_logo_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/linkedin_logo_icon.png" alt=""></a>
                </section>          
            </div> 
        
            <div class="card">
              <img src= "../assets/woman-avatar-profil.jpeg" alt="" class="card-image">
                <p class="card__name">Jeanne Multon</p>
                <p class="card__name">Scrum Master</p>            
                <section class="socials-icons">
                  <a href="#"><img src= "../assets/github_repository_resource_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/twitter_logo_icon.png" alt=""></a>
                  <a href="#"><img src= "../assets/linkedin_logo_icon.png" alt=""></a>
                </section>            
            </div> 
  </div>
</template>

<style lang="scss" >

.about-us{
  display: flex;
  justify-content: center;
  flex-wrap: wrap;

  p{
    text-align:center;
    margin-bottom: 15px;
    margin-top: 3px;    
  }

  .card{
    height: 300px;
    margin:90px;
    border-radius:15px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .card-image{
    height: 110px;
    width: 110px;
    border-radius: 50%;
    margin: 20px 0 15px 0;
    
      img{
        height:110px;
        width:110px;
        border-radius: 50%;
        margin-top: -5px;
        margin-left: -5px;       
      }
    }

  .card:hover{ 
    color: whitesmoke;
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