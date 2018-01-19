import axios from './axios'

export default {
    pelanggan: function (callback) {
        axios.get('/api/pelanggan')
        .then(response => {
            callback(response.data)
        })
        .catch(err => {
            if (err.response.status == 401) {
                sessionStorage.removeItem("token");
                window.location = '/login'
            }
        })
    }
}