 import axios from "axios";


const CreateUser = {

    base_url :  "http://ecolomind.local/wp-json",

    async createUser (username, email, password){
        
                
        
        const response = await axios.post(this.base_url + "/wp/v2/ecolomind/subscribe", 
        {
           username: username,
           email: email,
           roles: ["users"],
           password: password,

        }, ).catch(function(){
            // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
            return {data: null}
        }) // catch va nous permettre de définir un comportement spécifique en cas d'erreur dans la promise (fonction js)

        console.log(response.data);

        return response.data;

        
    }

}

export default CreateUser; 
