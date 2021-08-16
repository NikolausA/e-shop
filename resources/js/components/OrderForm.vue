<template>
    <div>
        <h5>Заполните контактные данные</h5>
        <b-form>
            <b-form-group
                id="input-group-1"
                label="Name:"
                label-for="input-1"
                description="We'll never share your name with anyone else."
            >
                <b-form-input
                id="input-1"
                v-model="name"
                type="text"
                placeholder="put your name down"
                required
                ></b-form-input>
            </b-form-group>
            <b-form-group id="input-group-2" label="Your Phone:" label-for="input-2">
                <b-form-input
                id="input-2"
                v-model="phone"
                placeholder="Enter phone"
                required
                ></b-form-input>
            </b-form-group>
        </b-form>
        <div>
            <b-button variant="outline-primary" class="mt-4" @click.prevent="setOrder">Оформить заказ</b-button>
        </div>
    </div>
</template>

<script>
import Vue from "vue";
import axios from "axios";

export default {
    name: "order-form",
    data() {
        return {
            name: "",
            phone: ""
        };
    },
    props: {
        order: {
            type: Array,
            default() {
                return [];
            }
        }
    },
    methods: {
        setOrder() {
            axios
            .post('api/order', {
                name: this.name,
                phone: this.phone,
                order: this.order
            })
            .then(res => console.log(res))
            .catch(err => console.log('I have got error:', err))
        }
    },
    mounted() {}
}
</script>

