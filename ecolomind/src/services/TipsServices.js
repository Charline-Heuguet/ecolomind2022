//Appel API
import storage from '@/utils/storage';
import axios from "axios"; //Import d'Axios qui est une librairie pour nous permettre de faire des requetes HTTP vers l'API de WP
 

// Création d'un module qui listera les variables / les fonctions liées aux requêtes d'API pour nos tips

const TipsServices =

{

    base_url : "http://ecolomind.local/wp-json",

    // Using Async to parallel a method with other actions.

    // TODO Quid de l'utilisation du _embed ?

    // LES ASTUCES

    //Récupération de toutes les astuces

    async getAllTips()
    {
        /*
        1-On appelle l'url wp contenu en paramètre de la fonction get de axios. 
        2-On demande à axios de faire la même chose que ce que fait notre navigateur, soit de récupérer (GET) les données en provenance de WP.
        3-AWAIT permet d'indiquer à Vue.JS qu'on ATTEND le résultat d'une fonction (execution qui pourrait être confiée à un serveur qui héberge notre WP)
        4-Quand l'instruction sera terminée, Axios dira a JS qu'il a terminé et stockera le résultat dans une constante response.
        */
        const response = await axios.get(this.base_url + "/wp/v2/tips");
        return response.data
    },

    //Récupération de toutes les tips par id.
    async getTipsbyId(id)
    {
        const response = await axios.get(this.base_url + "/wp/v2/tips/"+id);
        return response.data
    },

    //Récupération des tips par pièces.

    async getTipsByRoom(id)
    {
        const response = await axios.get(this.base_url + "/wp/v2/tips/?rooms=" + id);
        return response.data
    },


    // LES DIFFICULTES
    //Récupération de toutes les difficultés

    async getAllDifficulties()
    {
        const response = await axios.get(this.base_url + "/wp/v2/difficulty");
        return response.data   
    },

    //Récupération de la difficulté par id
    async getDifficultyById(id)
    {
        const response = await axios.get(this.base_url + "/wp/v2/difficulty/"+id);
        return response.data   
    },



    //Récupération de toutes les pièces

    async getAllRooms()
    {
        const response = await axios.get(this.base_url + "/wp/v2/rooms");
        return response.data

    },

    // Récupération de la pièce par id

    async getRoomById(id)
    {
        const response = await axios.get(this.base_url + "/wp/v2/rooms/"+id);
        return response.data
    },

    // Récupération du nom de la pièce (grâce à son id)

    async getRoomNameById(id)
    {
        const response = await axios.get(this.base_url + "/wp/v2/rooms/"+id);
        return response.name
    }, 


    //Récupération de toutes les cibles

    async getAllTarget()
    {
        const response = await axios.get(this.base_url + "/wp/v2/target");
        return response.data

    },

    // Récupération de la cible par son id
    async getTargetById(id)
    {
        const response = await axios.get(this.base_url + "/wp/v2/target/"+id);
        return response.data

    },

    // Récupération de l'image miniature

    async getThumbnail(id)
    {

        const response = await axios.get(this.base_url + "/wp/v2/media/" + id );

        return response.data
    },

    // Récupération des ingrédients en fonction des tips_id

    async getIngredientByTipsId(id)
    {
        const response = await axios.get(this.base_url + "/wp/v2/ingredients?tips=" + id);
        return response.data
    },

    // Récupération des ingrédients en fonction des tips_id

    async getRoomByTipsId(id)
    {
        const response = await axios.get(this.base_url + "/wp/v2/rooms?tips=" + id);
        return response.data
    },

    // NDLR : La récupération de tous les ustensiles et de tous les ingrédients: On n'a pas besoin qu'ils s'affichent sur le site (affiché comme liste des ingrédients sur le site)

    //**IMPORTANT**
    // APPEL A API pour les commentaires sur les tips : récupérer (getComment) et ajouter (addComment)

    async getCommentsByTipsId(id)
    {
        const response = await axios.get(this.base_url + "/wp/v2/comments?post=" + id);
        return response.data

    },

    // AddComment va ajouter un commentaire dans l'api wordpress en utilisant le token stocké dans storage

    async addComment(comment, astuce_id){
        
    const response = await axios.post(this.base_url + "/wp/v2/comments", {
        content: comment,
        post: astuce_id
    }, {
        headers: {
            Authorization: "Bearer " + storage.get("userData").token
        }
    });
    return response.data
    },

    // getCurrentUserName(){
    //     return storage.get('userData').user_display_name;
    // },

    async TipsCreatedByCurrentUser(id)
    {
        const response = await axios.get(this.base_url + "/wp/v2/tips?author=" + id);
        return response.data;

    },

    // async TipsFavoriteByCurrentUser(id)
    // {
    //     const response = await axios.get(this.base_url + "/wp/v2/tips?author=" + id + "" );
    // },

}

//I make this module exportable so that I can import it and use it in my components
export default TipsServices;