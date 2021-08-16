<template>
    <div>
        <b-card no-body class="overflow-hidden" style="max-width: 540px; max-height: 200px;">
            <b-row no-gutters>
                <b-col md="6">
                    <b-card-img src="https://picsum.photos/200" alt="Image" class="rounded-0"></b-card-img>
                </b-col>
                <b-col md="6">
                    <b-card-body :title="cart_item_data.name">
                        <b-card-text>
                            Price: {{ cart_item_data.price }}
                        </b-card-text>
                        <b-card-text>
                            Quantity: {{ cart_item_data.quantity }}
                            <b-icon-plus-square-fill scale="1.5" class="mr-2 ml-5" @click="incrementQuantity"></b-icon-plus-square-fill>
                            <b-icon-dash-square-fill scale="1.5" @click="decrementQuantity"></b-icon-dash-square-fill>
                        </b-card-text>
                        <b-icon-trash-fill scale="2" @click="deleteFromCart"></b-icon-trash-fill>
                    </b-card-body>
                </b-col>
            </b-row>
        </b-card>
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
        },
        incrementQuantity() {
            this.$emit("increment")
        },
        decrementQuantity() {
            this.$emit("decrement")
        }
    },
    mounted() {}
};
</script>
