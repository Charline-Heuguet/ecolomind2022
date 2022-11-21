<!-- Page d'une pièce-->
<template>
<div>

    <h1>{{singleRoom.name}}</h1>
    <div class="container-article">
        <div id="tipscardcomponent">

            <TipsCardComponent 
            v-for="astuce in tips"
            :key="astuce.id"
            :dbid="astuce.id"
            :title="astuce.title.rendered"
            :excerpt="astuce.excerpt.rendered.substr(0, 200) + ' [...]'"
            :difficultyId="astuce.difficulty[0]" 
            />

        </div>
    </div>   
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
            astuce:"",
        }
    },

        
    async created()
    {     
        // const base_url= "http://ecolomind.local/wp-json";
        
   
        let RoomId = this.$route.params.id;

        this.singleRoom = await TipsServices.getRoomById(RoomId);

        this.tips = await TipsServices.getTipsByRoom(RoomId);
        
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



<style lang="scss" scoped>

h1 {
    margin-top: 50px;
}
.container-article{
    margin-bottom: 15em;
}

    #tipscardcomponent {
        display: flex;
        flex-wrap: wrap;   
        justify-content: flex-start;

        article{                   
            margin: 5px 10px 5px 10px;
            min-width: 80%;
        }
    }
@media screen and (min-width: 905px){
    #tipscardcomponent{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
}
@media screen and (min-width: 1500px){
    #tipscardcomponent{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }
}
@media screen and (min-width: 1700px){
    #tipscardcomponent{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }
}
</style>