<!-- Page de profil -->


<template>

    <div>
        <!-- 
            Si tu es en mode 'profil' (qui est le mode par défaut)
            Alors tu verras le composant ProfilInfosComponent et le bouton "Modifier mon profil"
        -->
        <ProfilInfosComponent v-if="this.mode == 'profil'"/>
  
        <!-- 
            Si tu cliques sur "Modifier mon profil", 
            Alors l'écouteur d'événement au click déclenchera la fonction switchToEditProfil qui passera le mode de 'profil' à 'editProfil'
        -->
        <button v-if="this.mode == 'profil'" @click="switchToEditProfil">Modifier mon profil</button>

        <!-- 
            Si tu es en mode 'editProfil'
            Alors tu verras le composant ProfilFormComponent et le bouton "Annuler"
        -->
        <ProfilFormComponent v-if="this.mode == 'editProfil'"/>

        <!-- 
            Si tu cliques sur "Annuler", 
            Alors l'écouteur d'événement au click déclenchera la fonction switchToProfil qui passera le mode de 'editProfil' à 'profil'
        -->
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
