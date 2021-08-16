require("./bootstrap");
window.Vue = require("vue").default;

import store from "./store/index";
import MainWrapper from "./components/MainWrapper.vue";
import router from "./router/router";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";

// Import Bootstrap an BootstrapVue CSS files (order is important)
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue);

// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

Vue.component("main-wrapper", require("./components/MainWrapper.vue").default);

const app = new Vue({
    el: "#app",
    store,
    router
});
