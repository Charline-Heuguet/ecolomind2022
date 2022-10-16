<template>
    <article>
        <router-link :to="{name: 'favoris-user', params: {id: this.dbid}}">
            <h4 v-html="this.title"></h4> 
        </router-link> 
            <p v-html="this.excerpt"></p>
        <router-link :to="{name: 'favoris-user', params: {id: this.dbid}}">
            <p id="suite">Lire la suite</p> 
        </router-link>    
    </article>
</template>

<script>

export default({
    name: 'TipsLikedByUserComponent',
    props: {
        dbid: Number,
        title: String,
        excerpt: String, 
    }
})
</script>