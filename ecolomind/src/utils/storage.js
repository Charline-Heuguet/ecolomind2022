// Gestion des cookies
const storage = {

    //set : qui va permettre d'enregistrer un JSON dans le localStorage. 
    //"stringify" convertit une valeur JavaScript en chaîne JSON

    set(key, json){

        const value = JSON.stringify(json);
        window.localStorage.setItem(key, value);
    },

    //get : Qui va permettre de récupérer un JSON dans le localStorage

    get(key){
        const json = window.localStorage.getItem(key);
        return JSON.parse(json);
    },

    //unset : qui va permettre de supprimer un JSON en LocalStorage
    unset(key){
        window.localStorage.removeItem(key);
    }
}

export default storage;