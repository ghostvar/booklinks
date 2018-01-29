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
    getTrains(callback) {
        axios.get('/api/kereta')
        .then(res =>  {
            callback(res.data)
        })
        .catch(err => { error(err) })
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
        .catch(err => { error(err) })
    },
    deleteTrain(id, callback) {
        axios.delete('/api/kereta/' + id)
        .then(res => {
            callback(res)
        })
        .catch(err => { error(err) })
    },

    getStasiun(callback) {
        axios.get('/api/stasiun')
        .then(res =>  {
            callback(res.data)
        })
        .catch(err => { error(err) })
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
        .catch(err => { error(err) })
    },
    deleteStasiun(id, callback) {
        axios.delete('/api/stasiun/' + id)
        .then(res => {
            callback(res)
        })
        .catch(err => { error(err) })
    },

    getJadwal(callback) {
        axios.get('/api/jurusan')
        .then(res => {
            callback(res.data);
        })
        .catch(err => { error(err) })
    }
}