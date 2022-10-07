<template>

    <footer>

            <router-link :to="{name: 'qui-sommes-nous'}">
                Qui sommes-nous?
            </router-link>

            <router-link :to="{name: 'contact'}">
                Contactez-nous
            </router-link>

       <!-- <img src="@/assets/logo.png" alt="logo ecolomind">         -->

            <router-link :to="{name: 'mentions'}"> 
                Mentions légales
            </router-link>

            <router-link :to="{name: 'politique-de-confidentialite'}">
                Politique de confidentialité
            </router-link>
    

    </footer>

</template>

<script>
export default {
    name: 'FooterComponent',
    
}
</script>

<style lang="scss" scoped>

footer{
    padding: 80px;
    background: linear-gradient(0deg, rgba(130, 150, 47, 0.5) -38.26%, rgba(149, 197, 22, 0.75) 49.94%);
    display: flex;
    justify-content: space-between;
    border-top: 25px solid #684D41;
}
a {
    color: white;
    &.router-link-exact-active {
      color: #42b983;
    }
}


</style>