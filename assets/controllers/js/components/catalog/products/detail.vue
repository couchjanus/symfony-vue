<template>
  <div>
    <div class="container">
      <div class="py-3 my-3 text-centered">
        <div class="border-0 rounded-0">
          <div class="p-0 overflow-hidden shadow">
            <div class="row align-items-stretch">
              <div class="col-lg-6 p-lg-0">
                <div class="bg-center bg-cover d-block h-100" :style="{background: 'url(/images/products/'+product.imageName+')'}">
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
                  <p class="mb-4 text-small">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                    ut ullamcorper leo, eget euismod orci. Cum sociis natoque
                    penatibus et magnis dis parturient montes nascetur ridiculus
                    mus. Vestibulum ultricies aliquam convallis.
                  </p>
                  <ul class="mb-4 list-inline">
                    <li class="list-inline-item me-3">
                      <strong>Quantity</strong>
                    </li>
                    <li class="list-inline-item"><button @click="decrease">-</button></li>
                    <li class="list-inline-item">{{quantity}}</li>
                    <li class="list-inline-item"><button @click="quantity+=1">+</button></li>

                    <li class="list-inline-item">
                      <a class="btn btn-primary" @click="addToCart()"> Add to cart </a>
                    </li>
                  </ul>
                  <a class="p-0 reset-anchor" @clcki="addToWishList">Add to wish list</a>
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
    quantity:1,
    newItem:null,
    cart:[],
    // title: "Products catalog"
  }),
  components: {},
  created() {
    this.getProduct();
  },
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
    async getProduct() {
      this.product = {};
      try {
        const response = await this.fetchProduct(this.$route.params.slug);
        this.product = response.data;
        // console.Namelog(this.product);
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
    decrease:function(){
      if(this.quantity>1){
        this.quantity -=1;
      }
    },
    addToCart:function(){
      this.newItem = {
        name: this.product.name,
        image: this.product.imageName,
        slug:this.product.slug,
        price:this.product.price,
        brand:this.product.brand.name,
        category:this.product.category.name,
        quantity: this.quantity
      }

      this.cart.push(this.newItem);
      this.newItem = null;
      // console.log(this.cart);
      this.saveCart();
    },
    addToWishList:function(){

    },
    saveCart(){
      const parsed = JSON.stringify(this.cart);
      localStorage.setItem('basket', parsed);
    }
  },

};
</script>
