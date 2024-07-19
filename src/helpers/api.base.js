import axios from "axios";

class Api {
    constructor(apiName) {
        this.apiUrl = 'http://localhost/fab/api/public/api/';
        this.apiName = apiName;
    }
    getAll() {
        return axios.get(this.apiUrl + this.apiName);
    }

    create(entity) {
        return axios.post(this.apiUrl + this.apiName, entity);
    }

}
export default Api;
