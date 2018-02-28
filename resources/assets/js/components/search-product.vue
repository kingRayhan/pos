<template>
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
            <h1>Insert Product Key</h1>

            <div class="form-group">
                <input type="text" id="product_id" placeholder="Put Product Key" class="form-control product-id" v-model="productKey">
            </div>
            <div class="product-details" v-if="stock != 0">
                <table class="table">
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><b>Product:</b></td>
                        <td>{{ fetchProduct.name }}</td>
                    </tr>
                    <tr>
                        <td><b>Unit Price</b></td>
                        <td><input type="text" id="sell_price" class="form-control" v-model="fetchProduct.sell_price"> </td>
                    </tr>
                    <tr>
                        <td><b>Quantity</b></td>
                        <td><input type="text" id="quantity" class="form-control" v-model="quantity"> </td>
                    </tr>
                    <tr>
                        <td><b>Discount (%)</b></td>
                        <td><input type="text" id="quantity" class="form-control" v-model="discount"></td>
                    </tr>
                    <tr>
                        <td><b>Discount Money</b></td>
                        <td>{{ ((fetchProduct.sell_price * quantity) * discount ) / 100 }}</td>
                    </tr>
                    <tr>
                        <td><b>Net Bill</b></td>
                        <td><span id="net_price">{{ ( fetchProduct.sell_price * quantity ) - ((fetchProduct.sell_price * quantity) * discount ) / 100 }}</span> </td>
                    </tr>
                </table>
            </div>
            <button @click="sellProduct" class="btn btn-primary">Sell</button>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                productKey: '',
                fetchProduct: '',
                quantity: 1,
                discount: 0,
                stock: 0
            }
        },
        watch: {
            productKey: function(val){
                this.getProductDetails();
            }
        },
        methods: {
            getProductDetails: _.debounce(
                function () {
                    if( this.productKey ){
                        axios
                        .post(`${AppRootPath}/products/getProductData/${this.productKey}`)
                            .then((p) => {
                                this.fetchProduct = p.data;
                                this.stock = p.data.stock
                            });
                    }else{
                        this.fetchProduct = 0;
                    }
                },
                500
            ),
            sellProduct()
            {
                axios
                    .post(`${AppRootPath}/products/sellProduct` , {
                        'product_id' : this.productKey,
                        'sell_price' : document.querySelector('#net_price').textContent / document.querySelector('#quantity').value,
                        'quantity' : document.querySelector('#quantity').value
                    })
                    .then( res => {
                        console.log(res);
                    } )
               
            }
        }
    }
</script>

<style scoped>
    .product-id{
        width: 100%;
        padding: 15px;
    }
</style>

