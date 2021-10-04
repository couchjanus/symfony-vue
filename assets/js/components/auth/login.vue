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
// import { mapActions } from "vuex";
import HttpService from "@/services/httpService";
export default {
  name: "Login",
  data() {
    return {
      form: {
        email: "johndoe@my.cat",
        password: "test",
      },
    };
  },
  
  methods: {
    // ...mapActions({
    //   login: "auth/login",
    // }),
    
    // signIn() {
    //     console.log({ email: this.form.email });
    //     this.$router.replace({
    //       name: "dashboard",
    //     });
    // },

    // POST request using axios with async/await
    // async signIn() {
    //   console.log({ email: this.form.email, password: this.form.password });
    //   const response = await axios.post("http://localhost:8000/api/login_check", 
    //                  {"username":this.form.email,"password":this.form.password});
      
    //   console.log(response);
      
    //   this.$router.replace({
    //     name: "dashboard",
    //   });
      
    // },

    // HttpService

    // async signIn() {
    //   // console.log({ email: this.form.email, password: this.form.password });
    //   const response = await HttpService.login_check( {"username":this.form.email, "password":this.form.password});
      
    //   console.log(response);
      
    //   this.$router.replace({
    //     name: "dashboard",
    //   });
      
    // },

    async signIn() {
      console.log({ email: this.form.email, password: this.form.password });
      const response = await HttpService.login_check(
      {
        "username":this.form.email, 
        "password":this.form.password
      })
      .catch((e)=>{
        console.log(e);
      });
      
      console.log(response);
      
      this.$router.replace({
        name: "dashboard",
      });
      
    },
  
    

  },
};
</script>

<style scoped></style>