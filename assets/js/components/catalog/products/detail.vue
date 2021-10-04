<template>
  <div>
    <div class="container">
      <div class="py-3 my-3 text-centered">
        <div class="border-0 rounded-0">
          <div class="p-0 overflow-hidden shadow">
            <div class="row align-items-stretch">
              <div class="col-lg-6 p-lg-0">
                <div class="bg-center bg-cover d-block h-100" 
                v-bind:style="{ background: 'url(/images/products/' + product.imageName+')' }">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="p-5 my-md-4">
                  <ul class="mb-2 list-inline">
                    <li class="m-0 list-inline-item">&starf;</li>
                    <li class="m-0 list-inline-item">&starf;</li>
                    <li class="m-0 list-inline-item">&starf;</li>
                    <li class="m-0 list-inline-item">&starf;</li>
                    <li class="m-0 list-inline-item">&starf;</li>
                  </ul>
                  <h2 class="h5 text-uppercase">{{ product.name }}</h2>
                  <p class="text-muted">${{ product.price }}</p>
                  <ul class="mb-4 list-inline">
                    <li class="list-inline-item me-3">
                      <strong>${{ product.price }}</strong>
                    </li>
                    <li class="list-inline-item">
                      {{ product.category.name }}
                    </li>
                    <li class="list-inline-item">{{ product.brand.name }}</li>
                  </ul>
                  <p class="mb-4 text-small" v-html="product.description">
                    
                  </p>
                  <ul class="mb-4 list-inline">
                    <li class="list-inline-item me-3">
                      <strong>Quantity</strong>
                    </li>
                    <li class="list-inline-item"><font-awesome-icon :icon="['fas', 'plus']" v-on:click="quantity += 1"/></li>
                    

                    <li class="list-inline-item">{{quantity}}</li>
                    <li class="list-inline-item">
                    <font-awesome-icon :icon="['fas', 'minus']" v-on:click="decrease"/>
                    </li>

                    <li class="list-inline-item">
                      <a class="btn btn-primary" v-on:click="addToCart($event)"> Add to cart </a>
                    </li>
                  </ul>
                  <a class="p-0 reset-anchor" v-on:click="addToWishList($event)">Add to wish list</a>
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
  name: "ProductDetails",
  data: () => ({
    product: {},
    quantity: 1,
    cart: [],
    newItem: null
    // title: "Products catalog"
  }),
  components: {},
  created() {
    this.getProduct();
  },
  mounted() {
    if (localStorage.getItem('basket')) {
      try {
        this.cart = JSON.parse(localStorage.getItem('basket'));
      } catch(e) {
        localStorage.removeItem('basket');
      }
    }
  },
  methods: {
    async getProduct() {
      this.product = {};
      try {
        const response = await this.fetchProduct(this.$route.params.slug);
        this.product = response.data;
  
      } catch (error) {
        console.log(error.message);
      }
    },

    fetchProduct(slug) {
      return axios({
        method: "get",
        url: `/api/products/${slug}`,
      });
    },
     // методы в объекте methods
    decrease: function (event) {
      // this внутри методов указывает на экземпляр Vue
      this.quantity -= 1;
    },
    // increase
    addToCart: function (event) {
      // доступ к нативному событию
      if (event) {
        event.preventDefault()
      }
      console.log(event.target, this.product);
      
      // this.cart.push(this.product);

      this.newItem = {
       name:this.product.name,
       image: this.product.imageName, 
       slug: this.product.slug,
       brand:this.product.brand.name,
       category:this.product.category.name,
       quantity:this.quantity
      };
      this.cart.push(this.newItem);
      
      this.newItem = '';
      this.saveCart();
    },
    removeItem(x) {
      this.cart.splice(x, 1);
      this.saveCart();
    },
    saveCart() {
      const parsed = JSON.stringify(this.cart);
      localStorage.setItem('basket', parsed);
    },
    addToWishList: function (event) {
      // доступ к нативному событию
      if (event) {
        event.preventDefault()
      }
      console.log(event.target);
    },

  },
};
</script>
<style>

</style>