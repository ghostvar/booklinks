import axios from '../services/axios'

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
    actionCostumer: function (data, callback) {
        axios({
            method: (data.id ? 'put':'post'),
            url: '/api/pelanggan',
            data
        })
        .then(response => {
            callback(response.data)
        })
        .catch(err => { error(err) })
    },
    deleteCostumer: function (id, callback) {
        axios.delete('/api/pelanggan/' + id)
        .then(response => {
            callback(response)
        })
        .catch(err => { error(err) })
    }
}