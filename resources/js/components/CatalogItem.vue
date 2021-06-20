<template>
    <div class="catalog-item">
        <img src="" alt="" />
        <p class="catalog-item-name">{{ product_data.name }}</p>
        <p class="catalog-item-price">Price: {{ product_data.price }}</p>
        <button class="cart-btn" @click="addToCart">Add to cart</button>
    </div>
</template>

<script>
export default {
    name: "catalog-item",
    props: {
        product_data: {
            type: Object,
            default() {
                return {};
            }
        }
    },
    data() {
        return {};
    },
    methods: {
        addToCart() {
            this.$emit("addToCart", this.product_data);
        }
    },
    mounted() {
        this.$set(this.product_data, "quantity", 1);
    }
};
</script>

<style>
.catalog-item {
    flex-basis: 25%;
    box-shadow: 0 0 8px 0 #e0e0e0;
    padding: 16px;
    margin-bottom: 16px;
}
</style>
