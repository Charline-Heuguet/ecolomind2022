<!-- Page ajout d'astuce  -->

<template>

    <div id="add-article">
        
        <h3> Ajouter une astuce</h3>

        <form @submit.prevent="createTips()">

            <div >
                <select name="rooms" id="room-select" v-model="this.formData.selectedRoom">
                    <option v-for="room in this.rooms" :key="room.id" :value="room.id">
                        {{room.name}}
                    </option>
                </select>
            </div>
            <div v-if="this.errors.roomMissing" class="error">Veuillez renseigner une pièce</div>
            
            <select name="difficulty" id="difficulty-select" v-model="this.formData.selectedDifficulty">
                <option v-for="difficulty in this.difficulties" :key="difficulty.id" :value="difficulty.id">
                    {{difficulty.name}}
                </option>
            </select>
            <div v-if="this.errors.difficultyMissing" class="error">Veuillez renseigner une difficulté</div>

            <div>
                <label for="title">Inscrire le titre de votre astuce :</label>
                <input type="text" id="title" name="title" placeholder="Titre de votre astuce" v-model="this.formData.titre">
            </div>
            <div v-if="this.errors.titleMissing" class="error">Veuillez renseigner un titre</div>

            <div>
                <label for="ingredients">Ingrédients</label>
                <div v-for="(ingr, index) in this.formData.ingredient" :key="ingr">
                    
                    <input type="text" id="ingredients" name="ingredients" placeholder="Les ingrédients nécessaires" v-model="ingr.ing">
                    
                    <button @click.prevent="removeIngredient(index)">x</button>
                </div>
                <button @click.prevent="newIngredient">+</button>
            </div>
            
            <!-- <div>
                <ul>
                    <li v-for="ing in this.formData.ingredient" :key="ing.id">
                        <p>{{ingredient.name}}</p>

                    </li>
                </ul>
            </div> -->

            <div>
                <label for="content"></label>
                <textarea type="textarea" name="content" id="content" placeholder="Ecrivez les quantités des ingredients nécessaires à votre astuce.Rédigez votre recette en la détaillant" v-model="this.formData.contenu"></textarea>
            </div>
            <div v-if="this.errors.contentMissing" class="error">Veuillez renseigner l'astuce</div>

            <!-- <div>
                <label for="photo">Postez la photo de votre produit</label>
                <input type="file" id="photo" name="photo" accept="image/png, image/jpeg">
            </div> -->

            <button>Envoyez votre astuce</button>
            <div v-if="this.success" class="success">Votre astuce a bien été envoyée ! Elle sera postée après validation des modérateurs</div>

        </form>

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

        // getCurrentUserName(){
        //     return storage.get('userData').user_display_name;
        // },
    
      
        newIngredient(){
          this.formData.ingredient.push({ing: ''},)  
        },
        removeIngredient(index){
            if(this.formData.ingredient.length > 1){
                this.formData.ingredient.splice(index, 1)
            }
            
        },


        // debug(){
        //     console.log(this.selectedDifficulty);
        // }

        // onChange:function(evenement){
        //     console.log(evenement.target.value);
        // }
        
    },
}
</script>

