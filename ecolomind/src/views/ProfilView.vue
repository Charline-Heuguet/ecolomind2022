<!-- Page de profil -->


<template>

    <form>
        <div>
            <img src="https://cdn.pixabay.com/photo/2017/08/06/21/01/louvre-2596278_960_720.jpg" id="output" width="200" />
            <label for="file"></label>
            <input type="file" id="file" >    
        </div>
    </form>

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
