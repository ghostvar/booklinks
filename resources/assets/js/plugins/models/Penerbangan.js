import axios from '../services/axios'

export default {
    getBandara(callback) {
        axios.get('/api/bandara')
        .then(res =>  {
            callback(res.data)
        })
    },
    actionBandara(data, callback) {
        axios({
            method: (data.id ? 'put':'post'),
            url: '/api/bandara',
            data
        })
        .then(res => {
            callback(res.data)
        })
    },
    deleteBandara(id, callback) {
        axios.delete('/api/bandara/' + id)
        .then(res => {
            callback()
        })
    },

    getPesawat(callback) {
        axios.get('/api/pesawat')
        .then(res => {
            callback(res.data)
        })
    },
    actionPesawat(data, callback) {
        axios({
            method: (data.id ? 'put':'post'),
            url: '/api/pesawat',
            data
        })
        .then(res => {
            callback(res.data)
        })
    },
    deletePesawat(id, callback) {
        axios.delete('/api/pesawat/' + id)
        .then(res => {
            callback(res.data)
        })
    },

    getPenerbangan(callback) {
        axios.get('/api/penerbangan')
        .then(res => {
            callback(res.data)
        })
    },
    actionPenerbangan(data, callback) {
        axios({
            method: (data.id ? 'put':'post'),
            url: '/api/penerbangan',
            data
        })
        .then(res => {
            callback(res)
        })
    },
    deletePenerbangan(id, callback) {
        axios.delete('/api/penerbangan/' + id)
        .then(res => {
            callback(res.data)
        })
    }
}