<!-- Header et navbar !-->
<!-- <template>  
        <nav class="navb">
            <router-link to="/" class="test">Accueil</router-link> -->

<!-- On souhaite avoir une seule view pour les différentes pièces, donc on doit rendre la navBar dynamique, ce qui facilitera egalement si on veut 
rajouter une pièce plus tard. 
Dans le Json, Rooms est un tableau, on le déclare donc en tant que tel dans les data; la key est obligatoire (value-key). On boucle sur le tableau Rooms pour chaque Room.
L'attribut key permet d'identifier et de rendre unique chaque component   -->

            <!-- <router-link   
            v-for="room in rooms"
            :key="room.id" 
            :to="{
                
                    name: 'single-room', //nom de la route donnée dans Routers pour aller sur la view SingleRoomView
                    params: {
                        id: room.id, 
                    }
            }" class="test">{{room.name}}</router-link>

            <router-link to="/ajout-article" v-if="this.$store.state.userIsConnect" class="test">Proposer une astuce</router-link>

        </nav>  
       
       <button class="toggle-menu" v-on:click.prevent="ClickBurger()"> Ouvrir le menu </button>
       
</template> -->


<!-- <script> 

//On importe le fichier TipsServices dans lequel se trouve les appels à API dont on aura besoin ici.

import TipsServices from '@/services/TipsServices.js';


export default ({
    name: 'NavComponent',


    // Data c'est une fonction qui permet de créer des propriétés locales au composant. 
    data() {
        return{
            rooms:[], //(dans le wp-json: rooms est un tableau)
        }
    },

    // On créé le hook Created qui sera déclenché quand le composant sera créé (pas encore affiché mais existant)
    async created(){

        this.rooms = await TipsServices.getAllRooms();
    },

    methods : {
        async ClickBurger(){
            let navBar = document.getElementsByClassName("navb")[0];

            navBar.classList.toggle("active");

        }
    }
    
})
</script>-->

<!-- <style lang="scss" > 
.toggle-menu{
    position: relative;
    background: url('../assets/menuburger.png');
    background-size: contain;
    text-indent: -50000px; // on cache le texte du bouton (ne pas enlever le texte pour des questions de sémantique)
    width: 40px;
    height: 40px;
    border: none;
    float:right;
    margin-right: 20px;
    margin-top: -145px;
    z-index: 200;
}

.dark-theme{
    .toggle-menu{
        background: url('../assets/menuburger-white.png');
        background-size: contain; // pour que la taille du BG soit contenu dans son conteneur
    }
}
//menu burger
.navb{
    font-size: 1.2em;
    box-shadow: 0 0 30px rgba(0,0,0,0.6);
    border-radius: 15px 0 0 15px;
    top: 75px ;
    z-index: 190;
    position: fixed;
    right: -245px; //par défaut, on cache la navbar en dehors du viewport (la valeur de la width en nég)
    width: 215px; // on le fait réapparaitre avec la mm valeur en positif
    background-image: linear-gradient(to right top, #b5cdf0, #9fbce4, #88abd8, #719acc, #598ac0);
    transition: right 0.6s;
    &.active{
        right: 0;
    }

    a{
        display: block;
        padding: 15px;
    }
}

@media screen and (min-width: 815px){
    .toggle-menu{
        display: none;
    }

    .navb{
        position: relative;
        top: auto;
        right: auto;
        width: auto;
        background: none;
        display: flex;
        justify-content: space-around;
        border: solid 0px;
        border-radius: 30px;
        box-shadow: 0px 5px 5px 5px rgba(62,66,66,0.22);
        padding: 20px 0;
        margin: 20px 0;
        a{
            padding: 0;
        }
    }
    .dark-theme{
             
        nav{
        background: linear-gradient(270.35deg, #253651 7.88%, rgba(54, 77, 113, 0.5) 100.72%);
        border-radius: 100px;
        z-index: 10;
          a{
            color: #b9b9b9;
            &.router-link-exact-active {
            color: #42b983;
          }
        }
      }
    }
}

</style>-->


