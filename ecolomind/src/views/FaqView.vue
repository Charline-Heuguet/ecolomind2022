<template>

<div>

   <section class="faq-section">
    <input type="checkbox" id="q1">
    <label for="q1">Comment je peux récupérer mon mot de passe ?</label>
    <p>... Le début de la réponse ...</p>
    <p>... Suite de la réponse et paragraphes optionnels ...</p>
   </section>

   <section class="faq-section">   
    <input type="checkbox" id="q2">
    <label for="q2">Comment ajouter une astuce ?</label>
    <p>... Le début de la réponse ...</p>
    <p>... Suite de la réponse et paragraphes optionnels ...</p>
   </section>

   <section class="faq-section">
    <input type="checkbox" id="q3">
    <label for="q3">Comment créer un compte ?</label>
    <p>... Le début de la réponse ...</p>
    <p>... Suite de la réponse et paragraphes optionnels ...</p>
   </section>

   <section class="faq-section">
    <input type="checkbox" id="q4">
    <label for="q4">Quel est le but du projet ?</label>
    <p>... Le début de la réponse ...</p>
    <p>... Suite de la réponse et paragraphes optionnels ...</p>
   </section>

    <section class="faq-section">
    <input type="checkbox" id="q5">
    <label for="q5">Comment marche une jointure SQL ?</label>
    <p>... Le début de la réponse ...</p>
    <p>... Suite de la réponse et paragraphes optionnels ...</p>
    </section>
  
</div>

</template>

<style lang="scss" scoped>

/* Espacement entre les questions */
.faq-section{
        margin: 40px 0;
}

/* Masquer les checkbox et les paragraphes */
.faq-section input,
.faq-section p{
        display: none;
}

/* Montrer uniquement les débuts de réponses */
.faq-section label+p{
        display: block;
        color: #999;
        font-size: .85em;
        transition: all .15s ease-out;
        /* Couper le texte */
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
}

/* Si le checkbox est coché, montrer tous les paragraphes */
.faq-section input[type=checkbox]:checked~p{
        display: block;
        color: #444;
        font-size: 1em;
        /* Restaurer le texte entier */
        text-overflow: clip;
        white-space: normal;
        overflow: visible;
}

/* Style des label */
.faq-section label{
        font-size: 1.2em;
        cursor: pointer;
        background: #eee;
        display: block;
        position: relative;
        padding: 7px 10px;
        font-weight: bold;
        border: 1px solid #ddd;
        border-left: 3px solid #888;
        text-shadow: 0 1px 0 rgba(255,255,255,.5);
        transition: all .15s ease-out;
}

/* Éviter de sélectionner le texte en cliquant plusieurs fois */
.faq-section label::selection{
        background: none;
}

.faq-section label:hover{
        background: #f5f5f5;
}

/* Style du label si le checkbox est coché */
.faq-section input[type=checkbox]:checked~label{
        border-color: #ff7f50;
        background: #f5deb4;
        background-image: linear-gradient(to bottom, #fff, #f5deb4);
        box-shadow: 0 0 1px rgba(0,0,0,.4);
}

/* Flèche du label par défaut */
.faq-section label::before{
        content: '';
        position: absolute;
        right: 4px;
        top: 50%;
        margin-top: -6px;
        border: 6px solid transparent;
        border-left-color: inherit;
}

/* Flèche du label sélectionné */
.faq-section input[type=checkbox]:checked~label::before{
        border: 6px solid transparent;
        border-top-color: inherit;
        margin-top: -3px;
        right: 10px;
}

</style>