
import ProductApi from "./product.api.js";
import Api from "./api.base.js";
import axios from "axios";

let apiUrl = 'http://localhost/fab/api/public/api';

export default {

    product: {
        create(entity) {
            axios.post(apiUrl + '/product', entity);
        },
        
        get() {
            return axios.get(apiUrl + '/product');
        },

        delete(product_id){
            return axios.delete(apiUrl + '/product/' + product_id);
        },

        update(id, entity) {
            return axios.patch(apiUrl + '/product/' + id, entity);
        }
    },

    // store: new Api('store'),
    store: {
        get() {
            return axios.get(apiUrl + '/store');
        }
    },

    // category: new Api('category'),
    category: {
        get() {
            return axios.get(apiUrl + '/category');
        }
    },

}