<template>
  <div>
    <navbar-component></navbar-component>
    <router-view></router-view>
  </div>
</template>

<script>
import  NavbarComponent from '@/components/layouts/navbar';
import { mapGetters } from "vuex";

export default {
  name: "App",
  components: {
    NavbarComponent,
  },
  computed: {
    ...mapGetters({
      isLoading: "getLoading",
    }),
  },
}
</script>

<style scoped>

</style>