<template>
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
            <h1 v-if="!confirmPurchase">Insert Product Key</h1>
            <div class="form-group" v-if="!confirmPurchase">
                <input type="text" placeholder="Put Product Key" class="form-control product-id" id="product_key" v-model="productKey" autofocus>
            </div>
            <div v-if="!confirmPurchase">
                <div v-if="bags.length">
                    <h3>Total Bills: {{ totalBills }}</h3>
                    <div class="pt-1 pb-3">
                        <button class="btn btn-primary" @click="confirmPurchases">Confirm Purchase</button>
                        <select v-model="buyer_id" class="buyer_id select2">
                            <option value="null" selected>No category</option>
                            <option v-for="c in customers" v-text="c.name" :value="c.customer_id"></option>
                        </select>
                    </div>
                </div>
                <table class="table" v-if="bags.length">
                    <tr>
                        <th>Product Name</th>
                        <th width="15%">Unit Price</th>
                        <th width="15%">Quantity</th>
                        <th width="15%">Net Price</th>
                    </tr>

                    <single-cart v-for="(product,index) in bags" :key="product.id" :product="product" @remove="removeItem(index)"></single-cart>    
                    
                </table> 
            </div>
            <div v-else>
                <div class="card text-center done-purchase">
                    <div class="success-sign">
                        <i class="fa fa-check"></i>
                    </div>
                    <h1 class="text-uppercase text-success pt-2 pb-2">Purchase confired</h1>
                    <button class="btn btn-primary" @click="sellAgain">Sell Again</button>
                </div>
                <print-slip :items="bags"></print-slip>
            </div>
            <div class="card text-center done-purchase error-happened" v-if="errorHappened">
                <div class="success-sign">
                    <i class="fa fa-exclamation" aria-hidden="true"></i>
                </div>
                <h1 class="text-uppercase text-danger pt-2 pb-2">Something Wrong!!</h1>
                <button class="btn btn-primary" @click="sellAgain">Try Again</button>
            </div>
        </div>
        
    </div>
</template>

<script>
export default{
    mounted() {
        $('.select2').select2()
    },
    created()
    {
        axios
        .post(`${AppRootPath}/apirequest/customers/index`)
        .then( res => {
            this.customers = res.data.data;
        } );
    },
    data(){
        return{
            productKey: '',
            bags: [],
            confirmPurchase: false,
            errorHappened: false,
            customers: '',
            buyer_id: ''
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
            });
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
                        this.productKey = '';
                    });
                }
               
            },
            500
        ),
        removeItem(index){
            this.bags.splice(index , 1 );
        },
        sellAgain()
        {
            this.confirmPurchase = false;
            this.bags = []; 
            this.errorHappened = false;
        },
        confirmPurchases()
        {
            var _this = this;
            axios
            .post(`/sells/sellProduct/`, { bags: this.bags , customer_id: this.buyer_id } )
            .then( res => {
                this.confirmPurchase = true;
            } )
            .catch(function (error) {
                _this.errorHappened = true;
                console.error(error);
            });
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
.success-sign {
    background: #DFF0D8;
    width: 150px;
    font-size: 60px;
    color: #3C763D;
    margin: auto;
    padding: 44px 0;
    border-radius: 50%;
    margin-top: 35px;
}
.error-happened .success-sign {
    background: #F8D7DA;
    width: 150px;
    font-size: 60px;
    color: #721c24;
    margin: auto;
    padding: 44px 0;
    border-radius: 50%;
    margin-top: 35px;
}

.buyer_id{
    border: 1px solid #DDD;
    padding: 7px;
}
</style>
