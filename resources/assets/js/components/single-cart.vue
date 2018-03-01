<template>
    <tr>
        <td>{{ fetchProduct.name }}</td>
        <td><input type="text" id="sell_price" class="form-control" v-model="fetchProduct.sell_price"></td>
        <td><input type="text" id="quantity" class="form-control" v-model="fetchProduct.quantity"></td>
        <td>
            <span id="net_price">
                {{ fetchProduct.sell_price * fetchProduct.quantity  }}
            </span>
        </td>
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


<style scoped>
    .single-cart {
        box-shadow: 0 0 3px rgba(0,0,0,.3);
        position: relative;
    }
    .single-cart .h {
        display: none;
    }
    .delete-product-from-cart{
        position: absolute;
        top: 0;
        right: -50px;
        cursor: pointer;
    }

</style>