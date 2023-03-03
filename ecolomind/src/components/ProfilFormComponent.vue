<template>
    <div class="modify">

        <h2>Modifier mon profil</h2>

        <p>En modifiant votre profil, vous serez automatiquement déconnecté.e !</p>

        <form @submit.prevent="updateMyInfos">
            <div class="form-edit">
                <div class="edit">
                    <label for="pseudo">Modifier mon pseudo</label>
                    <input type="text" :placeholder="this.getCurrentUserName()" id="pseudo" name="pseudo" v-model="formData.pseudo"/>
                </div>
    
                <div class="edit">
                    <label for="email">Modifier mon email</label>
                    <input type="text"  :placeholder="this.getCurrentUserEmail()" id="email" name="email" v-model="formData.email"/>
                </div>
            </div>

            <button class="checkin">Enregistrer les modifications</button>
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
            usersInfos: {},
            formData: {
                pseudo: "",
                email: "",
                authorID: storage.get('userData').userID,
            },
        }
    },

    async created() {
        console.log(this.getCurrentUserName());
    },

    methods:
    {
        async updateMyInfos(){
            console.log(JSON.parse(JSON.stringify(this.formData)));
            axios.post('https://back.ecolomind.fr/wp-json/wp/v2/ecolomind/profiledit', JSON.parse(JSON.stringify(this.formData)),this.$router.push({name : "home"}), this.$store.dispatch('onUserDisconnection'))
            .then(response => console.log(response))
            .catch(function(){
                return {data: null}
            })
            return storage.unset('userData');
        },

        getCurrentUserName(){
            return storage.get('userData').user_display_name;
        },

        getCurrentUserEmail(){
            return storage.get('userData').user_email;
        },        
    },
}

</script>


<style lang="scss">

.modify{
    text-align: center;
}
.edit{
    margin-bottom: 30px;

    input{
        padding: 10px;
        margin-top: 8px;
        width: 200px;
        height: 35px;
        border-radius: 30px;
    }
}
    .checkin{
            background-color: #acd14f;
            color: #404041;
            border: 1px solid #404041;
            border-radius: 20px;
            font-weight: 600;
            width: 80%;
            height: 40px;
            margin-bottom: 20px;
            cursor: pointer;
        }



</style>
