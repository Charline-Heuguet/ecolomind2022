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
     props: {
        astuce: Object,
    },

    created(){

        const base_url= "https://back.ecolomind.fr/wp-json";


         axios.get(base_url + "/wp/v2/target?post="+this.astuce.id ).then((response) => {
                this.target = response.data[0];

        });
  
    }
}
</script>