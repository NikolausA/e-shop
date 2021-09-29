<template>
    <div class="main-wrapper">
        <b-navbar class="main-menu" toggleable="md" type="dark">
            <b-navbar-brand href="#">𝔹𝔼𝕊𝕋 𝕎𝔸𝕋ℂℍ𝔼𝕊</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav>
        <b-nav-item href="#">
            <router-link :to="{name: 'catalog'}" class="nav-link">
                        Catalog
            </router-link>
        </b-nav-item>
        <b-nav-item href="#">
            <router-link :to="{name: 'register'}" class="nav-link">
                Register
            </router-link>
        </b-nav-item>
        <b-nav-item href="#">
            <router-link :to="{name: 'login'}" class="nav-link">
                Login
            </router-link>
        </b-nav-item>
        <!-- <b-nav-item href="#" disabled>Disabled</b-nav-item> -->
      </b-navbar-nav>

      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <b-nav-form>
          <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
          <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
        </b-nav-form>

        <!-- <b-nav-item-dropdown text="Lang" right>
          <b-dropdown-item href="#">EN</b-dropdown-item>
          <b-dropdown-item href="#">ES</b-dropdown-item>
          <b-dropdown-item href="#">RU</b-dropdown-item>
          <b-dropdown-item href="#">FA</b-dropdown-item>
        </b-nav-item-dropdown> -->

        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            <em>User</em>
          </template>
          <b-dropdown-item href="#">Profile</b-dropdown-item>
          <b-dropdown-item href="#">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
        <router-link :to="{name: 'cart', params: { cart_data: CART } }">
            <b-icon-cart4 scale="2" class="mr-2" style="color: white;"></b-icon-cart4>
            <span style="color: white;" class="counter basket-count red">{{CART.length}}</span>

        </router-link>
    </b-navbar>

        <keep-alive>
            <router-view></router-view>
        </keep-alive>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

export default {
    name: "main-wrapper",
    components: {},
    props: {},
    data() {
        return {
            title: "Main page"
        };
    },
    computed: {
        ...mapGetters([ "CART" ])
    }
};
</script>

<style scoped>
.main-menu {
    background-color: #F81029;
}
</style>
