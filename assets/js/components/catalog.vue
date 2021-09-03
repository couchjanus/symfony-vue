<template>
  <div>
    <title-component :text="title"></title-component>

    <product-list :products="products"></product-list>
  </div>

</template>

<script>
import TitleComponent from '@/components/title';
import ProductList from '@/components/product-list';
import axios from 'axios';

export default {
  name: "catalog",
  components: {
    TitleComponent,
    ProductList
  },
  data: () => (
      {
        title: 'Products Catalog',
        products:[]
      }
  ),
  created() {
    this.getProducts();
  },
  methods:{
    async getProducts(){
      this.products = [];
      const response = await this.fetchProducts();
      console.log(response.data['hydra:member']);
      this.products = response.data['hydra:member'];
    },
    fetchProducts(){
      return axios({
        method: 'get',
        url: '/api/products'
      })

    }
  }
}
</script>

<style scoped>

</style>