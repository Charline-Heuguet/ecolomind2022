<template>
    <div>
        <h2>{{getCurrentUserName()}}, souhaitez-vous vraiment supprimer votre compte ?</h2>

        <button class="warning" @click="deleteMyInfos">Oui, je supprime mon compte</button>
    </div>
</template>

<script>
import axios from 'axios';
import storage from '@/utils/storage.js'
export default{
    name: 'DeleteProfilComponent',
    data(){
        return{
            userToDelete : [storage.get('userData').userID],
        }
    },
    methods:
    {
        async deleteMyInfos(){
            console.log(JSON.parse(JSON.stringify(this.userToDelete)));
            axios.post('https://back.ecolomind.fr/wp-json/wp/v2/ecolomind/profildelete', JSON.parse(JSON.stringify(this.userToDelete)),this.$router.push({name : "home"}), this.$store.dispatch('onUserDisconnection'))
            .then(response => console.log(response))
            .catch(function(){
                return {data: null}
            })

            return storage.unset('userData');
        },

        getCurrentUserName(){
            return storage.get('userData').user_display_name;
        }
    },
}
</script>

<style lang="scss">

.warning{
        background-color: rgb(139, 27, 8);
        color:#d3e0f1fb ;
        text-transform: uppercase;
        border-radius: 20px;
        font-weight: 600;
        width: 60%;
        display: block;
        margin: 0 auto 20px;
        height: 40px;
}

</style>
