<!-- Header et navbar !-->
<template>
        <nav>
            <router-link to="/">Accueil</router-link>
            <router-link to="/cuisine">Cuisine</router-link>
            <router-link to="/chambre">Chambre</router-link>
            <router-link to="/salon">Salon</router-link>
            <router-link to="/ajout-article">Proposer une astuce</router-link>

        </nav>
</template>


<script>
export default {
    name: 'NavComponent',
}
</script>

