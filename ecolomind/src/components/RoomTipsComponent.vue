<template>
    <div>
        <span>Une astuce à utilisé dans :</span>
            {{this.room.name}}
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'RoomTipsComponent',

    data(){
        return {
            room : "",

        }
    },

    created(){

            const base_url= "http://ecolomind.local/wp-json";

            axios.get(base_url + "/wp/v2/tips/"+this.$route.params.id+"?_embed").then((response) => {
            this.astuce = response.data;

            axios.get(base_url + "/wp/v2/rooms?post="+this.astuce.id ).then((response) => {
                this.room = response.data[0];
                // console.log('Ici la room');
                // console.log(this.room);
            });
            });
    }
}
</script>