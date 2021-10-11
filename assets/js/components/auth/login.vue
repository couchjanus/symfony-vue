<template>
  <div>
    <div class="text-center form-body">
      <main class="form-signin">
        <form @submit.prevent="signIn">
          <h1 class="mb-3 h3 fw-normal">Please sign in</h1>

          <div class="form-floating">
            <input type="email" class="form-control" id="email-input" placeholder="name@example.com" v-model="form.email">
            <label for="email-input">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="password-input" placeholder="Password" v-model="form.password">
            <label for="password-input">Password</label>
          </div>

          <div class="mb-3 checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit"> Sign in</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
      </main>
    </div>
  </div>

</template>


<script>
import { mapActions } from "vuex";

export default {
  name: "Login",
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
    };
  },
  
  methods: {
    ...mapActions({
      login: "auth/login",
    }),
    
    signIn() {
        this.login(this.form).finally(()=>{
          this.$router.replace({
            name: "dashboard",
          });
        })
    },
  },
};
</script>

<style scoped></style>