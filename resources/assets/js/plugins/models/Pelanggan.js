import axios from '../services/axios'

export default {
    getCostumers: function (callback) {
        axios.get('/api/pelanggan')
        .then(response => {
            callback(response.data)
        })
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
    },
    deleteCostumer: function (id, callback) {
        axios.delete('/api/pelanggan/' + id)
        .then(response => {
            callback(response)
        })
    }
}