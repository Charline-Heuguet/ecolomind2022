<!-- Page d'inscription -->
<template>
    <div>
        <h1>Inscription</h1>
        <p>Rejoignez la communauté Ecolomind</p>

        <form>
            <div>
                <label for="pseudo"></label>
                <input type="text" placeholder="Pseudo" name="" id="pseudo">
            </div>

            <div>
                <label for="email"></label>
                <input type="text" placeholder="Email" name="" id="email">
            </div>

            <div>
                <label for="password"></label>
                <input type="password" placeholder="Mot de passe" name="" id="password">
            </div>

            <div>
                <label for="confirm_password"></label>
                <input type="password" placeholder="Confirmer le mot de passe" name="" id="confirm_password">
            </div>
            <div>
                <input type="checkbox" name="" id="">
                <label for="check-privacy">En m'inscrivant, j'accepte les <router-link :to="{name: 'politique-de-confidentialite'}">
                Politique de confidentialité
                </router-link></label>                               
            </div>
            <button>Je m'inscris</button>
        </form>
    </div>
</template>