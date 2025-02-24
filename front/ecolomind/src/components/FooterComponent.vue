<template>

    <footer>

            <div class="gutter">
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
            </div>

    </footer>

</template>

<script>
export default {
    name: 'FooterComponent',
    
}
</script>

<style lang="scss">

footer{
    padding: 25px;
    background: linear-gradient(0deg, rgba(130, 150, 47, 0.5) -38.26%, rgba(149, 197, 22, 0.75) 49.94%);    
    border-top: 25px solid #684D41;

    .gutter{
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        text-align: center;    

        a {
            
            color: #684D41;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 10px;

            &:visited{
                text-decoration: none;
                color: #684D41;
            }
            

            &.router-link-exact-active {
                color: #09301e;
            }
        }
    }
}
 @media screen and (min-width: 825px){
     footer{
         .gutter{
            flex-direction: row;
         }
    }   
 }


</style>
