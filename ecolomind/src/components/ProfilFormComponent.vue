<template>
    <div>

        <h3>Modifier mon profil</h3>

        <form @submit.prevent="updateMyInfos">
            <div>
                <label for="pseudo"></label>
                <input type="text" placeholder="Gerceval" id="pseudo" name="pseudo" v-model="formData.pseudo"/>
            </div>

            <div>
                <label for="email"></label>
                <input type="text"  placeholder="gerceval@legallois.com" id="email" name="email" v-model="formData.email"/>
            </div>

            <div>
                <label for="password"></label>
                <input type="password" placeholder="******" id="password" name="password" v-model="formData.password"/>
            </div>

            <button>Enregistrer les modifications</button>
        </form>
    </div>

</template>

<script>

import axios from 'axios';

export default {
    name: 'ProfilFormComponent',

    data(){
        return{

            usersInfos: {},

            formData: {
                pseudo: "",
                email: "",
                password: "",
            },
        }
    },

    // async created() {
    //     this.usersInfos = await this.getUsersInfos();
    //     console.log(this.usersInfos);
    //     console.log("là");
    // },

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
