<template>
    <div>
        <article>
            <router-link :to="{name: 'single-tips', params: {id: this.dbid}}">
                <h2 v-html="this.title"></h2> 
            </router-link> 
                <p v-html="this.excerpt"></p>
            <router-link :to="{name: 'single-tips', params: {id: this.dbid}}">
                <p>Lire la suite</p> 
            </router-link>    
        </article>
    </div>
</template>

<script>

export default({
    name: 'TipsCardComponent',
    props: {
        dbid: Number,
        title: String,
        excerpt: String,
    },
})
</script>
