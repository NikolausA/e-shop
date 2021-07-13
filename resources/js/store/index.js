import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

let store = new Vuex.Store({
    state: {
        products: [],
        cart: []
    },
    mutations: {
        SET_PRODUCTS(state, products) {
            state.products = products;
        },
        SET_CART(state, product) {
            let indexProductInCart = state.cart.findIndex(item => item.id === product.id);
            if (indexProductInCart !== -1) {
                state.cart[indexProductInCart].quantity++;
                return;
            }
            product.quantity = 1;
            state.cart.push(product);
        },
        INCREMENT(state, index) {
            state.cart[index].quantity++;
        },
        DECREMENT(state, index) {
            if(state.cart[index].quantity > 1) {
                state.cart[index].quantity--;
            }
        },
        REMOVE_FROM_CART(state, index) {
            state.cart.splice(index, 1);
        }
    },
    actions: {
        GET_PRODUCTS({ commit }) {
            return axios
                .get("api/products")
                .then(products => {
                    commit("SET_PRODUCTS", products.data.product);
                    return products;
                })
                .catch(error => {
                    console.log(error);
                    return error;
                });
        },
        ADD_TO_CART({ commit }, product) {
            commit('SET_CART', product)
        },
        INCREMENT_QUANTITY({commit}, index) {
            commit("INCREMENT", index);
        },
        DECREMENT_QUANTITY({commit}, index) {
            commit("DECREMENT", index)
        },
        DELETE_FROM_CART({ commit }, index) {
            commit("REMOVE_FROM_CART", index);
        }
    },
    getters: {
        PRODUCTS(state) {
            return state.products;
        },
        CART(state) {
            return state.cart;
        }
    }
});

export default store;
