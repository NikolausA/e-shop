<template>
    <div>
        <b-card
            :title="product_data.name"
            img-src="https://picsum.photos/600/300/?image=7"
            img-alt="Image"
            img-top
            tag="article"
            style="max-width: 18rem;"
            class="mb-2"
        >
            <b-card-text>
                {{ product_data.price }}
            </b-card-text>
            <b-button href="#" variant="primary" @click.prevent="addToCart(product_data)">Add to cart</b-button>
        </b-card>
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
