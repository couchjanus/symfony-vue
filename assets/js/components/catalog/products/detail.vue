<template>
<div>


  <div class="container">
    <div class="text-center my-3 py-3">
      <div class="rounded-0 border-0">
        <div class="p-0 overflow-hidden shadow">
          <div class="row align-items-start">
            <div class="col-lg-6 p-lg-0">
              <div class="d-block h-100 bg-center bg-center" style="background-image: url(https://picsum.photos/1000)">

              </div>
            </div>
            <div class="col-lg-6">
              <div class="p-5 my-md-4">
                <ul class="list-inline mb-2">
                  <li class="list-inline-item m-0">&starf;</li>
                  <li class="list-inline-item m-0">&starf;</li>
                  <li class="list-inline-item m-0">&starf;</li>
                  <li class="list-inline-item m-0">&starf;</li>
                  <li class="list-inline-item m-0">&starf;</li>
                </ul>
                <h2 class="h5 text-uppercase">{{product.name}}</h2>
                <ul class="list-inline mb-4">
                  <li class="list-inline-item me-3"><strong>${{product.price}}</strong></li>
                  <li class="list-inline-item me-3">{{product.category.name}}</li>
                  <li class="list-inline-item me-3">{{product.brand.name}}</li>
                </ul>
                <p class="mb-4">{{product.description}}</p>
                <ul class="list-inline mb-4">
                  <li class="list-inline-item"><strong>Quantity: </strong></li>
                  <li class="list-inline-item">-</li>
                  <li class="list-inline-item">1</li>
                  <li class="list-inline-item">+</li>

                  <li class="list-inline-item"><a class="btn btn-primary" href="#">Add to cart</a></li>
                </ul>
                <a class="p-0" href="#">Add to wish list</a>
              </div>
            </div>-
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
</template>

<script>

// import TitleComponent from '@/components/title';

// import axios from "axios";


export default {
  name: "ProductDetails",
  components: {


  },
  data: () => (
      {
        // title: 'Products Catalog',
        product:{}
      }
  ),
  mounted() {
    this.getProduct();
  },
  methods:{
    async getProduct(){
      this.product = {};
      const response = await this.fetchProduct(this.$route.params.id);

      this.product = response.data;
      console.log(this.product);
    },
    fetchProduct(id){
      return axios({
        method: 'get',
        url: `/api/products/${id}`
      })

    }
  }
}
</script>

<style scoped>

</style>