<template>
  <div>
    <header>
      <div class="px-3 py-2 text-white bg-dark">
        <div class="container">
          <div class="flex-wrap d-flex align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="my-2 text-white d-flex align-items-center my-lg-0 me-lg-auto text-decoration-none">
              <i class="fas fa-home"></i>
            </a>

            <ul class="my-2 nav col-12 col-lg-auto justify-content-center my-md-0 text-small">
              <li>
                <router-link to="/" class="nav-link">
                <font-awesome-icon icon="home" /> Home</router-link>
              </li>
              <li v-if="isAuth">
                <a href="#" class="text-white nav-link">
                  <font-awesome-icon icon="tachometer-alt" />
                  Dashboard 
                </a>
              </li>
              <li v-if="isAuth">
                <a href="#" class="text-white nav-link">
                  <font-awesome-icon icon="info-circle" />
                  Orders
                </a>
              </li>
              <li>
                <router-link to="/catalog" class="nav-link">
                
                <font-awesome-icon icon="folder-open" /> Catalog</router-link>
              </li>

              <li v-if="isAuth">
                <a href="#" class="text-white nav-link">
                <font-awesome-icon icon="user" />
                  Customers
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="px-3 py-2 mb-3 border-bottom">
        <div class="container flex-wrap d-flex justify-content-center">
          <form class="mb-2 col-12 col-lg-auto mb-lg-0 me-lg-auto">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
          </form>

          <div class="text-end" v-if="isAuth">
            <button type="button" @click="logout" class="btn btn-light text-dark me-2">
            <font-awesome-icon icon="sign-out-alt" />
             Logout</button>
            <button type="button" class="btn btn-primary">Yuor profile</button>
          </div>

          <div class="text-end" v-else>
            <router-link :to="{ name: 'login' }">
              <button type="button" class="btn btn-light text-dark me-2">
              
              <font-awesome-icon icon="sign-in-alt" />
               Sign in</button>
            </router-link>
            
            <router-link :to="{ name: 'register' }">
              <button type="button" class="btn btn-primary">
              <font-awesome-icon icon="user-plus" />
               Sign up</button>
            </router-link>
            
          </div>
        </div>
      </div>
    </header>
  </div>

</template>

<script>
export default {
  name: "NavbarComponent",

data: () => ({
  isAuth: false,
}),


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
}
</script>

<style>
svg.bi{
  color: white!important;
}
</style>