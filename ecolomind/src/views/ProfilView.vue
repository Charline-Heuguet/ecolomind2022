<!-- Page de profil -->


<template>
    <form>
        <div>
            <label for="pseudo"></label>
            <input type="text" placeholder="Gerceval" id="pseudo" />
        </div>

        <div>
            <label for="email"></label>
            <input type="text"  placeholder="gerceval@legallois.com" id="email" />
        </div>

        <div>
            <label for="password"></label>
            <input type="password" placeholder="******" id="password" />
        </div>

        <button>Enregistrer les modifications</button>
    </form>
</template>


<script>
export default {
    name: 'ProfilView',
}
</script>
