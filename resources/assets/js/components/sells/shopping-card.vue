<template>
    <div>
        <table class="table table-bordered">
            <tr>
                <td><b>Customer:</b></td>
                <td>{{ customer.name ? customer.name : 'Guest Customer' }}</td>
            </tr>
            <tr>
                <td><b>Total Bill:</b></td>
                <td>14586</td>
            </tr>
        </table>

        <h5 class="text-uppercase">Shopping card</h5>
        <barcode @fetchedProduct="fetchedProduct" />
        <cart :newProduct="fetchNewProduct"/>

    </div>
</template>

<script>
    export default {
        props: ['customer' , 'selectedProduct'],
        data()
        {
            return {
                fetchNewProduct: ''
            }
        },
        methods: {
            fetchedProduct(product)
            {
                this.fetchNewProduct = product;
            }
        },
        watch: {
            selectedProduct(newProduct)
            {
                this.fetchedProduct(newProduct);
            }
        }
    }
</script>