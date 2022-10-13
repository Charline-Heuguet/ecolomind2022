<!-- Page de profil -->


<template>

    <div>
        <!-- 
            Si tu es en mode 'profil' (qui est le mode par défaut)
            Alors tu verras le composant ProfilInfosComponent, le bouton "Modifier mon profil", mes astuces et mes astuces préférées
        -->
        <div v-if="this.mode == 'profil'">

            <ProfilInfosComponent />
    
            <!-- 
                Si tu cliques sur "Modifier mon profil", 
                Alors l'écouteur d'événement au click déclenchera la fonction switchToEditProfil qui passera le mode de 'profil' à 'editProfil'
            -->
            <button @click="switchToEditProfil">Modifier mon profil</button>
            <button @click="switchToDeleteProfil">Supprimer mon profil</button>


            <div>
                <h3>Mes astuces préférées</h3>

                <TipsLikedByUserComponent 
                v-for="astuce in likedTips"
                :key="astuce.id"
                :dbid="astuce.id"
                :title="astuce.title.rendered"
                :excerpt="astuce.excerpt.rendered"
                />
            </div>

            <div>
                <h3>Mes astuces</h3>

                <TipsCreatedByUserComponent 
                v-for="astuce in createdTips"
                :key="astuce.id"
                :dbid="astuce.id"
                :title="astuce.title.rendered"
                :excerpt="astuce.excerpt.rendered"
                />
                <div v-if="createdTips.length < 1">
                    Vous n'avez pas encore <router-link to="ajout-article">proposé d'astuce</router-link>  !
                    
                </div>
            </div>
        </div>


        <!-- 
            Si tu es en mode 'editProfil'
            Alors tu verras le composant ProfilFormComponent et le bouton "Annuler"
        -->
        <div v-if="this.mode == 'editProfil'">
            
            <ProfilFormComponent />

            <!-- 
                Si tu cliques sur "Annuler", 
                Alors l'écouteur d'événement au click déclenchera la fonction switchToProfil qui passera le mode de 'editProfil' à 'profil'
            -->
            <button @click="switchToProfil">Annuler</button>
        </div>

        <div v-if="this.mode == 'deleteProfil'">
            
            <DeleteProfilComponent />

            <!-- 
                Si tu cliques sur "Annuler", 
                Alors l'écouteur d'événement au click déclenchera la fonction switchToProfil qui passera le mode de 'editProfil' à 'profil'
            -->
            <button @click="switchToProfil">Annuler</button>
        </div>
        
    </div>
    
</template>


<script>
import storage from '@/utils/storage.js';
import TipsServices from '@/services/TipsServices.js';
import ProfilInfosComponent from '@/components/ProfilInfosComponent.vue';
import ProfilFormComponent from '@/components/ProfilFormComponent.vue';
import TipsCreatedByUserComponent from '../components/TipsCreatedByUserComponent.vue';
import TipsLikedByUserComponent from '../components/TipsLikedByUserComponent.vue';
import DeleteProfilComponent from '@/components/DeleteProfilComponent.vue';
export default {
    name: "ProfilView",

    components: {
        ProfilFormComponent,
        ProfilInfosComponent,
        DeleteProfilComponent,
        TipsCreatedByUserComponent,
        TipsLikedByUserComponent,
    },

    data(){
        return{
            mode: 'profil',
            createdTips: [],
            likedTips: [],
        }
    },

    async created(){

        const currentUserID = storage.get('userData').userID;

        this.createdTips = await TipsServices.TipsCreatedByCurrentUser(currentUserID);

        console.log(this.createdTips);
    },

    methods: {
        switchToEditProfil(){
            this.mode = 'editProfil';
        },
        switchToProfil(){
            this.mode = 'profil';
        },
        switchToDeleteProfil(){
            this.mode = 'deleteProfil';
        }
    }

}

</script>
