<!-- Page d'une pièce-->
<template>
<div>

    <h1>{{singleRoom.name}}</h1>

    <article v-for="astuce in tips"
    :key="astuce.id">
        <router-link :to="{name: 'single-tips'}">
            <h2 v-html="astuce.title.rendered"></h2> 
        </router-link> 
            <p v-html="astuce.excerpt.rendered"></p>
        <router-link :to="{name: 'single-tips'}">
            <p>Lire la suite</p> 
        </router-link> 
        
    </article>
</div>
</template>

<script>

import TipsServices from "@/services/TipsServices"


//import TipsServices from '@/services/TipsServices.js';
export default ({
    name: 'SingleRoomView',
       
    data(){
        return{
            singleRoom:"",
            tips:[],
        }
    },
    
    async created()
    {        
        let RoomId = this.$route.params.id ;
        this.singleRoom = await TipsServices.getRoomById(RoomId);

        this.tips = await TipsServices.getTipsByRoom(RoomId);
        console.log(this.$route);
    },

    // WATCH regarde la $route (qu'on ne connait pas et qui est introuvable)
    // to: destination
    // from: provenance
    // Si la destination est différente de la provenance, alors on reload.
    watch: {
        $route(to, from) { 
            // react to route changes... 
            if(to !== from){ 
                location.reload(); 
            } 
        } 
    }
})
</script>