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
            @increment=increment(index)
            @decrement=decrement(index)
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
        ...mapActions(["DELETE_FROM_CART", "INCREMENT_QUANTITY", "DECREMENT_QUANTITY"]),
        increment(index) {
            this.INCREMENT_QUANTITY(index);
        },
        decrement(index) {
            this.DECREMENT_QUANTITY(index)
        },
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
