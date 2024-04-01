import axios from "axios";

const api = axios.create()
const token = localStorage.getItem('access_token')
//start
api.interceptors.request.use(config => {
    if (token) {
        config.headers.authorization = `Bearer ${token}`

    } else {
        console.log('Token not found');
    }
    return config;
}, error => {
    console.log(error.response)
});
//end
api.interceptors.response.use(config => {
        if (token) {
            config.headers.authorization = `Bearer ${token}`

        } else {
            console.log('Token not found');
        }
        return config;
    },
    error => {
        if (error.response.data.message === 'Token has expired') {
            try {
                axios.post('http://127.0.0.1:8000/api/auth/refresh', {}, {
                    headers: {
                        'authorization': `Bearer ${token}`
                    }
                }).then(res => {
                    localStorage.setItem('access_token', res.data.access_token)
                    error.config.headers.authorization = `Bearer ${token}`
                });
                    //return api.request(error.config)
            } catch (error) {
                console.error('Error refresh', error.response);
            }
        }

    })

export default api