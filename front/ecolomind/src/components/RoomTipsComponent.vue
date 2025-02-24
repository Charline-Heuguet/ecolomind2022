<template>
    <div>
        <span>Une astuce à utiliser dans :</span>
            {{this.room.name}}
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'RoomTipsComponent',

    props: {
        astuce: Object,
    },

    data(){
        return {
            room : "",

        }
    },

    created(){

            const base_url= "https://back.ecolomind.fr/wp-json";


            axios.get(base_url + "/wp/v2/rooms?post="+this.astuce.id ).then((response) => {
                this.room = response.data[0];
                
            });
            
    }
}
</script>