<!-- Page d'inscription -->
<template>
    <div>
        <h1>Inscription</h1>
        <p>Rejoignez la communauté Ecolomind</p>

        <form @submit.prevent="creatUser">
            <div>
                <label for="username"></label>
                <input type="text" placeholder="Pseudo" name="" id="username" v-model="formData.username">
            </div>

            <div>
                <label for="email"></label>
                <input type="text" placeholder="Email" name="" id="email" v-model="formData.email">
            </div>

            <div>
                <label for="password"></label>
                <input type="password" placeholder="Mot de passe" name="" id="password" v-model="formData.password">
            </div>

            <div>
                <label for="confirm_password"></label>
                <input type="password" placeholder="Confirmer le mot de passe" name="" id="confirm_password" v-model="formData.confirm_password">
            </div>
            <!-- <div>
                <input type="checkbox" name="" id="checkbox" v-model="formData.checkbox">
                <label for="checkbox">En m'inscrivant, j'accepte les <router-link :to="{name: 'politique-de-confidentialite'}">
                Politique de confidentialité
                </router-link></label>                               
            </div> -->
            <button>Je m'inscris</button>
        </form>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    name : 'InscriptionView',
    data(){
        return {
            formData: {
                username: '',
                email: '',
                password: '',
                confirm_password: '',
                // checkbox: '',
            }, 
        }
        
    },
    methods: {
         creatUser(){
             console.log('debut from data');
            console.log(JSON.parse(JSON.stringify(this.formData)));
             console.log('fin from data');
            axios.post('http://ecolotips.local/wp-json/wp/v2/users', JSON.parse(JSON.stringify(this.formData))) //don't forget LE PIÈGE
            .then(response => console.log(response))
            .catch(error => console.log(error))
        }
    }
}
</script>