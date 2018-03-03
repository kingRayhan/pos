require('./bootstrap');

window.Vue = require('vue');

require('print-js');

require('chart.js');
require('hchs-vue-charts');

Vue.use(VueCharts);



Vue.component('search-product', require('./components/search-product.vue'));
Vue.component('single-cart', require('./components/single-cart.vue'));
Vue.component('sell-graphs', require('./components/sell-graphs.vue'));
Vue.component('print-slip', require('./components/printSlip.vue'));
Vue.component('sell-report', require('./components/sell-report.vue'));
Vue.component('customer-list', require('./components/customer-list.vue'));


const app = new Vue({
    el: '#app'
});
