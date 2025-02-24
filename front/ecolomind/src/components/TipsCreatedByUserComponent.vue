<template>
    <article>
        <router-link :to="{name: 'single-tips', params: {id: this.dbid}}">
            <div class="mytips-user">

                <div class="mytips-title">
                    <h4 v-html="this.title"></h4>
                </div>

                <div class="edit-delete">
                    <img src="@/assets/edit-icon.svg" alt="crayon à papier pour modifier" title="modifier votre astuce">
                    <img src="@/assets/delete-icon.svg" alt="poubelle pour supprimer" title="supprimer votre astuce">
                </div>

            </div>
        </router-link> 
            <!-- <p v-html="this.excerpt"></p>
        <router-link :to="{name: 'single-tips', params: {id: this.dbid}}">
            <p id="suite">Lire la suite</p>  
        </router-link>    -->
    </article>
</template>

<script>

export default({
    name: 'TipsCreatedByUserComponent',
    props: {
        dbid: Number,
        title: String,
        excerpt: String,
    },
})
</script>

<style lang="scss">

.mytips-user{
    display: flex;
    justify-content: space-between;
    
    .mytips-title{
        max-width: 200px;
    }

    .edit-delete{
        display:flex ;
        justify-content: space-between;
        width: 75px; 
        img{
            width: 23px;
            height: auto;
        }       
    }
    
}

@media screen and (min-width: 400px){
    .mytips-user{
        .mytips-title{
            max-width: 220px;
        } 
    }     
}

@media screen and (min-width: 420px){

    .mytips-user{
        .mytips-title{
            max-width: 226px;
        } 
    }  
}

@media screen and (min-width: 500px){
    
    .mytips-user{
        .mytips-title{
            max-width: 260px;
        }

        .edit-delete{
            width: 85px;
            img{
                width: 25px;
                height: auto;
            }       
        }        
    }

}


@media screen and (min-width: 572px){
    .mytips-user{
         .mytips-title{
            max-width: 341px;
         }
         .edit-delete{
            width: 95px;  
         }    
    }
}


@media screen and (min-width: 840px){
    .mytips-user{
        .mytips-title{
            max-width: 230px;
        }
        .edit-delete{
            width: 85px;

            img{
                width: 23px;
            }
        }
                  
    }
}

@media screen and (min-width: 1072px){
    .mytips-user{
        .mytips-title{
            max-width: 340px;
        }
        .edit-delete{
            width: 90px;

            img{
                width: 25px;
            }
        }                  
    }
}

@media screen and (min-width: 1134px){
    .mytips-user{
        .mytips-title{
            max-width: 341px;
        }
        .edit-delete{
            width: 95px;
            
            img{
                width: 26px;
            }
        }                  
    }
}

</style>