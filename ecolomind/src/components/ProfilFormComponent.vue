<template>
    <div>

        <h3>Modifier mon profil</h3>

        <form @submit.prevent="updateMyInfos">
            <div>
                <label for="pseudo"></label>
                <input type="text" :placeholder="this.getCurrentUserName()" id="pseudo" name="pseudo" v-model="formData.pseudo"/>
            </div>

            <div>
                <label for="email"></label>
                <input type="text"  :placeholder="this.getCurrentUserEmail()" id="email" name="email" v-model="formData.email"/>
            </div>

            <!-- <div>
                <label for="password"></label>
                <input type="password" placeholder="******" id="password" name="password" v-model="formData.password"/>
            </div> -->

            <button>Enregistrer les modifications</button>
        </form>
    </div>

</template>

<script>

import axios from 'axios';
import storage from '@/utils/storage';


export default {
    name: 'ProfilFormComponent',

    data(){
        return{

            // pseudoPlaceholder: "",

            usersInfos: {},

            formData: {
                pseudo: "",
                email: "",
                // password: "",
            },
        }
    },

    async created() {
        // this.usersInfos = await this.getUsersInfos();
        console.log(this.getCurrentUserName());
        console.log("là");
    },

    methods:
    {
        async updateMyInfos(){
            console.log(JSON.parse(JSON.stringify(this.formData)));
            axios.patch('http://ecolomind.local/wp-json/wp/v2/ecolomind/profil', JSON.parse(JSON.stringify(this.formData)))
            .then(response => console.log(response))
            .catch(function(){
                return {data: null}
            })
        },

        getCurrentUserName(){
            return storage.get('userData').user_display_name;
        },

        getCurrentUserEmail(){
            return storage.get('userData').user_email;
        },

        // async getUsersInfos(){
        //     this.usersInfos = await axios.get('http://ecolomind.local/wp-json/wp/v2/ecolomind/profil', JSON.parse(JSON.stringify(this.usersInfos)))
        //     .then(response => console.log(response))
        //     .catch(function(){
        //         return {data: null}
        //     })

        // },

        
    },
}

</script>
