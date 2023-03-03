<template>
  
    <h1 >L'équipe</h1>
    <div class= "about-us">
          
              <div class="card">            
                  <img class="card-image" src= "../assets/avatar-charline.svg" alt="" >
                  <p class="name">Charline Heuguet</p>
                  <p>Product Owner</p>
                  <p>Front & Back</p>
                  
                  <div class="socials-icons">
                    <a href="https://github.com/Charline-Heuguet">
                      <img src= "../assets/icon-github.svg" alt="icone de github"  target="_blank">
                    </a>
                    <a href="https://www.linkedin.com/in/charline-heuguet">
                      <img src= "../assets/icon-linkedin.svg" alt="icone de linkedin" target="_blank">
                    </a>
                  </div>
              </div>  
  
              <div class="card">
                <img src= "../assets/avatar-guillaume.svg" alt="" class="card-image">
                <p class="name">Guillaume Pourriere</p>
                <p>Lead Back & Git Master</p>
                <p>Back</p>
  
                <div class="socials-icons">
                  <a href="https://github.com/Guillaume-Pou">
                    <img src= "../assets/icon-github.svg" target="_blank" alt="icone de github">
                  </a>
                  <a href="https://www.linkedin.com/in/guillaumepourriere/" target="_blank">
                    <img src= "../assets/icon-linkedin.svg" alt="">
                  </a>
                </div>
              </div> 
  
              <div class="card">
                <img src= "../assets/avatar-alexandre.svg" alt="" class="card-image">
                <p class="name">Alexandre Quemeneur</p>
                <p>Lead Front</p>
                <p>Front</p>
                
                <div class="socials-icons">
                  <a href="https://github.com/AlexandreQuemeneur" target="_blank">
                    <img src= "../assets/icon-github.svg" alt="icone de github">
                  </a>
                  <a href="https://twitter.com/Octave_DeLaBath" target="_blank">
                    <img src= "../assets/twitter_logo_icon.png" alt="icone de twitter">
                  </a>
                  <a href="https://www.linkedin.com/in/alexandre-quemeneur/" target="_blank">
                    <img src= "../assets/icon-linkedin.svg" alt="">
                  </a>
                </div>
              </div> 
  
         
              <div class="card">
                <img src= "../assets/avatar-jeanne.svg" alt="" class="card-image">
                <p class="name">Jeanne Multon</p>
                <p>Scrum Master</p>
                <p>Front & Back</p>
  
                  <div class="socials-icons">
                    <a href="https://github.com/jeanne-multon" target="_blank">
                      <img src= "../assets/icon-github.svg" alt="icone de github">
                    </a>
                    <a href="https://www.linkedin.com/in/jeanne-multon/" target="_blank">
                      <img src= "../assets/icon-linkedin.svg" alt="">
                    </a>
                  </div>
  
              </div> 
    </div>
</template>

<style lang="scss" >

.about-us{
  display: flex;
  justify-content: space-around;

  .card{
    border-radius:15px;
    width: 260px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 10px 40px;

    .name{
      font-weight: bold;
      margin-bottom: 15px;
    }
    
    p{
      text-align:center;
      margin: 0 0 10px;
    }
    
    .card-image{
      height: 110px;
      border-radius: 50%;
      margin: 0 0 15px 0;
    
      img{
        height:110px;
        width:110px;
        border-radius: 50%;      
      }
    }
    
    .card:hover{
      color: whitesmoke;
      transform: scale(1.03);
      box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);
    }
    
    .socials-icons{
      img{
        height: 27px;
        width: auto;
        margin: 10px 15px 15px;
      }
    }
  }
}

@media screen and (max-width: 1100px){

  .about-us{
    max-width: 779px;
    margin: 0 auto;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;

    .card{
      margin: 10px;
    }
  }
}

.dark-theme{
  .card{
      color: #bfbfc0;
      background-color: #25365133;
      border: 2px solid  #253651;
    }
  .socials-icons{
      img{
        filter: grayscale(1);
      }
  }

}

</style>