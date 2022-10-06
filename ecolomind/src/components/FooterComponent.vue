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

             <router-link :to="{name: 'faq'}">
                F.A.Q
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
    background: rgba(130, 150, 47, 0.5);
    display: flex;
    justify-content: space-between;
}

a{
    color: white;
}


</style>