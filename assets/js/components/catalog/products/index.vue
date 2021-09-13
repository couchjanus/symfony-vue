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
                    <button type="button" class="btn btn-sm btn-outline-secondary">Add to cart</button>
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
  }
}
</script>

<style scoped>

</style>