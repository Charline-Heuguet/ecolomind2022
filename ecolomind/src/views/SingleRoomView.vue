<!-- Page d'une pièce-->
<template>
<div>

    <h1>{{singleRoom.name}}</h1>

    <TipsCardComponent 
    v-for="astuce in tips"
    :key="astuce.id"
    :dbid="astuce.id"
    :title="astuce.title.rendered"
    :excerpt="astuce.excerpt.rendered"
    />
    
</div>
</template>

<script>

import TipsServices from "@/services/TipsServices";
import TipsCardComponent from '@/components/TipsCardComponent';

//import TipsServices from '@/services/TipsServices.js';
export default ({
    name: 'SingleRoomView',
    components:{
        TipsCardComponent
    }, 

    data(){
        return{
            singleRoom:"",
            tips:[],
        }
    },
<<<<<<< HEAD

        
=======
    
>>>>>>> 1dfb29faff4d034a90f21499ea5d662c488fbbba
    async created()
    {        
        let RoomId = this.$route.params.id;

        this.singleRoom = await TipsServices.getRoomById(RoomId);

        this.tips = await TipsServices.getTipsByRoom(RoomId);
        console.log(this.$route);
    },

<<<<<<< HEAD

    // WATCH regarde la $route
=======
    // WATCH regarde la $route (qu'on ne connait pas et qui est introuvable)
>>>>>>> 1dfb29faff4d034a90f21499ea5d662c488fbbba
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