import Api from "./api.base.js";

class CategoryApi extends Api {

    constructor() {
        super('category');
    }

    get() {
        return axios.get(apiUrl + '/category');
    }
}


export default CategoryApi;