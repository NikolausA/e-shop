import Vue from "vue";
import Router from "vue-router";
import Catalog from "../components/Catalog.vue";
import Cart from "../components/Cart.vue";
import OrderForm from "../components/OrderForm";
import Register from "../components/Register";
import Login from "../components/Login";

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
        },
        {
            path: "/order",
            name: "order-form",
            component: OrderForm,
            props: true
        },
        {
            path: "/register",
            name: "register",
            component: Register,
            props: true
        },
        {
            path: "/login",
            name: "login",
            component: Login,
            props: true
        }
    ]
});

export default router;
