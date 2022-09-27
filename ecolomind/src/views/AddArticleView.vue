<!-- Page ajout d'astuce  -->

<template>

    <div id="add-article">
        
        <h3> Ajouter une astuce </h3>

        <form>

            <select name="rooms" id="room-select">
                <option value="" style="display: none">Choisissez la pièce concernée </option>
                <option value="">Chambre</option>
                <option value="">Cuisine</option>
                <option value="">Salle de bain</option>
                <option value="">Salon</option>
                <option value="">Jardin</option>
            </select>

            <div>
                <select name="difficulty" id="difficulty-select">
                    <option value="" style="display: none">Quel est le niveau de difficulté? </option>
                    <option value="">Facile</option>
                    <option value="">Moyen</option>
                    <option value="">Difficile</option>
                </select>                
            </div>

            <div>
                <label for="title"></label>
                <input type="text" id="title" name="title" placeholder="Titre de votre astuce">
            </div>


            <div>
                <label for="ingredients"></label>
                <input type="text" id="ingredients" name="ingredients" placeholder="Les ingrédients nécessaires">
            </div>

            <div>
                <label for="content"></label>
                <input name="content" id="content" placeholder="Ecrivez les quantités des ingredients nécessaires à votre astuce.Rédigez votre recette en la détaillant">
            </div>

            <div>
                <label for="photo">Postez la photo de votre produit</label>
                <input type="file" id="photo" name="photo" accept="image/png, image/jpeg">
            </div>


            <button type="submit">Envoyez votre tips</button>


        </form>

    </div>

</template>

<script>

export default {
    name: "AddArticleView",
}
</script>
