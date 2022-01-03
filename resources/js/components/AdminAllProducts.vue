<template>
    <div>
        <b-table :products="products">

        </b-table>
    </div>
</template>

<script>
import Vue from "vue";
import { mapGetters } from "vuex";

export default {
    name: 'admin-all-products',
    data() {
        return {
            products: []
        }
    },
    computed: {
        ...mapGetters(["PRODUCTS"])
    },
    methods: {},
    mounted() {
        for (let key in this.PRODUCTS) {
            this.products.push(this.PRODUCTS[key])
            // console.log(this.PRODUCTS[key])
        }
        // this.products = this.PRODUCTS
        console.log(this.products)
        // console.log(this.PRODUCTS)
    }
}
</script>
