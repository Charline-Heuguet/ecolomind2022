<!-- Page d'une pièce-->
<template>
<div>

    <h1>{{singleRoom.name}}</h1>

    <div id="tipscardcomponent">

        <TipsCardComponent 
        v-for="astuce in tips"
        :key="astuce.id"
        :dbid="astuce.id"
        :title="astuce.title.rendered"
        :excerpt="astuce.excerpt.rendered"
        :difficultyId="astuce.difficulty"
        />

    </div>
    
</div>
</template>

<script>
import axios from "axios";
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
            astuce:"",
            difficulty:"",
        }
    },

        
    async created()
    {     
        const base_url= "http://ecolomind.local/wp-json";
        
   
        let RoomId = this.$route.params.id;

        this.singleRoom = await TipsServices.getRoomById(RoomId);

        this.tips = await TipsServices.getTipsByRoom(RoomId);
        // console.log(this.$route);
        console.log(this.tips);

        axios.get(base_url + "/wp/v2/difficulty?tips="+this.tips.id).then((response) => {
                this.difficulty = response.data[0];
                //console.log(response.data);
                
            });
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

#tipscardcomponent {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-column-gap: 10px;
    grid-row-gap: 5px;

}





</style>