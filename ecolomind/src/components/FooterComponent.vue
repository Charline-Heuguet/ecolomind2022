<template>

    <footer>

        <div>

            <router-link :to="{name: 'qui-sommes-nous'}">
                Qui sommes-nous?
            </router-link>

            <router-link :to="{name: 'contact'}">
                Contactez-nous
            </router-link>

        </div>

        <img src="@/assets/logo.png" alt="logo ecolomind">        


        <div>

            <router-link :to="{name: 'mentions'}"> 
                Mentions légales
            </router-link>

            <router-link :to="{name: 'politique-de-confidentialite'}">
                Politique de confidentialité
            </router-link>

        </div>
    

    </footer>

</template>

<script>
export default {
    name: 'FooterComponent',
    
}
</script>