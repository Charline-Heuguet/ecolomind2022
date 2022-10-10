<template>
    <div>
        <span>Astuce pour :</span>
            {{this.target.name}}
    </div>
</template>

<script>

import axios from 'axios';
export default {
    name: 'TargetTipsComponent',

    data(){
        return {
            target : "",
        }

    },

    created(){

        const base_url= "http://ecolomind.local/wp-json";

        axios.get(base_url + "/wp/v2/tips/"+this.$route.params.id+"?_embed").then((response) => {
            this.astuce = response.data;

         axios.get(base_url + "/wp/v2/target?post="+this.astuce.id ).then((response) => {
                this.target = response.data[0];
                // console.log('Ici la target');
                // console.log(this.target);
            });
        });   
    }
}
</script>