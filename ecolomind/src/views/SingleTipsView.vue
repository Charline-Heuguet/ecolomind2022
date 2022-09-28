<!-- Page d'une astuce unique avec espace commentaires (édition et liste) -->

<template>

    <div id="SingleView">
        
        <h3>TITRE DE L'ASTUCE</h3>
        <img src="" alt="">        

        <p>NOM DE L'AUTEUR</p>
        <article> CONTENU DE L'ARTICLE</article>
        <img src="" alt="">

        <h4> Espace commentaires</h4>

                     
            <form>
                <label for="comment"> Ajoutez votre commentaire</label>
                <input type="text" name="comment" id="comment">
                <button type="submit">Envoyez</button>
            </form>


        <CommentListComponent />
    </div>
</template>

