<template>
    <div class="selectbox" id="categoryList">
        <button class="deselect" @click="$emit('categorySelected' , 'all')">x</button>
        <input type="text" class="search-input" placeholder="Filter Category" v-model="search">
        <div class="div-list">
            <div class="single-product" v-for="cat in filteredCategory" :data-cat-id="cat.id" @click="$emit('categorySelected' , cat.id)">
                {{ cat.name }}
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data()
        {
            return {
                categories: '',
                search: ''
            }
        },
        created()
        {
            axios
                .get(`${AppRootPath}/apirequest/products/categories`)
                .then( res => {
                    this.categories = res.data.data;
                } );
        },
        computed: {
            filteredCategory()
            {
                return [...this.categories].filter( cat => cat.name.toLowerCase().includes(this.search) )
            }
        }
    }
</script>

<style scoped>
    .selectbox{
        padding-bottom: 25px;
    }
    .deselect {
        font-size: 13px;
        border: none;
        background: red;
        color: #FFF;
        cursor: pointer;
        position: absolute;
        border-radius: 50%;
        padding: 0 10px;
        top: 0;
        right: 0;
    }

    .deselect:focus {
        outline: none;
    }
</style>