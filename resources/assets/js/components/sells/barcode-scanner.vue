<template>
    <input type="text" class="barcode" placeholder="Put Product Barcode here" v-model="productKey">
</template>
<style>
    input.barcode {
        width: 100%;
        padding: 8px;
        border: 1px solid #DDD;
    }
</style>

<script>
    export default {
        data()
        {
            return {
                productKey: ''
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

                                if( p.data.length == 0 ){
                                    swal({
                                        title: "Product Not founded",
                                        icon: "error",
                                        dangerMode: true,
                                    })
                                    .then( close => {
                                        if(close)
                                        {
                                            document.querySelector('#product_key').focus();
                                            this.productKey = '';
                                        }
                                    });

                                    return;
                                }

                                // Emit fetched product
                                const fetchedProduct = {
                                    name: p.data.name,
                                    product_id: p.data.id,
                                    quantity: 1,
                                    sell_price: p.data.sell_price
                                };
                                this.$emit('fetchedProduct' , fetchedProduct);
                                this.productKey = '';
                            });
                    }

                },
                500
            )
        }
    }
</script>