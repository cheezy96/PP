
import ProductApi from "./product.api.js";
import Api from "./api.base.js";
import axios from "axios";
let apiUrl = 'http://localhost/fab/api/public/api';

export default {

    product: {
        create(entity) {
            axios.post(apiUrl + '/product', entity);
        }
    },

    store: new Api('store'),

    category: new Api('category'),

}