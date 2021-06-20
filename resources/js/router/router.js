import Vue from "vue";
import Router from "vue-router";
import Catalog from "../components/Catalog.vue";
import Cart from "../components/Cart.vue";

Vue.use(Router);

let router = new Router({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "catalog",
            component: Catalog
        },
        {
            path: "/cart",
            name: "cart",
            component: Cart,
            props: true
        }
    ]
});

export default router;
