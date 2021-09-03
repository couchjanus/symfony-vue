<template>
<div>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <div class="col" v-for="product in products" :key="product">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">{{product.name}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Detail</button>
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
  name: "product-list",
  props: {
    products: {
      type: Array
    }
  }
}
</script>

<style scoped>

</style>