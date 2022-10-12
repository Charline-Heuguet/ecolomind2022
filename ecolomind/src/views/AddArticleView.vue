<!-- Page ajout d'astuce  -->

<template>

    <div id="add-article">
        
        <h3> Ajouter une astuce</h3>

        <form @submit.prevent="createTips">

            <div >
                <select name="rooms" id="room-select" v-model="this.formData.selectedRoom">
                    <option v-for="room in this.rooms" :key="room.id" :value="room.id">
                        {{room.name}}
                    </option>
                </select>
            </div>
            
            <select name="difficulty" id="difficulty-select" v-model="this.formData.selectedDifficulty">
                <option v-for="difficulty in this.difficulties" :key="difficulty.id" :value="difficulty.id">
                    {{difficulty.name}}
                </option>
            </select>

            <div>
                <label for="title">Inscrire le titre de votre astuce :</label>
                <input type="text" id="title" name="title" placeholder="Titre de votre astuce" v-model="formData.titre">
            </div>

            <div v-for="(ingr, index) in this.formData.ingredient" :key="ingr">
                <label for="ingredients">Ingrédient {{index+1}}</label>
                <input 
                type="text" id="ingredients" name="ingredients" placeholder="Les ingrédients nécessaires" v-model="ingr.ing">
                
                <button @click.prevent="removeIngredient">x</button>
            </div>
            <button @click.prevent="newIngredient">+</button>
            <!-- <div>
                <ul>
                    <li v-for="ing in this.formData.ingredient" :key="ing.id">
                        <p>{{ingredient.name}}</p>

                    </li>
                </ul>
            </div> -->

            <div>
                <label for="content"></label>
                <textarea type="textarea" name="content" id="content" placeholder="Ecrivez les quantités des ingredients nécessaires à votre astuce.Rédigez votre recette en la détaillant" v-model="formData.contenu"></textarea>
            </div>

            <div>
                <label for="photo">Postez la photo de votre produit</label>
                <input type="file" id="photo" name="photo" accept="image/png, image/jpeg">
            </div>

            <button>Envoyez votre astuce</button>

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
    
            // console.log(this.formData.selectedDifficulty);
            console.log(JSON.parse(JSON.stringify(this.formData)));
            //  console.log('fin from data');
            axios.post('http://ecolomind.local/wp-json/wp/v2/ecolomind/addTips', JSON.parse(JSON.stringify(this.formData))) //don't forget LE PIÈGE
             .then(response => console.log(response)) 
            .catch(function(){ 
                
                // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
                return {data: null}
            })
        },
        getCurrentUserName(){
            return storage.get('userData').user_display_name;
        },
        newIngredient(){
          this.formData.ingredient.push({ing: ''},)  
        },
        removeIngredient(index){
            if(this.formData.ingredient.length > 1){
                this.formData.ingredient.splice(index, 1)
            }
            
        }

        // debug(){
        //     console.log(this.selectedDifficulty);
        // }

        // onChange:function(evenement){
        //     console.log(evenement.target.value);
        // }
        
    },
}
</script>
