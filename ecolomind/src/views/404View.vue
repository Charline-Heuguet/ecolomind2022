<template>
    <div class="wrong-path">
        <h1>Ceci est une page cassée.</h1>
        <router-link to="/">
            <img src="../assets/guillaume_Ferard.jpg" alt="You Shall Not Passsss !">
        </router-link>
        <router-link to="/">
            <h2>Tu veux voir l'effet qu'ça fait sur une rotule ?</h2>
            <h3> Alors retournes à la maison !</h3>
        </router-link>
    </div>
</template>


<style lang="scss">

.wrong-path{
    text-align: center;
    h1{
        margin-top: 50px;
    }
}
</style>



