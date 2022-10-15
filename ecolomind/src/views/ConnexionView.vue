<!-- Page de connexion !-->
<template>
    <div class="connexion">
        <form>
            <div class="mail-form">
                <div v-if="this.errors.loginMissing" >Email ou pseudo non valide</div>
                <label for="email">Email ou pseudo d'utilisateur :</label>
                <input v-model="this.loginInForm" placeholder="gerceval@gmail.com" type="text" id="email" />
                
            </div>
            <div class="pass-form">
                <div v-if="this.errors.passwordMissing" >Mot de passe non valide</div>
                <label for="password">Mot de passe :</label>                
                <input v-model="this.passwordInForm" type="password" id="password" placeholder="***********" />
                
            </div>

            <div v-if="this.errors.loginIncorrects" class="error">Login ou mot de passe incorrect</div>
             
            <button v-on:click.prevent="Connexion()" >Se connecter</button>
        </form>
    </div>
</template>

<script>
import UserServices from '@/services/UserServices';
import storage from '@/utils/storage';

export default {
    name: 'ConnexionView',
    data(){
        return {
            loginInForm : "",
            passwordInForm : "",
            errors : {
                loginMissing : false,
                passwordMissing : false,
                loginIncorrects : false
            }
        }
    },
    methods: {
        async Connexion(){
            this.errors.loginMissing = false;
            this.errors.passwordMissing = false;
            this.errors.loginIncorrects = false;

            //form with error
            if(this.loginInForm == ""){
                this.errors.loginMissing = true;
            }
            if(this.passwordInForm == ""){
                this.errors.passwordMissing = true;
            }

            //form without error
            if(!this.errors.passwordMissing && !this.errors.loginMissing){

                const userData = await UserServices.login(this.loginInForm, this.passwordInForm)

                //Storage est déclarée dans la gestion des cookies
                storage.set('userData', userData);

                const isUserConnected = await UserServices.isConnected();
                if(!isUserConnected){
                    this.errors.loginIncorrects = true;
                }else{
                    this.$store.dispatch('onUserConnection'); // on envoie une action à appliquer qui attribuera à l'utilisateur un nouvel état de connexion.
                    this.$router.push({name: "home"}); //Si la connexion est ok, on redirige automatiquement l'utilisateur vers la home (on simule un clic)
                }
            }
        }
    }
}
</script>

<style lang="scss">
.connexion{
    display: flex;
    justify-content: center;
    margin-top: 10%;
    #email{
        width: 35vh;
        height: 5vh;
        margin:5px 0 20px 0;
        border-radius: 20px;
        border: 2px solid  #a7b2c0;
        background-color: #c7d3e3;
        padding: 8px;
    }
    #password{
        width: 35vh;
        height: 5vh;
        margin:5px 0 20px 0;
        border-radius: 20px;
        border: 2px solid  #a7b2c0;
        background-color: #c7d3e3;
        padding: 8px;
    }
    button{
        width: 20vh;
        height: 4vh;
        border: none;
        color: #404041;
        font-weight: bold;
        border-radius: 20px;
        background-color: #acd14f;
        margin-top: 15px;
        cursor: pointer;
    }
    .mail-form{
        display: flex;
        flex-direction: column;
        div{
            color: red;
        }
    }
    .pass-form{
        display: flex;
        flex-direction: column;
        div{
            color: red;
        }
    }
    .error{
        color: red;
    }
}    
.dark-theme{
    .connexion{
        #email{
 color: #e8e8ee;
            background-color: #253651;
            border: 2px solid  #a7b2c0;
        }
        #password{
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