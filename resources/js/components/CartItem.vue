<template>
    <div>
        <b-card no-body class="overflow-hidden" style="max-width: 540px;">
            <b-row no-gutters>
                <b-col md="6">
                    <b-card-img src="https://picsum.photos/400/400/?image=20" alt="Image" class="rounded-0"></b-card-img>
                </b-col>
                <b-col md="6">
                    <b-card-body :title="cart_item_data.name">
                        <b-card-text>
                            Price: {{ cart_item_data.price }}
                        </b-card-text>
                        <b-card-text>
                            Quantity: {{ cart_item_data.quantity }}
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
        }
    },
    mounted() {}
};
</script>
