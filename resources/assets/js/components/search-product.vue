<template>
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
            <h1>Insert Product Key</h1>
            <div class="form-group">
                <input type="text" placeholder="Put Product Key" class="form-control product-id" id="product_key" v-model="productKey">
            </div>

            <div>
                <h3>Total Bills: {{ totalBills }}</h3>
                <div class="pt-1 pb-3">
                    <button class="btn btn-primary" @click="confirmPurchases">Confirm Purchase</button>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>Product Name</th>
                    <th width="15%">Unit Price</th>
                    <th width="15%">Quantity</th>
                    <th width="15%">Net Price</th>
                </tr>

                <single-cart v-for="(product,index) in bags" :key="product.id" :product="product"></single-cart>             
                
            </table> 

        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            productKey: '',
            bags: []
        }
    },
    watch: {
        productKey: function(val){
            this.getProductDetails();
        }
    },
    computed: {
        totalBills: function(item){
            let tb = 0;
            this.bags.forEach((p) => {
                tb += parseInt(p.sell_price) * parseInt(p.quantity);
            })

            return tb;

        }
    },
    methods: {
        getProductDetails: _.debounce(
            function () {
                if( this.productKey ){
                    axios
                    .post(`${AppRootPath}/products/getProductData/${this.productKey}`)
                    .then((p) => {
                        var _this = this;
                        function addProduct(product){
                            var newProduct = {
                                product_id: product.id,
                                name: product.name,
                                sell_price: product.sell_price,
                                quantity: 1
                            };
                            var found = 0;
                            _this.bags.forEach( el => {
                               if( el.product_id == newProduct.product_id ){
                                   el.quantity++; 
                                   found = 1;
                               }
                            } );
                            if(!found)
                            {
                                _this.bags.push(newProduct);
                            }
                        }
                        addProduct(p.data);
                    });
                }
               
            },
            500
        ),
        removeProduct(index){
            this.bags.splice(index , 1);
        },
        confirmPurchases()
        {
            axios.post(`/sells/sellProduct/`, this.bags)
                 .then( res => {
                     console.log(res.data);
                 } );
        }
    }
}
</script>


<style scoped>
    .single-cart{
        position: relative;
    }
    .delete-product-from-cart{
        position: absolute;
        right: -50px;
        z-index: 999;
        top: 5px;
        cursor: pointer;
    }
</style>
