<template>
<div>
  <div class="buttons pb-2 statics">
      <button class="btn btn-primary" @click="visibility = 'all'">All</button>
      <button class="btn btn-primary" @click="visibility = 'today'">Today</button>
      &nbsp;
      &nbsp;
      <b>From:&nbsp;</b><input type="date" v-model="fromDate" forma placeholder="from Date" class="date-filter">
      &nbsp;
      <b>To:&nbsp;</b><input type="date" v-model="toDate" placeholder="from Date" class="date-filter">
      <div class="pt-3">
          <table>
              <tr>
                  <td><h4>Total sells:</h4></td>
                  <td><h4>{{ totalSell }}</h4></td>
              </tr>
              <tr>
                  <td><h4>Total Profits:</h4></td>
                  <td><h4>{{ totalProfit }}</h4></td>
              </tr>
          </table>
      </div>
  </div>
  <table class="table">
      <tr>
          <th>Sell ID</th>
          <th>Buyer</th>
          <th>Time</th>
          <th>Product Name</th>
          <th>U. Sell Price</th>
          <th>U. Buy Price</th>
          <th>Quantity</th>
          <th>Buy cost</th>
          <th>Sell Price</th>
          <th>Profit</th>
      </tr>
      
      <tr v-for="s in filteredSells">
          <td>{{ s.sell_id }}</td>
          <td v-if="s.buyer != null"><a :href="`/customers/${s.buyer.id}`">{{ s.buyer.name }}</a></td>
          <td v-if="s.buyer == null">Guest Buyer</td>
          <td>{{ s.date }}&nbsp;&nbsp;&nbsp;{{ s.time }}</td>
          <td>{{ s.product_name }}</td>
          <td>{{ s.sell_unit_price }}</td>
          <td>{{ s.buy_unit_price }}</td>
          <td>{{ s.quantity }}</td>
          <td>{{ s.total_buy_price }}</td>
          <td>{{ s.total_sell_price }}</td>
          <td>{{ s.net_profit }}</td>
      </tr>
  </table>
</div>
</template>

<script>
export default {
    created()
    {
        axios
            .get(`${AppRootPath}/apirequest/sells/index`)
            .then( res => {
                this.sellReports = res.data.data;
                console.log(res.data.data);
            } )  
    },
    data()
    {
        return {
            sellReports: '',
            visibility: 'all',
            fromDate: '',
            toDate: ''

        }
    },
    computed: {
        filteredSells()
        {
            var data = '';
            if( this.visibility == 'all' ) data = this.sellReports;
            else if(this.visibility == 'today'){
                data = this.sellReports.filter( sell => {
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth()+1; //January is 0!

                    var yyyy = today.getFullYear();
                    if(dd<10){
                        dd='0'+dd;
                    } 
                    if(mm<10){
                        mm='0'+mm;
                    } 
                    var today = dd+'/'+mm+'/'+yyyy;
                    return sell.date.match(today);
                } );
            }
      
            // else if( this.fromDate != '' && this.toDate != '' )
            // {
            //     data = sell.date.filter( d => {
            //         return (new Date(this.fromDate).getTime()) >= (new Date(d.date).getTime())  && (new Date(this.toDate).getTime()) <= (new Date(d.date).getTime());
            //     } );
            // }

            return data;
        },
        totalProfit()
        {
            var totalP = 0;
            Array.from(this.filteredSells).forEach(el => {
                totalP += el.net_profit;
            });
            return totalP;
        },
        totalSell()
        {
            var total = 0;
            Array.from(this.filteredSells).forEach(el => {
                total += el.total_sell_price;
            });
            return total;
        }
    }
}
</script>


<style scoped>
input.date-filter {
    border: 1px solid #DDD;
    padding: 1px 10px;
}
.statics {
    background: #F2F2F2;
    padding: 11px 11px;
}
</style>
