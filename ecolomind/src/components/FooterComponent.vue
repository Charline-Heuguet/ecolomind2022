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

<style lang="scss">

footer{
    padding: 80px;
    background: linear-gradient(0deg, rgba(130, 150, 47, 0.5) -38.26%, rgba(149, 197, 22, 0.75) 49.94%);
    display: flex;
    justify-content: space-between;
    border-top: 25px solid #684D41;
    margin-top: 15vh;
}
a {
    text-decoration: none;
    font-weight: bold;
    &.router-link-exact-active {
      color: #42b983;
    }
}
.dark-theme{
    footer{
        background: linear-gradient(11.1deg, rgba(52, 90, 52, 0.98) -23.79%, rgba(62, 125, 40, 0.75) 104.55%);
            a{
                color: #b9b9b9; 
                 &.router-link-exact-active {
                color: #42b983;
                }
            }
    }

}


</style>
