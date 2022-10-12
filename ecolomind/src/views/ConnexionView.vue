<!-- Page de connexion !-->
<template>
    <div>
        <form>
            <div>
                <label for="email">Email :</label>
                <input v-model="this.loginInForm" placeholder="gerceval@gmail.com" type="text" id="email" />
                <div v-if="this.errors.loginMissing" >Pseudo non valide</div>
            </div>
            <div>
                <label for="password">Mot de passe :</label>
                <input v-model="this.passwordInForm" type="password" id="password" />
                <div v-if="this.errors.passwordMissing" >Mot de passe non valide</div>
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