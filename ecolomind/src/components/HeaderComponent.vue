<template>
    <header>
        <div>
            <img src="" alt="">
            <h1>Ecolo Mind</h1>            
        </div>
        <div class="user-state" v-if="this.$store.state.userIsConnect">
            <span>{{ getCurrentUserName() }}</span>
            <router-link to="/profil">Profil</router-link>
            <a href="#" @click="this.$store.dispatch('onUserDisconnection')">Deconnexion</a>     
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
        }
    }
}
</script>

<style scoped>
.user-state{
    display: flex;
    flex-direction: column;
}
</style>