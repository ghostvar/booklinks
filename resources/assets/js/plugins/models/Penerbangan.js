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
    getPesawat(callback) {
        axios.get('/api/pesawat')
        .then(res => {
            callback(res.data)
        })
        .catch(err => error(err))
    },
    getPenerbangan(callback) {
        axios.get('/api/penerbangan')
        .then(res => {
            callback(res.data)
        })
        .catch(err => error(err))
    }
}