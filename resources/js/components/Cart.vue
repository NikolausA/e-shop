<template>
    <div class="cart">
        <router-link :to="{ name: 'catalog' }">
            <div class="link-to-catalog">Back to catalog</div>
        </router-link>
        <h2>Cart</h2>
        <cart-item
            v-for="(item, index) in cart_data"
            :key="item.id"
            :cart_item_data="item"
            @deleteFromCart="deleteFromCart(index)"
        />
    </div>
</template>

<script>
import CartItem from "./CartItem";
import { mapActions } from "vuex";

export default {
    name: "cart",
    components: {
        CartItem
    },
    props: {
        cart_data: {
            type: Array,
            default() {
                return [];
            }
        }
    },
    methods: {
        ...mapActions(["DELETE_FROM_CART"]),
        deleteFromCart(index) {
            this.DELETE_FROM_CART(index);
        }
    }
};
</script>

<style>
.link-to-catalog {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 8px;
    border: solid 1px #aeaeae;
}
</style>
