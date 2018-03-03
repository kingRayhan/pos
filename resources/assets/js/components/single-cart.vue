<template>
    <tr class="single-product-row">
        <td>{{ fetchProduct.name }}</td>
        <td><input type="text" id="sell_price" class="form-control" v-model="fetchProduct.sell_price"></td>
        <td><input type="text" id="quantity" class="form-control" v-model="fetchProduct.quantity"></td>
        <td>
            <span id="net_price">
                {{ fetchProduct.sell_price * fetchProduct.quantity  }}
            </span>
        </td>
        <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
    </tr>

</template>

<script>

export default {
    props: ['product'],
        data(){
            return{
                fetchProduct: this.product
            }
        }
    }
</script>


<style scoped lang="scss">
    button{
        background: red;
        border: none;
        color: #FFF;
        &:hover{
            cursor: pointer;
        }
    }
</style>