<template>
  <div>

    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <div class="col" v-for="product in products" :key="product">
            <div class="card shadow-sm">
              <img :src="'/images/products/' + product.imageName">

              <div class="card-body">
                <p class="card-text">{{product.name}}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <router-link :to="'/details/'+product.slug">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Detail</button>
                    </router-link>
                    <button type="button" class="btn btn-sm btn-outline-secondary" @click="addToCart(product)">Add to cart</button>
                  </div>
                  <small class="text-muted">{{product.price}}</small>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "index",
  props: {
    products: {
      type: Array
    }
  },
  data: () => ({
    product: {},

    newItem:null,
    cart:[],
    // title: "Products catalog"
  }),
  mounted() {
    if(localStorage.getItem('basket')){
      try{
        this.cart = JSON.parse(localStorage.getItem('basket'));
      }catch(e){
        localStorage.removeItem('basket');
      }
    }
  },
  methods: {
    addToCart:function(product){
      this.newItem = {
        name: product.name,
        image: product.imageName,
        slug:product.slug,
        price:product.price,
        brand:product.brand.name,
        category:product.category.name,
        quantity: 1
      }
      //
      this.cart.push(this.newItem);
      this.newItem = null;
      // console.log(obj);
      this.saveCart();
    },

    saveCart(){
      const parsed = JSON.stringify(this.cart);
      localStorage.setItem('basket', parsed);
    }
  }

}
</script>

<style scoped>

</style>