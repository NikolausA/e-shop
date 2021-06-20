<template>
    <div class="cart-item">
        <img src="" alt="" />
        <div class="cart-item-info">
            <p>{{ cart_item_data.id }}</p>
            <p class="cart-item-name">{{ cart_item_data.name }}</p>
            <p class="cart-item-price">Price: {{ cart_item_data.price }}</p>
        </div>
        <div class="cart-item-quantity">
            <p>Quantity:</p>
            {{ cart_item_data.quantity }}
        </div>
        <button @click="deleteFromCart">Delete</button>
    </div>
</template>

<script>
export default {
    name: "cart-item",
    props: {
        cart_item_data: {
            type: Object,
            default() {
                return {};
            }
        }
    },
    methods: {
        deleteFromCart() {
            this.$emit("deleteFromCart");
        }
    },
    mounted() {}
};
</script>

<style scoped>
.cart-item {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 0 8px 0 #e0e0e0;
    padding: 8px;
    margin-bottom: 8px;
}
</style>
