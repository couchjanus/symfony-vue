<template>
  <div>
    <title-component :text="title"></title-component>

    <product-list :products="products"></product-list>
  </div>

</template>

<script>
import TitleComponent from '@/components/title';
import ProductList from '@/components/product-list';

export default {
  name: "catalog",
  components: {
    TitleComponent,
    ProductList
  },
  data: () => (
      {
        title: 'Products Catalog',
        products:[
        {
         name: 'Product 1'
        },
        {
          name: 'Product 2'
        },
        {
            name: 'Product 3'
        },
      ]
      }
  )
}
</script>

<style scoped>

</style>