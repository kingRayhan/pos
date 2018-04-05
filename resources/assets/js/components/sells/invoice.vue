<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div v-if="!isConfirmPurchase">
                    <div class="cash-input-group">
                        <label for="paid-amount">Total Bil (with vat)</label>
                        <input type="number" class="cash-input" id="paid-amount" placeholder="Total Bil (with vat)" disabled :value="vatWithTotalBill">
                    </div>
                    <div class="cash-input-group">
                        <label for="paid-amount">Paid Amount</label>
                        <input type="number" class="cash-input" id="paid-amount" placeholder="Paid Amount" v-model="paidAmount">
                    </div>
                    <div class="cash-input-group">
                        <label for="paid-amount">Return Amount</label>
                        <input type="number" class="cash-input" id="paid-amount" placeholder="Return Amount" disabled :value="Math.round(returnAmount , 2)">
                    </div>
                    <div class="cash-input-group">
                        <button class="btn btn-primary btn-sm" @click="makePurchase" v-if=" paidAmount >= vatWithTotalBill">Confirm Purchase</button>
                        <button class="btn btn-danger btn-sm" @click="$emit('cancelOrder')">Cancel</button>
                    </div>
                </div>
                <div v-if="isConfirmPurchase">
                    <div class="purchase-confirm">
                        <h2>Purchase confirmed</h2>
                        <button class="btn btn-primary" onclick="printJS('page-wrap', 'html')"><i class="fa fa-print"></i> Print</button>
                        <button class="btn btn-warning" @click="$emit('cancelOrder')"><i class="fa fa-angle-left"></i> Back</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div id="page-wrap">
                    <div id="header">INVOICE</div>
                    <div id="logo">
                        <h1>DOKAN</h1>
                    </div>

                    <div class="invoice-provider-details">
                        <div id="identity">
                            <div id="address" v-if="customer">
                                <b>{{ customer.name }}</b>
                                <br> {{ customer.address }}
                                <br> Phone: {{ customer.number }}
                            </div>
                        </div>
                        <div id="customer">
                            <table id="meta">
                                <tr>
                                    <td class="meta-head">Invoice #</td>
                                    <td>
                                        <div>000123</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="meta-head">Date</td>
                                    <td>
                                        <div id="date">{{ dateToday }}</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <table class="invoice-details" id="items">
                        <tr>
                            <th>Item</th>
                            <th>Unit Cost</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>


                        <!-- Items -->

                        <tr class="item-row" v-for="prodict in bags">
                            <td>
                                <div class="item-name">{{ prodict.name }}</div>
                            </td>
                            <td>
                                <div class="cost">{{ prodict.sell_price }}</div>
                            </td>
                            <td>
                                <div class="qty">{{ prodict.quantity }}</div>
                            </td>
                            <td><span class="price">{{ prodict.quantity * prodict.sell_price }}</span></td>
                        </tr>



                        <tr class="tr-border">
                            <td></td>
                            <td></td>
                            <td class="left-border top-border text-bold">Subtotal</td>
                            <td class="top-border left-border">{{ totalBil }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="left-border top-border text-bold">Vat (15%)</td>
                            <td class="left-border top-border">{{ vatAmount }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="left-border top-border text-bold">Total</td>
                            <td class="left-border top-border">{{ vatWithTotalBill  }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="left-border top-border text-bold">Paid</td>
                            <td class="left-border top-border">{{ paidAmount }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="left-border top-border text-bold">Return</td>
                            <td class="left-border top-border">{{ Math.round(returnAmount , 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props: ['bags' , 'customer'],
        data()
        {
            return {
                paidAmount: 0,
                isConfirmPurchase: false
            }
        },
        computed: {
            returnAmount()
            {
                if( this.paidAmount == 0 || this.paidAmount < this.vatWithTotalBill ) return 0;
                return this.paidAmount - this.vatWithTotalBill;
            },
            totalBil()
            {
                return this.bags.reduce( (totalBill , current) =>  totalBill += current.sell_price * current.quantity , 0);
            },
            vatAmount()
            {
                return (this.totalBil * 15) / 100;
            },
            vatWithTotalBill()
            {
                return this.totalBil + this.vatAmount;
            },
            dateToday()
            {
                const monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                const d = new Date();
                return `${monthNames[d.getMonth()]} ${d.getDay()}, ${d.getFullYear()}`;
            }
        },
        methods: {
            makePurchase()
            {
                this.$emit('purchased');
                this.isConfirmPurchase = true;
            }
        }
    }
</script>



<style lang="scss">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font: 14px/1.4 Arial, serif;
    }
    #page-wrap {
        max-width: 500px;
        margin: 0 auto;
        padding: 0 15px;
    }

    table {
        border-collapse: collapse;
    }
    table td,
    table th {
        border: 1px solid black;
        padding: 5px;
    }

    #header {
        width: 100%;
        margin: 20px 0;
        background: #222;
        text-align: center;
        color: white;
        font: bold 15px Helvetica, Sans-Serif;
        text-decoration: uppercase;
        letter-spacing: 20px;
        padding: 8px 0px;
    }

    #address {
        width: 200px;
        height: 150px;
        float: left;
        padding-top: 10px;
    }
    #customer {
        overflow: hidden;
    }

    #logo {
        text-align: right;
        position: relative;
        margin-top: 10px;
        border: 1px solid #fff;
        overflow: hidden;
        text-align: center;
        cursor: default;
        margin-bottom: 40px;
        h1{
            margin: 0;
            padding: 0;
        }
    }

    #logohelp {
        text-align: left;
        display: none;
        font-style: italic;
        padding: 10px 5px;
    }
    #logohelp input {
        margin-bottom: 5px;
    }

    #customer-title {
        font-size: 20px;
        font-weight: bold;
        float: left;
    }

    #meta {
        margin-top: 1px;
        width: 230px;
        float: right;
    }
    #meta td {
        text-align: right;
    }
    #meta td.meta-head {
        text-align: left;
        background: #eee;
    }

    #items {
        width: 100%;
        margin: 30px 0 0 0;
        border: 1px solid black;
        th {
            background: #eee;
        }
        tr.item-row td {
            border: 0;
            vertical-align: top;
        }
        td.description {
            width: 300px;
        }
        td.item-name {
            width: 175px;
        }
        td.total-line {
            border-right: 0;
            text-align: right;
        }
        td.total-value {
            border-left: 0;
            padding: 10px;
        }
    }



    #terms {
        text-align: center;
        margin: 20px 0 0 0;
        h5 {
            text-transform: uppercase;
            font: 13px Helvetica, Sans-Serif;
            letter-spacing: 10px;
            border-bottom: 1px solid black;
            padding: 0 0 8px 0;
            margin: 0 0 8px 0;
        }
        a{
            color: #000;
        }
    }

    table.invoice-details{
        .tr-border{
            td{
                border-top: 1px solid #000;
            }
        }
        .left-border{
            border-left: 1px solid #000;
        }
        .top-border{
            border-top: 1px solid #000;
        }
    }
    table.invoice-details td{
        vertical-align: middle;
        text-align: center;
        border: 0;
        padding: 4px 0;
    }

    .text-bold{
        font-weight: bold;
    }
</style>
<style lang="scss" scoped>
    .cash-input-group {
        padding: 10px 0;
        .cash-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #DDD;
            font-size: 18px;
        }
        label{
            font-weight: bold;
        }
    }
    .purchase-confirm {
        border: 1px solid #ddd;
        padding: 18px;
        margin-top: 28px;
        h2{
            text-transform: uppercase;
            font-size: 30px;
            color: var(--primary);
        }
    }
</style>