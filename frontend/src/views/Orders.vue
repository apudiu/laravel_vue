<template>
  <div>

    <h2 class="lead p-2">Placed orders</h2>

    <b-table striped hover :fields="fields" :items="orders">

      <template v-slot:cell(delivered)="data">

        <b-badge v-if="data.item.delivered" variant="primary">Yes</b-badge>
        <b-badge v-else variant="secondary">No</b-badge>

      </template>

    </b-table>
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from "@/components/Product.vue";
// import Product from "../components/Product";

import axios from "axios";

export default {
  name: "Orders",

  data() {
    return {
      apiBaseUrl: "http://127.0.0.1:8000/api/",
      fields: [
        {
          key: 'id',
          label: '#'
        },
              {
          key: 'created_at',
          label: 'Ordered',
          formatter: value => new Date(value).toDateString()
        },
        {
          key: 'product',
          label: 'Product',
          formatter: value => value.title
        },
        {
          key: 'price',
          label: 'Price'
        },
        {
          key: 'qty',
          label: 'Qty'
        },
        {
          key: 'total',
          label: 'Total',
          formatter: 'calculatePrice'
        },
        {
          key: 'delivered',
          label: 'Delivered'
        }
      ],
      orders: []
    };
  },

  mounted() {
    this.getProducts();
  },

  methods: {
    async getProducts() {

      const url = `${this.apiBaseUrl}orders`;

      const orders = await axios.get(url);

      this.orders = orders.data.data;
    },

    calculatePrice(value, key, item) {
      return item.price * item.qty;
    }
  }
};
</script>
