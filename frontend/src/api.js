import axios from "axios";

const api = axios.create()
const token = localStorage.getItem('access_token')
api.interceptors.request.use(config => {
    if(token)
    {
        config.headers.authorization = `Bearer ${token}`

    } else{
        console.log('Token not found');
    }
    return config;
}, error => {
    console.log(error.response)
});

export default api