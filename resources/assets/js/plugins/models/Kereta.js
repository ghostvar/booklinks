import axios from '../services/axios'

export default {
    getTrains(callback) {
        axios.get('/api/kereta')
        .then(res =>  {
            callback(res.data)
        })
    },
    actionTrain(data, callback) {
        axios({
            method: (data.id ? 'put':'post'),
            url: '/api/kereta',
            data
        })
        .then(() => {
            callback()
        })
    },
    deleteTrain(id, callback) {
        axios.delete('/api/kereta/' + id)
        .then(res => {
            callback(res)
        })
    },

    getStasiun(callback) {
        axios.get('/api/stasiun')
        .then(res =>  {
            callback(res.data)
        })
    },
    actionStasiun(data, callback) {
        axios({
            method: (data.id ? 'put':'post'),
            url: '/api/stasiun',
            data
        })
        .then(() => {
            callback()
        })
    },
    deleteStasiun(id, callback) {
        axios.delete('/api/stasiun/' + id)
        .then(res => {
            callback(res)
        })
    },

    getJadwal(callback) {
        axios.get('/api/jurusan')
        .then(res => {
            callback(res.data);
        })
    },
    actionJadwal(data, callback) {
        axios({
            method: (data.id ? 'put':'post'),
            url: '/api/jurusan',
            data
        })
        .then(() => {
            callback()
        })
    },
    deleteJadwal(id, callback) {
        axios.delete('/api/jurusan/delete.' + id)
        .then(() => {
            callback();
        })
    },

    getTarifKereta(callback) {
        axios.get('/api/kereta/tarif')
        .then(res => {
            callback(res.data)
        })
    }
}