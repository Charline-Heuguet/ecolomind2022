<template>
    <header>
          
        <div class="user-state" v-if="this.$store.state.userIsConnect">
            <img src="@/assets/ecolominds-logo.png" class="logo" alt="logo-ecolomind">   
            <div class="elements">
                <span>Bonjour : {{ getCurrentUserName() }}</span>
                <router-link to="/profil">Profil</router-link>
                <a href="#" @click="this.$store.dispatch('onUserDisconnection') + RemoveToken()">Deconnexion</a>  
            </div>              
        </div>
        
        <div class="user-state" v-if="!this.$store.state.userIsConnect">
            <img src="@/assets/ecolominds-logo.png" class="logo" alt="logo-ecolomind">   
            <div class="elements">
                <router-link to="/inscription">Inscription</router-link>
                <router-link to="/connexion">Connexion</router-link>
            </div>           
        </div>
               
    </header>
</template>

<script>
import storage from '@/utils/storage';

export default {
    name: 'HeaderComponent',
    methods:{
        getCurrentUserName(){
            return storage.get('userData').user_nicename;
        },
        RemoveToken(){
            storage.unset('userData');
        },
    }
}
</script>

<style lang="scss" >

@media screen and (max-width: 699px){

    .header-container{
        display: flex;
        align-items: flex-start;
        .switcher{ 
            max-height: 50px;
        }
    }   
    .user-state{
        display: flex;
        flex-direction: column;
        align-items: center;
    } 
    .logo{
        max-height: 100px;
    }
    .dark-theme{
        .user-state{       
            span{
            color: #b9b9b9;
            }
            a{           
                color: #b9b9b9;
            }
            .router-link-exact-active {
                color: #42b983;
            }
        }
    }
}
.elements{
   display: flex; 
   flex-direction: column;
}

a{
    color: #2c3e50;
    &.router-link-exact-active {
            color: #42b983;
          }
}
header{
    display: flex;
    justify-content: space-between;
    margin: 2vh 0 0 2vh ;
}
@media screen and (min-width: 700px){ 
    .logo{
       max-height: 140px; 
    }
    .user-state{
        display: flex;
        align-items: center;
        box-sizing: border-box;
        border-radius: 30px;
        background: linear-gradient(180deg, rgb(105, 177, 219) 0%, rgba(255,255,255,1) 100%);
        box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);
        align-items: center;
        width: 35vh;  
    }
    .dark-theme{
        .user-state{
            background: url('~@/assets/stars.png'), linear-gradient(180deg, #053979e0 0%, #5c6269a6 100%);
            .elements{
                a{
                    color: #6c6f74;
                    &.router-link-exact-active {
                        color: #42b983;
                    }
                }
            }
        }
    }

}


</style>