<!-- Page de profil -->


<template>

    <div class="profil-view">
        <!-- 
            Si tu es en mode 'profil' (qui est le mode par défaut)
            Alors tu verras le composant ProfilInfosComponent, le bouton "Modifier mon profil", mes astuces et mes astuces préférées
        -->
        <div v-if="this.mode == 'profil'" class="profil-modif">

            <ProfilInfosComponent />
    
            <!-- 
                Si tu cliques sur "Modifier mon profil", 
                Alors l'écouteur d'événement au click déclenchera la fonction switchToEditProfil qui passera le mode de 'profil' à 'editProfil'
            -->
            <button @click="switchToEditProfil">Modifier mon profil</button>
            <button @click="switchToDeleteProfil">Supprimer mon profil</button>
        
        </div>

            <div class="fav-astuce">
                <h3>Mes astuces préférées</h3>
                <p>Coming soon ....</p>
                <TipsLikedByUserComponent 
                v-for="astuce in likedTips"
                :key="astuce.id"
                :dbid="astuce.id"
                :title="astuce.title.rendered"
                :excerpt="astuce.excerpt.rendered"
                />
            </div>

            <div class="my-astuce">
                <h3>Mes astuces</h3>
                <div class="list-astuce">
                <TipsCreatedByUserComponent 
                v-for="astuce in createdTips"
                :key="astuce.id"
                :dbid="astuce.id"
                :title="astuce.title.rendered"
                :excerpt="astuce.excerpt.rendered"
                />
                </div>

                <div v-if="createdTips.length < 1">
                    Vous n'avez pas encore <a href=""><router-link to="ajout-article">proposé d'astuce</router-link></a>  !
                    
                </div>
            </div>
        


        <!-- 
            Si tu es en mode 'editProfil'
            Alors tu verras le composant ProfilFormComponent et le bouton "Annuler"
        -->
        <div v-if="this.mode == 'editProfil'" class="profil-modif">
            
            <ProfilFormComponent />

            <!-- 
                Si tu cliques sur "Annuler", 
                Alors l'écouteur d'événement au click déclenchera la fonction switchToProfil qui passera le mode de 'editProfil' à 'profil'
            -->
            <button @click="switchToProfil">Annuler</button>
        </div>

        <div v-if="this.mode == 'deleteProfil'" class="profil-modif">
            
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

<style lang="scss">

.profil-view{
    display: grid;
    grid-template-columns: 2fr;
    grid-template-rows: repeat(3, 1fr);
    grid-column-gap: 10px;
    grid-row-gap: 10px;
    color: #c7d3e3;   
        .profil-header{
            color: #404041;
        }
        .profil-modif{
            grid-area: 1 / 1 / 2 / 2;
            color: #404041;
            border: 2px solid  #a7b2c0;
            background-color: #c7d3e3cb;
            border-radius: 20px;
            padding: 20px;
            margin: 0 3% 0 3%;
            max-height: 20em;
            max-width: 98%;
            
            button{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 20vh;
                height: 32px;
                border: none;
                color: #404041;
                font-weight: bold;
                border-radius: 20px;
                background-color: #acd14f;
                margin: 5px 0 5px 0;
                cursor: pointer;
            }  
            p{
                margin: 3px 0;
            }      
            form{               
                div{
                    display: flex;
                    flex-direction: column;                    
                }
                input{
                    width: 20vh;
                    height: 3vh;
                    padding:0 0 0 5px;
                    margin:5px 0 10px 0;
                    border-radius: 20px;
                    border: 2px solid  #a7b2c0;
                    background-color: #c7d3e3;
                }
               
            }
        }
        .fav-astuce{
            grid-area: 3 / 1 / 4 / 2;    
            border: 2px solid  #a7b2c0;       
            background-color: #c7d3e3cb;
            border-radius: 20px;
            padding: 20px;
            margin: 0 3% 0 3%;
            max-height: 20em;
            max-width: 98%;
            p{
                color: #404041;
            }
        }
        .my-astuce{
            grid-area: 2 / 1 / 3 / 2;
            border: 2px solid  #a7b2c0;
            background-color: #c7d3e3cb;
            color: #6c6f74;
            border-radius: 20px;
            padding: 20px;
            margin: 0 3% 0 3%;
            max-height: 20em;
            max-width: 98%;
            overflow-x: scroll;
            scroll-behavior: smooth;
            article{                
                margin: 5px;
                padding: 5px;
                color: #6c6f74;
                border-radius: 20px;
                background-color: #c7d3e3;
                border: 3px solid  #a7b2c0; 
                overflow: hidden;                          
            }           
        }
    h5{
        font-size: 15px;
    }
    h3{
        color: #404041;
    }
    h2{
        color: #404041;
    }
}

@media screen and (min-width: 700px){   
.profil-view{
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-template-rows: repeat(2, 1fr);
    grid-column-gap: 10px;
    grid-row-gap: 10px;
        .profil-modif{
            grid-area: 1 / 1 / 2 / 2;             
            margin-left: 5%;
        }
        .fav-astuce{
            grid-area: 1 / 2 / 3 / 3;              
            margin-right: 5%;
        }
        .my-astuce{
            grid-area: 2 / 1 / 3 / 2;          
            margin-left: 5%;           
                article{
                    display: flex;
                    flex-direction: column;                
                } 
        }
    }
.dark-theme{
    .profil-view{
        .profil-modif{
            color: #6c6f74;
            background-color: #253651;
            border: 2px solid  #b7c2cf;
            button{
                color: #e8e8ee;
                background-color: #407038;
            }
            h2{
                color: #6c6f74;
            }
            h5{
                color: #6c6f74;
            }
            p{
                color: #6c6f74;
            }
        }
        .fav-astuce{
            background-color: #253651;
            border: 2px solid  #b7c2cf;
            h3{
                color: #6c6f74;
            }
            p{
                color: #6c6f74;
            }
        }
        .my-astuce{
            color: #e8e8ee;
            background-color: #253651;
            border: 2px solid  #b7c2cf;
            article{
                background-color: #273242;
                border: 2px solid  #b7c2cf;
            }
            h3{
                color: #e8e8ee;
            }
            #suite{
                color: #407038;
            }
        }
    }
   
}
}
</style>