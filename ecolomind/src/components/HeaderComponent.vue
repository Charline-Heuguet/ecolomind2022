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
            return storage.get('userData').user_display_name;
        },
        RemoveToken(){
            storage.unset('userData');
        },
    }
}
</script>

<style >
.elements{
   display: flex; 
   flex-direction: column;
}
.user-state{
    display: flex;
    flex-direction: row;
    box-sizing: border-box;
    border-radius: 30px;
    box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);
    align-items: center;
    width: 35vh;
   
}
a{
    color: #2c3e50;
}
header{
    display: flex;
    justify-content: space-between;
    margin: 2vh 0 0 2vh ;
}
.logo{
    max-height: 120px;
}

</style>