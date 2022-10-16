<template>
    <article>
        <router-link :to="{name: 'single-tips', params: {id: this.dbid}}">
            <h4 v-html="this.title"></h4> 
        </router-link> 
            <p v-html="this.excerpt"></p>
        <router-link :to="{name: 'single-tips', params: {id: this.dbid}}">
            <p id="suite">Lire la suite</p> 
        </router-link>    
    </article>
</template>

<script>

export default({
    name: 'TipsLikedByUserComponent',
    props: {
        dbid: String,
        title: String,
        excerpt: String, 
    }
})
</script>

