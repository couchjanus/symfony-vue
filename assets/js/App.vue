<template>
  <div>
    <navbar-component></navbar-component>
    <router-view></router-view>
  </div>
</template>

<script>
import  NavbarComponent from '@/components/layouts/navbar';
export default {
  name: "App",
  components: {
    NavbarComponent,
  },
}
</script>

<style scoped>

</style>