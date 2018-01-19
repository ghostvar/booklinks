import dateFormat from '../services/dateformat'

export default {
    getTime() {
        this.$store.commit('setDate', dateFormat(new Date(), "dddd, dd mmmm yyyy, HH:MM:ss"));
    }
}