<template>
    <div>
        <h2>{{getCurrentUserName()}}, souhaitez-vous vraiment supprimer votre compte ?</h2>

        <button @click="deleteMyInfos">Oui, je supprime mon compte</button>
    </div>
</template>

<script>
import axios from 'axios';
import storage from '@/utils/storage.js'
export default{
    name: 'DeleteProfilComponent',
    data(){
        return{
            userToDelete : storage.get('userData').userID,
        }
    },
    methods:
    {
        async deleteMyInfos(){
            console.log(JSON.parse(JSON.stringify(this.userToDelete)));
            axios.delete('http://ecolomind.local/wp-json/wp/v2/ecolomind/profil', JSON.parse(JSON.stringify(this.userToDelete)))
            .then(response => console.log(response))
            .catch(function(){
                return {data: null}
            })
        },

        getCurrentUserName(){
            return storage.get('userData').user_display_name;
        }
    },
}
</script>
