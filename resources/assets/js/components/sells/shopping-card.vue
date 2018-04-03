<template>
    <div>
        <table class="table table-bordered">
            <tr>
                <td><b>Customer:</b></td>
                <td>King Rayhan</td>
            </tr>
            <tr>
                <td><b>Total Bill:</b></td>
                <td>14586</td>
            </tr>
        </table>
        <br>
        <table class="table table-bordered">
                <tr>
                    <th>Product Name</th>
                    <th>Sell Price</th>
                    <th>Quantity</th>
                    <th>Net Price</th>
                </tr>
                <tr class="single-product-row">
                    <td>Lax Shaban</td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td>
                        <span id="net_price">
                            145
                        </span>
                    </td>
                    <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
                </tr>
                <tr class="single-product-row">
                    <td>Lax Shaban</td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td>
                        <span id="net_price">
                            145
                        </span>
                    </td>
                    <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
                </tr>
                <tr class="single-product-row">
                    <td>Lax Shaban</td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td>
                        <span id="net_price">
                            145
                        </span>
                    </td>
                    <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
                </tr>
                <tr class="single-product-row">
                    <td>Lax Shaban</td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td>
                        <span id="net_price">
                            145
                        </span>
                    </td>
                    <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
                </tr>
                <tr class="single-product-row">
                    <td>Lax Shaban</td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td>
                        <span id="net_price">
                            145
                        </span>
                    </td>
                    <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
                </tr>
                <tr class="single-product-row">
                    <td>Lax Shaban</td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td>
                        <span id="net_price">
                            145
                        </span>
                    </td>
                    <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
                </tr>
                <tr class="single-product-row">
                    <td>Lax Shaban</td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td>
                        <span id="net_price">
                            145
                        </span>
                    </td>
                    <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
                </tr>
                <tr class="single-product-row">
                    <td>Lax Shaban</td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td>
                        <span id="net_price">
                            145
                        </span>
                    </td>
                    <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
                </tr>
                <tr class="single-product-row">
                    <td>Lax Shaban</td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td>
                        <span id="net_price">
                            145
                        </span>
                    </td>
                    <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
                </tr>
                <tr class="single-product-row">
                    <td>Lax Shaban</td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td>
                        <span id="net_price">
                            145
                        </span>
                    </td>
                    <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
                </tr>
                <tr class="single-product-row">
                    <td>Lax Shaban</td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td><input type="text" id="sell_price" class="cart-input"></td>
                    <td>
                        <span id="net_price">
                            145
                        </span>
                    </td>
                    <button @click="$emit('remove')"><i class="fa fa-times"></i></button>
                </tr>
        </table>
    </div>
</template>


<style scoped>
    .cart-input{
        width: 100%;
        border: 1px solid #DDD;
        padding: 3px;
    }
</style>