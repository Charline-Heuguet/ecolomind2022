<template>
    <div>
        <h3>Mon profil</h3>

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
