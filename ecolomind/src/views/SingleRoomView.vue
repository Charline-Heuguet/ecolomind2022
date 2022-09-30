<!-- Page d'une pièce-->
<template>
<div>

    <h1>{{singleRoom.name}}</h1>

    <h2
    v-for="astuce in tips"
    :key="astuce.id" v-html="astuce.title.rendered">  </h2>

    

    
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
        let RoomId = this.$route.params.id;

        this.singleRoom = await TipsServices.getRoomById(RoomId);

        this.tips = await TipsServices.getTipsByRoom(RoomId);
        console.log(this.$route);
    },


    // WATCH regarde la $route
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