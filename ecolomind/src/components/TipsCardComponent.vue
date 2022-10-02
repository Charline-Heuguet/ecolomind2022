<template>
    <article>
        <router-link :to="{name: 'single-tips', params: {id: this.dbid}}">
            <h2 v-html="this.title"></h2> 
        </router-link> 
            <p v-html="this.excerpt"></p>
        <router-link :to="{name: 'single-tips', params: {id: this.dbid}}">
            <p id="suite">Lire la suite</p> 
        </router-link>    
    </article>
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

<style lang="scss" scoped>

article{
    background-color: rgba($color: #FFCED8, $alpha: 0.5);
    border-radius: 15px;
    flex: 0 1 32%; //flex: capacité à s'étendre, capacité à se réduire et la largeur
    text-align: center;
    padding: 20px 20px 0px;
    margin: 10px 0;
    
    h2{
        text-align: left;
        margin: 0;
    }
}



#suite {
    text-align: right;
}

</style>