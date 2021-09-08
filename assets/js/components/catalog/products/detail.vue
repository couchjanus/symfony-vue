<template>
  <div>
    <div class="container">
      <div class="py-3 my-3 text-centered">
        <div class="border-0 rounded-0">
          <div class="p-0 overflow-hidden shadow">
            <div class="row align-items-stretch">
              <div class="col-lg-6 p-lg-0">
                <div class="bg-center bg-cover d-block h-100">
                  <img :src="'/images/products/' + product.imageName" />
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
                    <li class="list-inline-item">-</li>
                    <li class="list-inline-item">1</li>
                    <li class="list-inline-item">+</li>

                    <li class="list-inline-item">
                      <a class="btn btn-primary" href="#"> Add to cart </a>
                    </li>
                  </ul>
                  <a class="p-0 reset-anchor" href="#">Add to wish list</a>
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
    // title: "Products catalog"
  }),
  components: {},
  created() {
    this.getProduct();
  },
  methods: {
    async getProduct() {
      this.product = {};
      try {
        const response = await this.fetchProduct(this.$route.params.id);
        this.product = response.data;
        // console.Namelog(this.product);
      } catch (error) {
        console.log(error.message);
      }
    },

    fetchProduct(id) {
      return axios({
        method: "get",
        url: `/api/products/${id}`,
      });
    },
  },
};
</script>
