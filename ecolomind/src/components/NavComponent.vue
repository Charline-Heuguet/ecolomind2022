<!-- Header et navbar -->
<template>
        <nav>
            <router-link to="/">Accueil</router-link>
            <router-link to="/cuisine">Cuisine</router-link>
            <router-link to="/chambre">Chambre</router-link>
            <router-link to="/salon">Salon</router-link>
            <router-link to="/salle-de-bain">Salle de bain</router-link>
            <router-link to="/jardin">Jardin</router-link>
            <router-link to="/ajout-article">Proposer une astuce</router-link>
            <router-link to="/profil">Profil</router-link>
            <router-link to="/">Déconnexion</router-link>
            <router-link to="/connexion">Connexion</router-link>
            <router-link to="/inscription">Inscription</router-link>
        </nav>
</template>


<script>
export default {
    name: 'NavComponent',
}
</script>