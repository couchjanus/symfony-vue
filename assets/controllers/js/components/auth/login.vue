<template>
<div>
  <div class="text-center form-body">
    <main class="form-signin">
      <form @submit.prevent="signIn">
        <h1 class="mb-3 h3 fw-normal">Please sign in</h1>
        <div class="form-floating">
          <input type="email" class="form-control" id="email" placeholder="a@ex.com" v-model="form.email">
          <label for="email-input">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="pas" placeholder="Passwd" v-model="form.password">
          <label for="pas">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit"> Sign in</button>
      </form>
    </main>
  </div>

</div>
</template>

<script>
import HttpService from '@/services/httpService';
export default {
  name: "login",
  data(){
    return {
      form:{
        email: '',
        password: ''
      }
  };
  },
  methods:{
    async signIn(){
      // console.log({email: this.form.email, password:this.form.password});
      const response = await HttpService.login_check(
          {
            "username": this.form.email,
            "password": this.form.password
          }
      ).catch(e=>console.log(e));
      console.log(response);
    //
      this.$router.replace({name: 'dashboard'})
    }
  }
}
</script>

<style scoped>

</style>