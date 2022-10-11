<template>
    <div>
        <span>Ustensiles :</span>
            <ul>
                <li 
                    v-for="tool of this.tools"
                    :key="tool.id"
                    v-html="tool.name"
                    >  
                </li>
            </ul>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'ToolsTipsComponent',

    data(){
        return {
            tools : false,

        }
    },
     props: {
        astuce: Object,
    },

    created(){

        const base_url= "http://ecolomind.local/wp-json";


         axios.get(base_url + "/wp/v2/tools?post="+this.astuce.id ).then((response) => {
                this.tools = response.data;

        });

    }
}
</script>