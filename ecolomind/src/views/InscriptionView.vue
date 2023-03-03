<!-- Page d'inscription -->
<template>


    


        <div class="inscription">
            <h2>Inscription</h2>
            <p>Rejoignez la communauté Ecolomind</p>
                <div class="inscription-form">
                    
                    <form @submit.prevent="creatUser">
                        <div>
                            <div v-if="this.errors.usernameMissing" class="error">Veuillez renseigner votre pseudo</div>
                            <label for="username"></label>
                            <input type="text" placeholder="Pseudo" name="" id="username" v-model="this.formData.username">
                        </div>
                        
                        <div>
                            <div v-if="this.errors.emailMissing" class="error">Veuillez renseigner votre adresse email</div>
                            <label for="email"></label>
                            <input type="text" placeholder="Email" name="" id="email" v-model="this.formData.email">
                        </div>            
            
                        <div>
                            <div v-if="this.errors.passwordMissing" class="error">Veuillez renseigner votre mot de passe</div>
                            <div v-if="this.errors.misMatchPassword" class="error">Les mots de passe ne correspondent pas</div>
                            <label for="password"></label>
                            <input type="password" placeholder="Mot de passe" name="" id="password" v-model="this.formData.password">
                        </div>            
            
                        <div>
                            <div v-if="this.errors.confirmPasswordMissing" class="error">Veuillez confirmer votre mot de passe</div>
                            <label for="confirm_password"></label>
                            <input type="password" placeholder="Confirmer le mot de passe" name="" id="confirm_password" v-model="this.formData.confirm_password">
                        </div>
                    
                        <button>Je m'inscris</button>
                    </form>
                </div>
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
                misMatchPassword: false,
            },          
            
        }
        
    },
    methods:{
             
         async creatUser(){
            this.errors.usernameMissing = false;
            this.errors.emailMissing = false;
            this.errors.passwordMissing = false;
            this.errors.confirmPasswordMissing = false;
            this.errors.misMatchPassword = false;

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
            if(this.formData.confirm_password != this.formData.password){
                this.errors.misMatchPassword = true;
            }

            //form without error
            if(!this.errors.usernameMissing && !this.errors.emailMissing && !this.errors.passwordMissing && !this.errors.confirmPasswordMissing && !this.errors.misMatchPassword){

                axios.post('https://back.ecolomind.fr/wp-json/wp/v2/ecolomind/subscribe', JSON.parse(JSON.stringify(this.formData)),this.$router.push({name : "connexion"})) 

                .then(response => console.log(response)) 
                .catch(function(){
                
                // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
                return {data: null}
                })
            }
        },        
    }

   
}
</script>

<style lang="scss">

.inscription{
    text-align: center;
}


form{ 

    input{
        width: 260px;
        height: 35px;
        margin:5px 0 20px 0;
        border-radius: 20px;
        border: 2px solid  #a7b2c0;
        background-color: #c7d3e3;
        padding: 15px; 
    }

    
    button{
        width: 150px;
        height: 30px;
        border: none;
        color: #404041;
        font-weight: bold;
        border-radius: 20px;
        background-color: #acd14f;
        margin: 15px;
        cursor: pointer;
    }
    .error{
        color: red;
    }

}

.inscription-form{
    display: flex;
    justify-content: center;
    margin-bottom: 15px;
    
    }



// DARKTHEME
.dark-theme{
       form{
           input{
                color: #e8e8ee;
                background-color: #253651;
                border: 2px solid  #a7b2c0;
           }
           button{
                color: #e8e8ee;
                background-color: #407038;
           }
       }
    
}
</style>