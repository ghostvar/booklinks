import axios from './axios'

function error (err) {
    if (err.response.status == 401) {
        sessionStorage.removeItem("token");
        window.location = '/login'
    } else {
        console.error(err)
    }
}

export default {
    getCostumers: function (callback) {
        axios.get('/api/pelanggan')
        .then(response => {
            callback(response.data)
        })
        .catch(err => { error(err) })
    },
    deleteCostumers: function (id, callback) {
        axios.delete('/api/pelanggan/' + id)
        .then(response => {
            callback(response)
        })
        .catch(err => { error(err) })
    }
}