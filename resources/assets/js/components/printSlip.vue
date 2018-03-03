<template>
    <div>
        <button onclick="printJS('printSlip', 'html')" class="btn btn-success">Print</button>
        <div id="printSlip">
            <h2 class="title">Amana SuperShop</h2>
            <table border="1" class="print-product-list">
                <tr>
                    <th width="50%">Name</th>
                    <th width="2%">Quantity</th>
                    <th width="10%">Rate</th>
                    <th width="10%">Amount</th>
                </tr>
                <tr v-for="product in bags">
                    <td>{{ product.name }}</td>
                    <td>{{ product.quantity }}</td>
                    <td>{{ product.sell_price}}</td>
                    <td>{{  product.sell_price * product.quantity  }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Total</b></td>
                    <td>{{ totalPrice }}</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
export default {
  props: ['items'],
  data(){
      return {
          bags: this.items
      }
  },
  computed: {
      totalPrice()
      {
          let total = 0;
          this.bags.forEach(el => {
              total += (el.sell_price * el.quantity)
          });
          return total;
      }
  }
}
</script>

<style lang="scss" scoped>
#printSlip{
	margin: 25px auto;
	border: 1px solid;
	width: 400px;
	padding: 15px;
	.title{
		text-align: center;
        padding-bottom: 25px;
	}
	.print-product-list{
		td{
			padding: 3px 8px;
		}
		th{
			padding: 5px;
		}
	}
}
</style>

