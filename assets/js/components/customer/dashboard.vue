<template>
  <div>
    <h1>{{ user.name }}</h1>
    <button type="button" @click="logout" class="btn btn-light text-dark me-2">
      <font-awesome-icon icon="sign-out-alt" /> Logout
    </button>
  </div>
</template>

<style scoped></style>

<script>
// import { mapGetters } from "vuex";
export default {
  name: "Dashboard",
  data: () => (
      {
        user: {
          name: "Customer",
        },
      }
  ),
  methods: {
    // ...mapActions({
    //   logout: "auth/logout",
    // }),
    logout() {
      // this.logout();
      this.isAuth = false,
      this.$router.replace({
        name: "home",
      });
    },
  },
  
  // computed: {
  //   ...mapGetters({
  //     user: "auth/getUser",
  //   }),
  // },
};
</script>
