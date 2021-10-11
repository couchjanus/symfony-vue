<template>
  <div>
    <h1>Hello {{ user.email }}!</h1>

  </div>
</template>

<style scoped></style>

<script>
import { mapGetters } from "vuex";
export default {
  name: "Dashboard",
  data: () => (
      {
      }
  ),
  computed: {
    ...mapGetters({
      user: "auth/getUser",
    }),

  },

};
</script>
