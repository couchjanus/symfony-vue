<template>
<div>
  <h1>{{ user.name }}</h1>
  <button type="button" @click="logout">Logout</button>
</div>
</template>

<script>
export default {
  name: "dashboard",
  data: () => ({
        user:{
          name: 'Customer',
        }
  }),
  methods:{
    logout() {
      this.$router.replace({name: 'home'})
    }
  }
}
</script>

<style scoped>

</style>