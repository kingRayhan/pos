<template>
    <form>
        <div class="selectbox">
            <input type="reset" value="x" class="deselect" @click="$emit('customerSelected' , '' )">
            <input type="text" class="search-input" placeholder="Select Customer" v-model="searchCustomer">
            <ul class="list">
                <li v-for="customer in filteredCustomer">
                    <label :data-customer-id="customer.customer_id" @click="$emit('customerSelected' , customer)">
                        <input type="radio" name="customer"> {{ customer.name }}
                    </label>
                </li>
            </ul>
        </div>
    </form>
</template>

<script>
    export default {
        data(){
            return{
                customers: '',
                searchCustomer: ''
            }
        },
        created()
        {
            axios
                .post(`${AppRootPath}/apirequest/customers/index`)
                .then( res => {
                    this.customers = res.data.data;
                } );
        },
        computed: {
            filteredCustomer()
            {
                return [...this.customers].filter( customer => {
                    return customer.name.includes(this.searchCustomer) || customer.number.includes(this.searchCustomer) || customer.email.includes(this.searchCustomer);
                } )
            }
        }
    }
</script>
<style scoped>
    .title{
        font-size: 13px;
        text-transform: uppercase;
    }
    li{
        border: 1px solid #DDD;
        margin: 8px 0;
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
    .selectbox{
        box-shadow: 0 0 8px rgba(0,0,0,.1);
        padding: 2px;
    }
</style>