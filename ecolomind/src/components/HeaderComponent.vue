<template>
    <header>
        
            <img src="@/assets/ecolominds-logo.png" alt="">           
        
        <div class="user-state" v-if="this.$store.state.userIsConnect">
            <span>Bonjour : {{ getCurrentUserName() }}</span>
            <router-link to="/profil">Profil</router-link>
            <a href="#" @click="this.$store.dispatch('onUserDisconnection') + RemoveToken()">Deconnexion</a>     
        </div>
        
        <div class="user-state" v-if="!this.$store.state.userIsConnect">
            <router-link to="/inscription">Inscription</router-link>
            <router-link to="/connexion">Connexion</router-link>
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

<style scoped>
.user-state{
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    border-radius: 30px;
    box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);
    width: 25vh;
    padding: 1.3vh;
}
img{
    max-height: 200px;
}
</style>