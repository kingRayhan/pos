<template>
    <table class="table table-bordered">
        <tr>
            <th>Product Name</th>
            <th>Sell Price</th>
            <th>Quantity</th>
            <th>Net Price</th>
        </tr>
        <tr class="single-product-row" v-for="product in bags">
            <td v-text="product.name"></td>
            <td><input type="text" id="sell_price" class="cart-input" v-model="product.sell_price"></td>
            <td><input type="text" id="sell_price" class="cart-input"></td>
            <td>
                <span id="net_price">
                    145
                </span>
            </td>
            <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
        </tr>
    </table>
</template>

<script>
    export  default {
        props: ['newProduct'],
        data()
        {
            return {
                bags: []
            }
        },
        methods: {
            addProduct(product){
                this.bags.push(product)

            }
        },
        watch: {
            newProduct( newProduct )
            {
                this.addProduct(newProduct);
            }
        }
    }
</script>
<style scoped>
    .cart-input{
        width: 100%;
        border: 1px solid #DDD;
        padding: 3px;
    }
</style>