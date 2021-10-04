<template>
  <div>
    <header>
      <div class="px-3 py-2 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
              <BootstrapIcon
                  icon="bootstrap-fill"
                  variant="light"
                  size="3x" />
            </a>

            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
              <li>
                <router-link to="/" class="nav-link"><svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"/></svg> Home</router-link>

              </li>
              <li v-if="isAuth">
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"/></svg>
                  Dashboard
                </a>
              </li>
              <li v-if="isAuth">
                <a href="#" class="nav-link text-white">
                  <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#table"/></svg>
                  Orders
                </a>
              </li>
              <li>
                <router-link to="/catalog" class="nav-link"><svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#grid"/></svg> Catalog</router-link>
              </li>

              <li v-if="isAuth">
                <a href="#" class="nav-link text-white">
                  <font-awesome-icon icon="user-secret"></font-awesome-icon>
                  Customers
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="px-3 py-2 border-bottom mb-3">
        <div class="container d-flex flex-wrap justify-content-center">
          <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
          </form>

          <div class="text-end" v-if="isAuth">
            <button type="button" class="btn btn-light text-dark me-2">Logout</button>
            <button type="button" class="btn btn-primary">Yuor profile</button>
          </div>

          <div class="text-end" v-else>
            <router-link :to="{name: 'login'}">
              <button type="button" class="btn btn-light text-dark me-2">Login</button>
            </router-link>
            <button type="button" class="btn btn-primary">Sign-up</button>
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
})
}
</script>

<style>
svg.bi{
  color: white!important;
}
</style>