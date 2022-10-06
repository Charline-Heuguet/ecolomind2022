<template>
    <div>
        <h2>Mon profil</h2>

        <h5>Mon pseudo</h5>
        <p>{{ getCurrentUserName() }}</p>

        <h5>Mon adresse email</h5>
        <p>{{ getCurrentUserEmail() }}</p>


    </div>
</template>

<script>
import storage from '@/utils/storage';

export default{
    name: 'ProfilInfosComponent',

    methods:{
        getCurrentUserName(){
            return storage.get('userData').user_display_name;
        },

        getCurrentUserEmail(){
            return storage.get('userData').user_email;
        },

    }
}
</script>
