<template>
  <div>

    <h2 class="lead p-2">Available products</h2>

    <b-table striped hover :fields="fields" :items="products">

      <!-- A custom formatted column -->
      <template v-slot:cell(images)="data">

        <a
          v-for="img in data.value"
          :key="img.imageable_id"
          target="_blank"
          :href="img.file_name"
        >
          <b-img
            class="product-image ml-1" width="50"
            :src="img.file_name" fluid alt="Fluid image"
          />
        </a>

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
  name: "Products",
  components: {
    // Product
  },

  data() {
    return {
      apiBaseUrl: "http://127.0.0.1:8000/api/",
      fields: [
        {
          key: 'id',
          label: '#'
        },
        {
          key: 'title',
          label: 'Title'
        },
        {
          key: 'details',
          label: 'Details'
        },
        {
          key: 'images',
          label: 'Images'
        }
      ],
      products: []
    };
  },

  mounted() {
    this.getProducts();
  },

  methods: {
    async getProducts() {

      const url = `${this.apiBaseUrl}products`;

      const products = await axios.get(url);

      this.products = products.data.data;
    }
  }
};
</script>
