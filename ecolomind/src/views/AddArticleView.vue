<!-- Page ajout d'astuce  -->

<template>

    <div id="add-article">
        
        <h3> Ajouter une astuce </h3>

        <form>

            <select name="rooms" id="room-select" v-model="selected" >
                <option v-for="option in options"  :key="option.value">
                    
                    </option>
            </select>

          <!-- <div>
                <select name="difficulty" id="difficulty-select" v-model="formData.difficulty">
                    <option value="" style="display: none">Quel est le niveau de difficulté? </option>
                    <option value="">Facile</option>
                    <option value="">Moyen</option>
                    <option value="">Difficile</option>
                </select>                
            </div>  -->

            <div>
                <label for="title"></label>
                <input type="text" id="title" name="title" placeholder="Titre de votre astuce" v-model="formData.title">
            </div>


            <div>
                <label for="ingredients"></label>
                <input type="text" id="ingredients" name="ingredients" placeholder="Les ingrédients nécessaires" v-model="formData.ingredients">
            </div>

            <div>
                <label for="content"></label>
                <input name="content" id="content" placeholder="Ecrivez les quantités des ingredients nécessaires à votre astuce.Rédigez votre recette en la détaillant" v-model="formData.content">
            </div>

            <div>
                <label for="photo">Postez la photo de votre produit</label>
                <input type="file" id="photo" name="photo" accept="image/png, image/jpeg" v-change="formData.photo">
            </div>


            <button type="submit">Envoyez votre tips</button>


        </form>

    </div>

</template>

<script>



export default {

    name: "AddArticleView",


    data(){
        return {
            formData: {
                rooms: '',
                difficulty: '',
                title: '',
                ingredients: '',
                photo:"",
               
            }, 
           
            
        }
        
    },
    methods:
    
    
    {
             
         async createTips(){
    
           /* console.log(JSON.parse(JSON.stringify(this.formData)));
             console.log('fin from data');
            axios.post('http://ecolomind.local/wp-json/wp/v2/ecolomind/tips', JSON.parse(JSON.stringify(this.formData)),this.$router.push({name : "connexion"})) //don't forget LE PIÈGE
             .then(response => console.log(response)) 
            .catch(function(){ 
               
            // on veut éviter d'interrompre l'exécution JS ce que pourrait faire une erreur 403 dans axios, on va donc pour contrer ça renvoyer un objet null
            return {data: null}
        })*/
        } 
        
    }
}
</script>
