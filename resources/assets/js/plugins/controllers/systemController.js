import dateFormat from '../services/dateformat'

export default {
    getTime() {
        this.$store.commit('setDate', dateFormat(new Date(), "dddd, dd mmmm yyyy, HH:MM:ss"));
    },
    logout() {
        if (confirm('Yakin Keluar ?')) {
            sessionStorage.removeItem("token");
            window.location = '/login'
        }
    }
}