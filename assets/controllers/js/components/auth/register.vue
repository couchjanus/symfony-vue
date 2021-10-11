<template>
  <div>
    <div class="text-center form-body">
      <main class="form-signin">
        <form @submit.prevent="signUp">
          <h1 class="mb-3 h3 fw-normal">Please Sign Up</h1>
          <div class="form-floating">
            <input type="email" class="form-control" id="email" placeholder="a@ex.com" v-model="form.email">
            <label for="email-input">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="pas" placeholder="Passwd" v-model="form.password">
            <label for="pas">Password</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit"> Sign Up</button>
        </form>
      </main>
    </div>

  </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
  name: "Register",
  data() {
    return {
      form: {
        email: '',
        password: ''
      }
    };
  },
  methods: {
    ...mapActions({
      register: "auth/register"
    }),
     signUp() {
      this.register(this.form).then(() => {
        console.log('Registered successfully');
        this.$router.replace({name: 'login'})
      })
    }
  }
}
</script>

<style scoped>

</style>