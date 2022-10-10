<!-- Page de contact -->
<template>
    
    <p> Vous désirez nous poser une question ? Nous suggérer une amélioration ?</p>
    <p> Contactez-nous ! </p>


    <form>

            <div class="form">

                <div v-if="this.errors.nameMissing" class=obli>Pseudo non renseigné</div>
                <label for="name"> Votre nom (obligatoire)</label>
                <input v-model="this.nameForm" type="text" id="name"/>
                
            </div>

            <div class="form">
                <div v-if="this.errors.mailMissing" class=obli> Mail non renseigné</div>
                <label for="mail"> Votre email (obligatoire)</label>
                <input v-model="this.mailForm" type="text" id="mail" />
                
            </div>

            <div class="form">
                <label for="subject"> Sujet (facultatif) </label>
                <input v-model="this.subjectForm" type="text" id="subject" />
            </div>

            <div class="form">
                <label for="message" > Votre message</label>

                <textarea v-model="this.msgForm" rows="10" cols="50"  > </textarea>
                <div v-if="this.errors.msgMissing" class=obli> Vous n'avez pas écrit de message</div>
            </div>

            <button v-on:click.prevent="Send()" >Envoyer</button>
    </form>

</template>


<script>
export default{
    name: "ContactView",
    data(){
        return {
            nameForm : "",
            mailForm : "",
            subjectForm : "",
            msgForm: "", 
            errors : {
                nameMissing: false,
                mailMissing : false,
                msgMissing : false,
            }

         }
    },

    methods: {
        async Send(){
            this.errors.nameMissing = false;
            this.errors.msgMissing = false;
            this.errors.mailMissing = false;

            //form with error
            if(this.nameForm == ""){
                this.errors.nameMissing = true;
            }
            if(this.mailForm == ""){
                this.errors.mailMissing = true;
            }
            if(this.msgForm == ""){
                this.errors.msgMissing = true;
            }

            //form without error
            // if(!this.errors.nameMissing && !this.errors.mailMissing &&!this.errors.msgMissing){
            //     const sendMessage = await ;
            // }
        }
    }
}
//import axios from 'axios';

</script>

<style lang="scss">


.obli{
    color:red;
}

input{
    height: 30px;
    width: 250px;
    margin: 5px auto 20px;
}
label, input {
    display: block;
}

button, h3{
    margin-top: 20px;
    margin-bottom: 30px;
}

.form{
    display: flex;
    flex-direction: column;
}
</style>