<!-- Page ajout d'astuce  -->

<template>
    <div>
    <h3> Ajouter une astuce</h3>
    <div id="add-article">
               
        <form @submit.prevent="createTips()">
            <div >
                <label for="room-select" class="column-astuce">Pièce de la maison :</label>
                <select name="rooms" id="room-select" v-model="this.formData.selectedRoom">
                    <option v-for="room in this.rooms" :key="room.id" :value="room.id">
                        {{room.name}}
                    </option>
                </select>
            </div>
            <div v-if="this.errors.roomMissing" class="error">Veuillez renseigner une pièce</div>
            <div class="column-astuce">
                <label for="difficulty-select">Difficulté de l'astuce :</label>
                <select name="difficulty" id="difficulty-select" v-model="this.formData.selectedDifficulty">
                    <option v-for="difficulty in this.difficulties" :key="difficulty.id" :value="difficulty.id">
                        {{difficulty.name}}
                    </option>
                </select>
            </div>
            <div v-if="this.errors.difficultyMissing" class="error">Veuillez renseigner une difficulté</div>

            <div class="column-astuce">
                <label for="title">Inscrire le titre de votre astuce :</label>
                <input type="text" id="title" name="title" placeholder="Titre de votre astuce" v-model="this.formData.titre">
            </div>
            <div v-if="this.errors.titleMissing" class="error">Veuillez renseigner un titre</div>

            <div>
                <label for="ingredients">Ingrédients :</label>
                <div v-for="(ingr, index) in this.formData.ingredient" :key="ingr">
                    
                    <input type="text" id="ingredients" name="ingredients" placeholder="Les ingrédients nécessaires" v-model="ingr.ing">
                    
                    <button @click.prevent="removeIngredient(index)" class="new-ingredients">x</button>
                </div>
                <button @click.prevent="newIngredient" class="new-ingredients">+</button>
            </div>

            <div v-if="this.errors.contentMissing" class="error">Veuillez renseigner l'astuce</div>
            <div>
                <label for="content"></label>
                <textarea type="textarea" name="content" id="content" placeholder="Ecrivez les quantités des ingredients nécessaires à votre astuce.Rédigez votre recette en la détaillant" v-model="this.formData.contenu"></textarea>
            </div>
            
            <!-- <div>
                <label for="photo">Postez la photo de votre produit</label>
                <input type="file" id="photo" name="photo" accept="image/png, image/jpeg">
            </div> -->

            <button class="send-astuce">Envoyez votre astuce</button>
            <div v-if="this.success" class="success">Votre astuce a bien été envoyée ! Elle sera postée après validation des modérateurs</div>

        </form>

    </div>

</div>

</template>

<script>

import axios from 'axios';
import storage from '@/utils/storage.js';
import TipsServices from '@/services/TipsServices.js';


export default {
 
    name: "AddArticleView",


    data(){
        return {
            difficulties: [],
            rooms: [],

            formData: {
                selectedDifficulty: "",
                selectedRoom: "",
                titre: '',
                ingredient: [{ing: ''},],
                contenu: "",
                photo:"",
                authorID: storage.get('userData').userID,
            },
            errors : {
                roomMissing : false,
                difficultyMissing : false,
                titleMissing : false,
                contentMissing: false,
            },
            success : false,
        }
        
    },

    async created(){

        // this.difficulties = await TipsServices.getDifficultyById();
        this.difficulties = await TipsServices.getAllDifficulties();
        // console.log(this.formData.difficulties);

        this.rooms = await TipsServices.getAllRooms();

    },
    methods:

    {
        async createTips(){
            this.errors.roomMissing = false;
            this.errors.difficultyMissing = false;
            this.errors.titleMissing = false;
            this.errors.contentMissing = false;

            //form with error
            if(this.formData.selectedRoom == ""){
                this.errors.roomMissing = true;
            }
            if(this.formData.selectedDifficulty == ""){
                this.errors.difficultyMissing = true;
            }
            if(this.formData.titre == ""){
                this.errors.titleMissing = true;
            }
            if(this.formData.contenu == ""){
                this.errors.contentMissing = true;
            }

            //form without error
            if(!this.errors.roomMissing && !this.errors.difficultyMissing && !this.errors.titleMissing && !this.errors.contentMissing){

                console.log(JSON.parse(JSON.stringify(this.formData)));
                //  console.log('fin from data');
                axios.post('http://ecolomind.local/wp-json/wp/v2/ecolomind/addTips', JSON.parse(JSON.stringify(this.formData))) //don't forget LE PIÈGE
                .then(response => console.log(response)) 
                .catch(function(){ 
                    
                    // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
                    return {data: null}
                })

                this.success = true;
            }
        },
      
        newIngredient(){
          this.formData.ingredient.push({ing: ''},)  
        },
        removeIngredient(index){
            if(this.formData.ingredient.length > 1){
                this.formData.ingredient.splice(index, 1)
            }
            
        },       
    },
}
</script>

<style lang="scss">

#add-article{
    display: flex;
    color: #6c6f74;
    justify-content: center;   
    input{       
        width: 35vh;
        height: 5vh;
        margin:5px 0 20px 0;
        border-radius: 20px;
        border: 2px solid  #a7b2c0;
        background-color: #c7d3e3;
        padding: 8px;
    }
    button{        
        border: none;
        margin-bottom: 15px;     
        background-color: #c7d3e3;  
    }
    
    select{        
        width: 35vh;
        height: 5vh;
        padding:0 0 0 5px;
        margin:5px 0 20px 0;
        border-radius: 20px;
        border: 2px solid  #a7b2c0;
        background-color: #c7d3e3;
        
    }
    .column-astuce{
        display: flex;
        flex-direction: column;
    }
    #content{
        width: 35vh;
        height: 15vh;
        padding: 8px;
        border-radius: 5px;
        margin-bottom: 15px;       
        background-color: #c7d3e3;
        border: 2px solid  #a7b2c0;
    }
    .send-astuce{     
        width: 20vh;
        height: 4vh;
        border: none;
        color: #404041;
        font-weight: bold;
        border-radius: 20px;
        background-color: #acd14f;
    }
    #ingredients{
        margin-right: 5px;
    }
    .new-ingredients{
        width: 3vh;
        height: 3vh;        
        border-radius: 20px;
    }
    .error{
        color: red;
    }
}
.dark-theme{
    #add-article{
        #content{
            color: #e8e8ee;
            background-color: #253651;
            border: 2px solid  #b7c2cf;
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
        .new-ingredients{
            color: #e8e8ee;
            background-color: #253651;
            border: 2px solid  #a7b2c0;
        }
        .send-astuce{
            color: #e8e8ee;
            background-color: #407038;
        }
}

}

</style>