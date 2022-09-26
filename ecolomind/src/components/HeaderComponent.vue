<template>
    <header>
        <div>
            <img src="" alt="">
            <h1>Ecolo Mind</h1>            
        </div>
        <div v-if="this.$store.state.userIsConnect">
            <span>{{ getCurrentUserName() }}</span>

        </div>

    </header>
</template>

<script>
import storage from '@/utils/storage';

export default {
    name: 'HeaderComponent',
    methods:{
        getCurrentUserName(){
            return storage.get('userData').user_display_name;
        }
    }
}
</script>