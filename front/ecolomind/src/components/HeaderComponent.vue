<template>
    <header>           
            
        <!-- Logo -->
        <a href="https://ecolomind.fr">
            <img src="@/assets/ecolominds-logo.png" class="logo" alt="mains ouvertes sur une maison et des feuilles vertes">
        </a>

        <!-- Encart "Mon compte" en desktop  -->
        <div class="state-user">
            <div class="user-state" v-if="this.$store.state.userIsConnect">
                <div class="elements">
                    
                    <router-link to="/profil"> <img src="@/assets/profil.svg" alt="icone profil" title="Profil"></router-link>
                    <router-link to="/ajout-article" v-if="this.$store.state.userIsConnect" class="test"><img src="@/assets/addatips.svg" alt="icone du signe +" title="Proposer une astuce"></router-link>
                    <a href="#" @click="this.$store.dispatch('onUserDisconnection') + RemoveToken()"><img src="@/assets/logout.svg" alt="icone de deconnexion" title="Deconnexion"></a> 
                    
                </div>              
            </div>        
            <!-- USER NON CONNECTE -->
            <div class="user-state" v-if="!this.$store.state.userIsConnect"> 
                <div class="elements">
                    <router-link to="/connexion">
                        <img src="@/assets/login.svg" alt="icone de connexion" title="Connexion">
                    </router-link>
                </div>           
            </div>
        </div>

        

            <!-- NAVBAR -->
        <div class="navbar">

            <!-- On souhaite avoir une seule view pour les différentes pièces, donc on doit rendre la navBar dynamique, ce qui facilitera egalement si on veut rajouter une pièce plus tard. 
                Dans le Json, Rooms est un tableau, on le déclare donc en tant que tel dans les data; la key est obligatoire (value-key). On boucle sur le tableau Rooms pour chaque Room.
            L'attribut key permet d'identifier et de rendre unique chaque component   -->
            <nav class="navb">
                <router-link to="/" class="test" v-on:click.prevent="ClickBurger()">Accueil</router-link>    
    
                <router-link   
                v-for="room in rooms"
                :key="room.id" 
                :to="{
                    name: 'single-room', //nom de la route donnée dans Routers pour aller sur la view SingleRoomView
                    params: {
                        id: room.id, 
                    }
                }" class="test" v-on:click.prevent="ClickBurger()">{{room.name}}</router-link>
    
    
                        <!-- ENCART MON COMPTE DANS LE MENU BURGER -->
                <div class="navco">
                    <div class="user-state" v-if="this.$store.state.userIsConnect">
                        <div class="navco-elements">
                            <router-link to="/profil" v-on:click.prevent="ClickBurger()">Votre profil</router-link>
                            <router-link to="/ajout-article" v-if="this.$store.state.userIsConnect" class="test" v-on:click.prevent="ClickBurger()">Proposer une astuce</router-link>
                            <a href="#" @click="this.$store.dispatch('onUserDisconnection') + RemoveToken()" v-on:click.prevent="ClickBurger()">Deconnexion</a>  
                        </div>              
                    </div>        
                    <!-- USER NON CONNECTE -->
                    <div class="user-state" v-if="!this.$store.state.userIsConnect"> 
                        <div class="elements">
                            <router-link to="/connexion">Connexion</router-link>
                        </div>           
                    </div>
                </div>
    
            </nav>
        </div>  
        
        <button class="toggle-menu" v-on:click.prevent="ClickBurger()"> Ouvrir le menu </button>
        
               
    </header>
</template>


<style lang="scss" >

//Mobile-first 370px

header{
    padding: 10px;
    display: flex;
    justify-content: space-between;
    max-width: 1400px;
    margin: 0 auto;
    
    .logo{
        max-width: 110px;        
    }

    a{
        color: #2c3e50;
        text-decoration: none;
        font-weight: 700;

        &:visited{
            color:#2c3e50;
            text-decoration: none; 
        }

        &:active{
            color:white;
        }
    }

    .navco{
        border-top: 2px solid #2c3e50;
        margin-top: 25px;
        text-align: center;        
    }
    
    .elements{
        display: none;
    }
}


//La navbar et le menu burger
.navb{
    font-size: 1.2em;
    box-shadow: 0 0 30px rgba(0,0,0,0.6);
    border-radius: 15px 0 0 15px;
    top: 0;
    bottom: 0;
    z-index: 190;
    position: fixed;
    left: 100% ; 
    right: -200%;
    background-image: linear-gradient(to right top, #b5cdf0, #9fbce4, #88abd8, #719acc, #598ac0);
    transition: left 0.6s, right 0.6s;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    &.active{
        right: 0;
        left: 0;        
    }

    a{
        display: block;
        padding: 15px;
    }

}
.toggle-menu{
    position: relative;
    background: url('../assets/menuburger.png');
    background-size: contain;
    text-indent: -50000px; // on cache le texte du bouton (ne pas enlever le texte pour des questions de sémantique)
    width: 40px;
    height: 40px;
    border: none;
    margin-right: 20px;
    z-index: 200;
}


// Le thème

.light-theme{
    background: linear-gradient(180deg, rgb(105, 177, 219) 0%, rgba(255,255,255,1) 100%);

  .card{   
    background-color: #c7d3e3;
    border: 2px solid  #a7b2c0;
      p{
        color: #6c6f74;
      }
  }
}
.dark-theme{       
    background: url('~@/assets/stars.png'), linear-gradient(180deg, #053A79 0%, #5C6269 100%);
    background-size: contain;
    background-position: center;
    color: #b9b9b9;

    .navb{
        border: 1px solid #bfbfc0;
        box-shadow: none;

        a{
            color: #bfbfc0;
        }
    }
    
    
    .toggle-menu{
        background: url('../assets/menuburger-white.png');
        background-size: contain; // pour que la taille du BG soit contenu dans son conteneur
    }
    

    article{
      a{
        color: #b9b9b9;
      }
    }
}




@media screen and (min-width: 950px){
    header{
        justify-content: start;
        align-items: end;
        position: relative;

        .logo{
            max-width: 155px;
            margin-right: 30px;
        }

        .navbar{
            flex-grow: 1;
        }
        
        .navco{
            display: none;
        }
        .elements{
            display: block;
            position: absolute;
            top: 0;
            right: 15px;
            padding: 10px;

            a{
                padding-left: 10px;
                img{
                    width: 30px;
                    height: auto;
                }
            }
        }    
    }

    .navb{
        font-size: 1em;
        position: relative;
        top: auto;
        right: auto;
        left: auto;
        background: none;
        display: flex;
        justify-content: space-around;
        border: solid 0px;
        border-radius: 30px;
        box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);
        padding: 20px 0;
        margin: 30px 0;
        flex-direction: row;
        a{
            padding: 0;
        }
        
    }

    .toggle-menu{
        display: none;
    }
}
</style>


<script>
import storage from '@/utils/storage';
//On importe les fichiers où se trouvent les appels à API dont on aura besoin ici.
import TipsServices from '@/services/TipsServices.js';
import UserServices from '@/services/UserServices';

export default {
    name: 'HeaderComponent',

    // Data c'est une fonction qui permet de créer des propriétés locales au composant. 
    data() {
        return{
            rooms:[], //(dans le wp-json: rooms est un tableau)
        }
    },

    // On créé le hook Created qui sera déclenché quand le composant sera créé (pas encore affiché mais existant)
    async created(){
        this.rooms = await TipsServices.getAllRooms();

        const stateInLoad = await UserServices.isConnected();
        this.$store.commit('setConnectionState', stateInLoad);

    },
    

    methods:{
        getCurrentUserName(){
            return storage.get('userData').user_display_name;
        },
        RemoveToken(){
            storage.unset('userData');
        },
        

        async ClickBurger(){
            let navBar = document.getElementsByClassName("navb")[0];
            navBar.classList.toggle("active");
        }
    }
}
</script>