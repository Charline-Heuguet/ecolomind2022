<!-- Page de profil -->


<template>

    <div class="profil-view">

        <!--Si tu es en mode 'profil' (qui est le mode par défaut) alors tu verras le composant ProfilInfosComponent, le bouton "Modifier mon profil", "mes astuces" et "mes astuces préférées"-->
        <div v-if="this.mode == 'profil'" class="profil-modif">

            <div class="profil-data">
                <ProfilInfosComponent />
            </div>
    
            <!--Au clic sur "Modifier mon profil", l'écouteur d'événement au click déclenchera la fonction switchToEditProfil qui passera le mode de 'profil' à 'editProfil'-->
            

            <div class="profil-buttons">
                <button @click="switchToEditProfil()">Modifier mon profil</button>
                <button class="warning" title="suppression du profil" @click="switchToDeleteProfil()">Supprimer mon profil</button>
            </div>
        
        </div>


            <div class="profil-tips">

                <div class="fav-astuce">
                    <div>
                        <h3>Mes astuces préférées</h3>
                        <!-- <p>Coming soon ....</p> -->
                        <TipsLikedByUserComponent 
                        v-for="astuce in this.likedTips"
                        :key="astuce.ID"
                        :dbid="astuce.ID"
                        :title="astuce.post_title"/>
                        <!-- :excerpt="astuce.post_content.substr(0, 200) + ' [...]'" -->
                        
    
                        
                    </div>
                    <div v-if="likedTips.length < 1" id="no-liked-article">
                        Vous n'avez pas d'astuces mises en favoris !
                    </div>
                </div>
    
                
    
                <div class="my-astuce">
                    <h3>Mes astuces</h3>
                    <div class="list-astuce">
                    <TipsCreatedByUserComponent 
                    v-for="astuce in createdTips"
                    :key="astuce.id"
                    :dbid="astuce.id"
                    :title="astuce.title.rendered"/>
                    <!-- :excerpt="astuce.excerpt.rendered" -->
                    
                    </div>
    
                    <div v-if="createdTips.length < 1" class="no-article">
                        Vous n'avez pas encore <a href=""><router-link to="ajout-article">proposé d'astuce</router-link></a>  !
                    </div>
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
            <button class="cancel" @click="switchToProfil()">Annuler</button>
        </div>

        <div v-if="this.mode == 'deleteProfil'" class="profil-modif">
            
            <DeleteProfilComponent />

            <!-- 
                Si tu cliques sur "Annuler", 
                Alors l'écouteur d'événement au click déclenchera la fonction switchToProfil qui passera le mode de 'editProfil' à 'profil'
            -->
            <button class="cancel" @click="switchToProfil()">Annuler</button>
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
            likedTips: false,
        }
    },

    async created(){

        const currentUserID = storage.get('userData').userID;

        this.createdTips = await TipsServices.TipsCreatedByCurrentUser(currentUserID);

       

        this.likedTips = await TipsServices.TipsFavoriteByCurrentUser(currentUserID);

        console.log(this.likedTips);

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
        },
     
    }

}

</script>

<style lang="scss">

.cancel{
    background-color: gray;
    color: rgba(211, 224, 241, 0.9843137255);
    border: 1px solid #404041;
    border-radius: 20px;
    font-weight: 600;
    width: 80%;
    display: block;
    margin: 0 auto;
    height: 40px;
}

.profil-modif, .fav-astuce, .my-astuce{
    background-color:#c7d3e3cb;
    border: 2px solid  #a7b2c0;
    border-radius: 20px;
    padding: 20px;
    margin-bottom: 20px;
    
    p{
        margin-bottom: 30px;
        font-size: 16px;
    }

    .profil-modif{
        button{
            background-color: #acd14f;
            color: #404041;
    }
    }
    

    .profil-buttons{
        display: flex;
        flex-direction: column;
        align-items: center;

        .warning{
            background-color: rgb(139, 27, 8);
            color:#d3e0f1fb ;
            text-transform: uppercase;
        }
        
        button{
            background-color: #acd14f;
            color: #404041;
            border: 1px solid #404041;
            border-radius: 20px;
            font-weight: 600;
            width: 80%;
            height: 40px;
            margin-bottom: 20px;
            cursor: pointer;
        }
    }
    h2, h3{
        text-align: center;
        text-transform: uppercase;
    }

    h2{
        margin-bottom: 40px;
    }

    h3{
        margin-bottom: 30px;
    }

    h4{
        margin: 0;
    }
    h5, label{    
        font-size: 18px;
    }
}



.fav-astuce, .my-astuce{
    a{
        display: block;
        padding-top: 15px;
        padding-bottom: 15px;
        border-bottom:1px solid #a9adb4;
    }

    article:last-child a{
        border-bottom: none;
    }
}

@media screen  and (min-width: 436px){

    .edit{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .checkin, .cancel{
        max-width: 60%;
    }

}

@media screen  and (min-width: 630px) {

    .profil-header{
        display: flex;
        justify-content: space-between;
        padding: 10px;
    }

    .profil-modif{
        button{
            font-size: 15px;                
        }
    }

    .edit{
        flex-direction: row;
        justify-content: space-around;
    }
    
}

@media screen  and (min-width: 730px) {

    .profil-header{
        justify-content: space-around;
    }
    
    .profil-modif{
        .profil-buttons{
            flex-direction: row;
            justify-content: space-around;

            .warning{
                margin: 0 0 20px;
            }
            
            button{
                width: 35%;
                font-size: 15px;                
            }
        }
    }

    .edit{
        input{
            width: 250px
        }
    }
}
@media screen and (min-width: 840px){
    .form-edit{
        display: flex;

        .edit{
            flex-direction: column;
            width: 50%;
        }
    }

    .profil-tips{
        display: flex;
        justify-content: space-around;

        .fav-astuce, .my-astuce{
            width:50%;
            margin: 0 5px 20px;
        }
    }
}

@media screen and (min-width: 900px){
    .profil-modif{
        max-width: 70%;
        margin-left: auto;
        margin-right: auto;
    }    
}

.dark-theme{
    .profil-view{
        .profil-modif{
            color: #6c6f74;
            background-color: #253651;
            border: 2px solid  #b7c2cf;
            
            h2{
                color: #ccd0d6;
            }
            
            h5{
                color: #ccd0d6;
            }
            
            p{
                color: #6c6f74;
            }
        }
        .fav-astuce{
            background-color: #253651;
            border: 2px solid  #b7c2cf;
            h3{
                color: #e8e8ee;
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

</style>