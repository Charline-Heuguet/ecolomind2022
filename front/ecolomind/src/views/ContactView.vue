<!-- Page de contact -->

<template>
    
    <h3> Vous désirez nous poser une question ? Nous suggérer une amélioration ?</h3>
    <h3> Contactez-nous ! </h3>
    <div id="contact-us">

         <form >

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

                <textarea type="textarea" name="content" id="content" v-model="this.msgForm" rows="10" cols="50"  > </textarea>
                <div v-if="this.errors.msgMissing" class=obli> Vous n'avez pas écrit de message</div>
            </div>

            <button class="send" v-on:click.prevent="Send()" >Envoyer</button>
    </form>

    </div>

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

</script>

<style lang="scss">

#contact-us{
    display: flex;
    color: #6c6f74;
    justify-content: center;   
    input{       
        width: 245px;
        height: 35px;
        margin:5px 0 20px 0;
        border-radius: 20px;
        border: 2px solid  #a7b2c0;
        background-color: #c7d3e3;
        padding: 8px;
    }
    #content{
        width: 245px;
        height: 150px;
        padding: 8px;
        border-radius: 5px;
        margin-top: 5px;
        margin-bottom: 15px;       
        background-color: #c7d3e3;
        border: 2px solid  #a7b2c0;

    }
    .send{
        width: 100%;
        background-color: #acd14f;
        color: #404041;
        border: 1px solid #404041;
        border-radius: 20px;
        font-weight: 600;
        height: 40px;
        margin-bottom: 15px;
    }
    .obli{
        color:red;
    }
}


.form{
    display: flex;
    flex-direction: column;
}

.dark-theme{
    #contact-us{
        label{
            color:#a7b2c0 ;
        }
        #content{
            color: #e8e8ee;
            background-color: #253651;
            border: 2px solid  #a7b2c0;
        }
        input{
            color: #e8e8ee;
            background-color: #253651;
            border: 2px solid  #a7b2c0;
        }
        select{
            color: #e8e8ee;
            background-color: #253651;
            border: 2px solid  #a7b2c0;
        }
        .message{
            color: #e8e8ee;
            background-color: #253651;
            border: 2px solid  #a7b2c0;
        }
}
}
</style>