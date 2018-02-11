import axios from '../services/axios'

function error (err) {
    if (err.response.status == 401) {
        sessionStorage.removeItem("token");
        window.location = '/login'
    } else {
        //console.error(err)
        if(err.response.data.message) {
            alert(err.response.data.message)
        }
    }
}

export default {
    getBandara(callback) {
        axios.get('/api/bandara')
        .then(res =>  {
            callback(res.data)
        })
        .catch(err => { error(err) })
    },
    actionBandara(data, callback) {
        axios({
            method: (data.id ? 'put':'post'),
            url: '/api/pesawat',
            data
        })
        .then(res => {
            callback(res.data)
        })
        .catch(err => error(err))
    },
    deleteBandara(id, callback) {
        axios.delete('/api/bandara/' + id)
        .then(res => {
            callback()
        })
        .catch(err => { error(err) })
    },

    getPesawat(callback) {
        axios.get('/api/pesawat')
        .then(res => {
            callback(res.data)
        })
        .catch(err => error(err))
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
        .catch(err => error(err))
    },
    deletePesawat(id, callback) {
        axios.delete('/api/pesawat/' + id)
        .then(res => {
            callback(res.data)
        })
        .catch(err => { error(err) })
    },

    getPenerbangan(callback) {
        axios.get('/api/penerbangan')
        .then(res => {
            callback(res.data)
        })
        .catch(err => error(err))
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
        .catch(err => error(err))
    },
    deletePenerbangan(id, callback) {
        axios.delete('/api/penerbangan/' + id)
        .then(res => {
            callback(res.data)
        })
        .catch(err => { error(err) })
    }
}