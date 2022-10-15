<!-- Page d'inscription -->
<template>
<h1>Inscription</h1>
    <div class="inscription-form">
        
        <p>Rejoignez la communauté Ecolomind</p>

        <form @submit.prevent="creatUser">
            <div>
                <label for="username"></label>
                <input type="text" placeholder="Pseudo" name="" id="username" v-model="this.formData.username">
            </div>
            <div v-if="this.errors.usernameMissing" class="error">Veuillez renseigner votre nom d'utilisateur</div>

            <div>
                <label for="email"></label>
                <input type="text" placeholder="Email" name="" id="email" v-model="this.formData.email">
            </div>
            <div v-if="this.errors.emailMissing" class="error">Veuillez renseigner votre adresse email</div>

            <div>
                <label for="password"></label>
                <input type="password" placeholder="Mot de passe" name="" id="password" v-model="this.formData.password">
            </div>
            <div v-if="this.errors.passwordMissing" class="error">Veuillez renseigner votre mot de passe</div>

            <div>
                <label for="confirm_password"></label>
                <input type="password" placeholder="Confirmer le mot de passe" name="" id="confirm_password" v-model="this.formData.confirm_password">
            </div>
            <div v-if="this.errors.confirmPasswordMissing" class="error">Veuillez confirmer votre mot de passe</div>
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
               
            },
            errors: {
                usernameMissing: false,
                emailMissing: false,
                passwordMissing: false,
                confirmPasswordMissing: false,
            }
            
        }
        
    },
    methods:
    
    
    {
             
         async creatUser(){
    

            // // console.log(JSON.parse(JSON.stringify(this.formData)));
            // // console.log('fin from data');
            // axios.post('http://ecolomind.local/wp-json/wp/v2/ecolomind/subscribe', JSON.parse(JSON.stringify(this.formData)),this.$router.push({name : "connexion"})) //don't forget LE PIÈGE


            //  .then(response => console.log(response)) 
            // .catch(function(){

               
            // // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
            // return {data: null}
            // })

            this.errors.usernameMissing = false;
            this.errors.emailMissing = false;
            this.errors.passwordMissing = false;
            this.errors.confirmPasswordMissing = false;

            //form with error
            if(this.formData.username == ""){
                this.errors.usernameMissing = true;
            }
            if(this.formData.email == ""){
                this.errors.emailMissing = true;
            }
            if(this.formData.password == ""){
                this.errors.passwordMissing = true;
            }
            if(this.formData.confirm_password == ""){
                this.errors.confirmPasswordMissing = true;
            }

            //form without error
            if(!this.errors.usernameMissing && !this.errors.emailMissing && !this.errors.passwordMissing && !this.errors.confirmPasswordMissing){

                axios.post('http://ecolomind.local/wp-json/wp/v2/ecolomind/subscribe', JSON.parse(JSON.stringify(this.formData)),this.$router.push({name : "connexion"})) //don't forget LE PIÈGE

                .then(response => console.log(response)) 
                .catch(function(){
                
                // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
                return {data: null}
                })
            }
        },

        // redirectConnexion(){
        //     if(this.creatUser === true){
        //         this.$router.push({name : "connexion"});
        //     }
        // }
        
    }

   
}
</script>