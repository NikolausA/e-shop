<template>
    <div>
        <b-form @submit="onSubmit" @reset="onReset">
            <b-form-group
                id="input-group-1"
                label="Email address:"
                label-for="input-1"
                description="We'll never share your email with anyone else."
            >
                <b-form-input
                id="input-1"
                v-model="email"
                type="email"
                placeholder="Enter email"
                required
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-3" label="Your Password:" label-for="input-2">
                <b-form-input
                id="input-3"
                v-model="password"
                type="password"
                placeholder="Enter password"
                required
                ></b-form-input>

                <b-button type="submit" variant="primary">Submit</b-button>
                <b-button type="reset" variant="danger">Reset</b-button>
            </b-form-group>
        </b-form>
    </div>
</template>

<script>
import Vue from 'vue';
import axios from 'axios';

export default {
    name: 'login',
    data() {
        return {
            email: '',
            password: ''
        };
    },
    methods: {
        onSubmit(e) {
            e.preventDefault()
            if (this.password.length > 0) {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('api/login', {
                        name: this.name,
                        email: this.email,
                        password: this.password
                    })
                        .then(response => {
                            console.log(response.data)
                            if (response.data.success) {
                                this.$router.go = "/"
                            } else {
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
            }
        },
        onReset(e) {
            e.preventDefault()
            this.name = '',
            this.email = '',
            this.password = ''
        }
    }
}
</script>
