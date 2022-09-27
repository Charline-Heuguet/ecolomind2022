// Gestion des utilisateur API
import storage from "@/utils/storage";
import axios from "axios";

const UserServices = {

    base_url : "http://ecolomind.local/wp-json", //Change for the greate base URL 

    async login(p_username, p_password){

        const response = await axios.post(this.base_url + "/jwt-auth/v1/token",{

            username: p_username,
            password: p_password
        }).catch(function(){

            return {data : null}
        })

        return response.data;
    },

    async isConnected(){

        const userData = storage.get("userData");

        if( userData != null){
            if(userData.token){
                await axios.post(
                    this.base_url + "/jwt-auth/v1/token/validate",
                    null,
                    {
                        headers : {
                            Authorization : "Bearer " + userData.token
                        }
                    }
                ).catch(function(){
                    return false;
                });

                return true;
            }
        }
        return false;
    },
}

export default UserServices;