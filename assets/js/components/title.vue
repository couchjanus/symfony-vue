<template>
<div>
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{ text }}</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. </p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
  </section>

</div>
</template>

<script>
export default {
  name: "title",
  props: {
    text: {
      type: String,
    }
  }
}
</script>

<style scoped>

</style>