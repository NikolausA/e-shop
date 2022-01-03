<template>
    <div>
        <b-container>
            <b-row>
                <b-col>
                    <b-card
                        border-variant="primary"
                        header="Form for adding new product"
                        header-bg-variant="primary"
                        header-text-variant="white"
                        align="center"
                    >
                        <b-form @submit="onSubmit" @reset="onReset">
                            <b-form-group
                                id="input-group-1"
                                label="Product name:"
                                label-for="input-1"
                            >
                                <b-form-input
                                    id="input-1"
                                    v-model="name"
                                    type="text"
                                    placeholder="Enter name"
                                    required
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group
                                id="input-group-2"
                                label="Product slug:"
                                label-for="input-2"
                            >
                                <b-form-input
                                    id="input-2"
                                    v-model="slug"
                                    type="text"
                                    placeholder="Enter slug"
                                    required
                                ></b-form-input>
                            </b-form-group>
                            <b-form-group
                                id="input-group-3"
                                label="Category:"
                                label-for="input-3"
                            >
                                <b-form-select
                                    id="input-3"
                                    v-model="category"
                                    :options="categories"
                                    required
                                ></b-form-select>
                            </b-form-group>
                            <b-form-group
                                id="textarea"
                                label="Description:"
                                label-for="textarea"
                            >
                                <b-form-textarea
                                    id="textarea"
                                    v-model="description"
                                    placeholder="Enter product description"
                                    rows="3"
                                    max-rows="6"
                                ></b-form-textarea>
                            </b-form-group>

                            <b-form-file
                                v-model="file"
                                @change="onChange"

                                placeholder="Choose a file or drop it here..."
                            ></b-form-file>

                            <b-button type="submit" variant="primary"
                                >Submit</b-button
                            >
                            <b-button type="reset" variant="danger"
                                >Reset</b-button
                            >
                        </b-form>
                    </b-card>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
import Vue from "vue";
import axios from "axios";

export default {
    name: "admin-add-product",
    data() {
        return {
            name: "",
            slug: "",
            category: "",
            description: "",
            categories: [
                { text: "Select One", value: null },
                "Male",
                "Female",
                "Smart"
            ],
            file: null
        };
    },
    methods: {
        onChange(e) {
            this.file = e.target.files[0];
            console.log(this.file);
        },
        onSubmit(e) {
            e.preventDefault()
            const config = {'content-type': 'multipart/form-data'}
            const formData = new FormData()
            formData.append('name', this.name);
            formData.append('slug', this.slug);
            formData.append('category', this.category);
            formData.append('description', this.description);
            formData.append('file', this.file);

            axios.post('/api/admin/products', formData, config)
            .then(response => console.log(response.data))
            .catch(error => console.log(error.message))
        },
        onReset(e) {
            e.preventDefault()
            this.name = '',
            this.slug = '',
            this.category = '',
            this.description = '',
            this.file = null
        }
    }
};
</script>
