import axios from "axios";
import useUserStore from "../store";

const axiosClient = axios.create({
    //baseURL: 'http://localhost:8000/api'
    baseURL: 'https://form.jolustan.com/api'
})

axiosClient.interceptors.request.use(config => {
    config.headers.Authorization = `Bearer ${useUserStore().user.token}`
    config.headers['Content-Type'] = 'multipart/form-data'
    config.headers['Accept'] = "application/json"
    return config;
})

export default axiosClient
