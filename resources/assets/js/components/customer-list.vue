<template>
  <div>
      <input type="text" class="form-control" placeholder="Search by Name / Email / Phone number" v-model="searchCustomer">
      <table class="table">
          <tr>
              <td>Name</td>
              <td>Phone Number</td>
              <td>Total Shopping Spend</td>
              <td>Action</td>
          </tr>
          <tr v-for="customer in filteredCustomer">
              <td>{{ customer.name }}</td>
              <td>{{ customer.number }}</td>
              <td>{{ customer.shopping_spend ? customer.shopping_spend : 'No Shopping' }}</td>
              <td>
                  <a :href="`/customers/${customer.customer_id}/shoppinghistory`" class="btn btn-info btn-sm" v-if="customer.shopping_spend">
                      <i class="fa fa-list"></i></a>
                  <a :href="'/customers/' + customer.customer_id" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                  <a :href="'/customers/' + customer.customer_id + '/edit'" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
              </td>
          </tr>
      </table>
  </div>
</template>

<script>
export default {
  created()
  {
      axios
      .post(`${AppRootPath}/apirequest/customers/index`)
      .then( res => {
          this.customerList = res.data.data;
      } )
  },
  data()
  {
      return {
          customerList: '',
          searchCustomer: ''
      }
  },
  computed:{
      filteredCustomer()
      {
          return Array.from(this.customerList).filter( customer => {
              return customer.name.includes(this.searchCustomer) || customer.number.includes(this.searchCustomer) || customer.email.includes(this.searchCustomer);
          } )
      }
  }
}
</script>

