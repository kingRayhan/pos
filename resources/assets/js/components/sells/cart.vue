<template>
    <table class="table table-bordered" v-if="bags.length">
        <tr>
            <th>Product Name</th>
            <th>Sell Price</th>
            <th>Quantity</th>
            <th>Net Price</th>
        </tr>
        <tr class="single-product-row" v-for="(product,i) in bags">
            <td v-text="product.name"></td>
            <td><input type="text" id="sell_price" class="cart-input" v-model="product.sell_price"></td>
            <td><input type="text" class="cart-input" v-model="product.quantity"></td>
            <td>
                {{ product.sell_price * product.quantity }}
            </td>
            <button @click="removeProduct(i)" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
        </tr>
    </table>
</template>

<script>
    export  default {
        props: ['newProduct'],
        data()
        {
            return {
                bags: [],
                quantity: ''
            }
        },
        methods: {
            addProduct(product){
                const newProduct = {
                    product_id: product.product_id,
                    name: product.name,
                    sell_price: product.sell_price,
                    quantity: 1

                };

                var founded = false;

                if( this.bags.length )
                {
                    this.bags.forEach( item => {
                        if( item.product_id == newProduct.product_id){
                            item.quantity++;
                            founded = true;
                        }
                    } );
                }

                if( !founded )
                {
                    this.bags.push(newProduct);
                }


                this.$emit('bagsUpdated' , this.bags);
            },
            removeProduct(index)
            {
                this.bags.splice(index , 1);
                this.$emit('bagsUpdated' , this.bags);
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