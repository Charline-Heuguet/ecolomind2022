<!-- Page ajout d'astuce  -->

<template>

    <div id="add-article">
        
        <h3> Ajouter une astuce </h3>

        <form @submit.prevent="createTips">

            <div >
                <select  name="rooms" id="room-select" v-model="this.formData.select">
                    <option v-for="room in formData.rooms"  :key="room" :value="room.value">
                        {{room.name}}
                    </option>
                </select>
            </div>
            

            <select name="difficulty" id="difficulty-select">
                <option v-for="difficulty in formData.difficulties"  :key="difficulty" :value="difficulty.value">
                    {{difficulty.name}}
                </option>
            </select>

            <div>
                <label for="title">Inscrire le titre de votre astuce :</label>
                <p>{{ formData.titre }}</p>
                <input type="text" id="title" name="title" placeholder="Titre de votre astuce" v-model="formData.titre">
            </div>


            <div>
                <label for="ingredients"></label>
                <p>{{ formData.ingredient }}</p>
                <input type="text" id="ingredients" name="ingredients" placeholder="Les ingrédients nécessaires" v-model="formData.ingredient">
            </div>

            <div>
                <label for="content"></label>
                <p>{{ formData.contenu }}</p>
                <input type="textarea" name="content" id="content" placeholder="Ecrivez les quantités des ingredients nécessaires à votre astuce.Rédigez votre recette en la détaillant" v-model="formData.contenu">
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
import TipsServices from '@/services/TipsServices.js';


export default {
 
    name: "AddArticleView",


    data(){
        return {
            formData: {
                rooms: [],
                difficulties: [],
                titre: '',
                ingredient: '',
                contenu: "",
                photo:"",
                select: "",
               
            }, 
            // selected : 'A',
                // rooms: [
                // { text: 'La pièce concernée', value: 'A' },
                // { text: 'Cuisine', value: 'B' },
                // { text: 'Jardin', value: 'C' },
                // { text: 'Salon', value: 'D' },
                // { text: 'Salle de bain', value: 'E' },
                // { text: 'Chambre', value: 'F' },
                // ],

                // difficulties: [
                // { text: 'Niveau de difficulté', value: 'A' },
                // { text: 'Facile', value: 'B' },
                // { text: 'Moyen', value: 'C' },
                // { text: 'Difficile', value: 'D' }
                // ]

            
            
        }
        
    },

    async created(){

        this.formData.difficulties = await TipsServices.getAllDifficulties();
        console.log(this.formData.difficulties);

        this.formData.rooms = await TipsServices.getAllRooms();

    },
    methods:
    
    
    {
             
         async createTips(){
    
            console.log(JSON.parse(JSON.stringify(this.formData)));
            //  console.log('fin from data');
            axios.post('http://ecolomind.local/wp-json/wp/v2/ecolomind/tips', JSON.parse(JSON.stringify(this.formData))) //don't forget LE PIÈGE
             .then(response => console.log(response)) 
            .catch(function(){ 
               
            // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
            return {data: null}
        })
        }
        
    },
}
</script>
