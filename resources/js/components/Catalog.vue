<template>
    <div class="catalog">
        <router-link :to="{ name: 'cart', params: { cart_data: CART } }">
            <div class="link-to-cart">Cart: {{CART.length}}</div>
        </router-link>
        <h2 class="catalog-title">Catalog</h2>
        <div class="catalog-list">
            <catalog-item
                v-for="product in PRODUCTS"
                :key="product.id"
                :product_data="product"
                @addToCart="addToCart"
            />
        </div>
    </div>
</template>

<script>
import CatalogItem from "./CatalogItem.vue";
import { mapActions, mapGetters } from "vuex";

export default {
    name: "catalog",
    components: {
        CatalogItem
    },
    data() {
        return {
            products: []
        };
    },
    computed: {
        ...mapGetters(["PRODUCTS", "CART"])
    },
    methods: {
        ...mapActions(["GET_PRODUCTS", "ADD_TO_CART"]),
        addToCart(data) {
            this.ADD_TO_CART(data);
        }
    },
    mounted() {
        this.GET_PRODUCTS().then(response => {
            if (response.data) {
                console.log(response.data.product);
            }
        });
    }
};
</script>

<style>
.catalog-title {
    margin: 0 auto;
}
.catalog-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}
.link-to-cart {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 8px;
    border: solid 1px #aeaeae;
}
</style>
