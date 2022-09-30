<!-- Header et navbar !-->
<template>
        <nav>
            <router-link to="/">Accueil</router-link>

<!-- On souhaite avoir une seule view pour les différentes pièces, donc on doit rendre la navBar dynamique, ce qui facilitera egalement si on veut 
rajouter une pièce plus tard. 
Dans le Json, Rooms est un tableau, on le déclare donc en tant que tel dans les data; la key est obligatoire (value-key). On boucle sur le tableau Rooms pour chaque Room.
L'attribut key permet d'identifier et de rendre unique chaque component   -->
            <router-link   
            v-for="room in rooms"
            :key="room.id" 
            :to="{
                    name: 'single-room', //nom de la route donnée dans Routers pour aller sur la view SingleRoomView
                    params: {
                        id: room.id, 
                    }
                }">{{room.name}}</router-link>

<router-link to="/ajout-article">Proposer une astuce</router-link>

        </nav>
</template>


<script>

//On importe le fichier TipsServices dans lequel se trouve les appels à API dont on aura besoin ici.

import TipsServices from '@/services/TipsServices.js';


export default ({
    name: 'NavComponent',


    // Data c'est une fonction qui permet de créer des propriétés locales au composant. 
    data() {
        return{
            rooms:[], //(dans le wp-json: rooms est un tableau)
        }
    },

    // On créé le hook Created qui sera déclenché quand le composant sera créé (pas encore affiché mais existant)
    async created(){

        this.rooms = await TipsServices.getAllRooms();
    }
    
})
</script>

