<!-- Page de profil -->


<template>

    <div>
        <ProfilInfosComponent v-if="this.mode == 'profil'"/>
  
          <button v-if="this.mode == 'profil'" @click="switchToEditProfil">Modifier mon profil</button>

        <ProfilFormComponent v-if="this.mode == 'editProfil'"/>

        <button v-if="this.mode == 'editProfil'" @click="switchToProfil">Annuler</button>
    </div>
    

    
</template>


<script>
import ProfilInfosComponent from '@/components/ProfilInfosComponent.vue';
import ProfilFormComponent from '@/components/ProfilFormComponent.vue';
export default {
    name: "ProfilView",

    components: {
        ProfilFormComponent,
        ProfilInfosComponent,
    },

    data(){
        return{
            mode: 'profil',
        }
    },
    methods: {
        switchToEditProfil(){
            this.mode = 'editProfil';
        },
        switchToProfil(){
            this.mode = 'profil';
        }
    }

}

</script>
