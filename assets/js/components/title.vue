<template>
<div>
  <h1>{{ text }}</h1>
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