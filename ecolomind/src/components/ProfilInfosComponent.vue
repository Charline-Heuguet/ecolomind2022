<template>
    <h2>Mon profil</h2>
    <div class="profil-header">
        

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
            return storage.get('userData').user_nicename;
        },

        getCurrentUserEmail(){
            return storage.get('userData').user_email;
        },

    }
}
</script>

<style lang="scss">
.profil-header{

    margin-left: 10px;
    h2{
        margin: 0; 
    }
    h5{
        margin: 5px 0 5px 0; 
    }
    p{
        margin: 0; 
    }
}
</style>