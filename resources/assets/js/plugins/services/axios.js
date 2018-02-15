import axios from 'axios'
var api = axios.create({
    headers: {
        'Authorization': sessionStorage.getItem("token")
    }
})

api.interceptors.response.use(function (response) {
    // Do something with response data
    if (response.headers.authorization) {
        sessionStorage.setItem = response.headers.authorization
        console.log('Token has Resfresh!')
    }
    return response;
}, function (err) {
    // Do something with response error
    if (err.response.status == 401) {
        sessionStorage.removeItem("token");
        window.location = '/login'
    } else {
        //console.error(err)
        if(err.response.data.message) {
            alert(err.response.data.message)
        }
    }
    //return Promise.reject(error);
});

export default api;