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

<style lang="scss">

h1 {
    margin-top: 50px;
}

article{
    background-color: rgba($color: #FFCED8, $alpha: 0.5);
    //border: 0.5px solid ;
    border-radius: 15px;
}



</style>