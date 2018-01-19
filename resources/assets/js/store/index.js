import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export default new Vuex.Store({
    strict: true,
    state: {
        date: '',
        modal: false,
        pemesanan: [],
        pelanggan: [],
        stasiun: [],
        kereta: [],
        jadwalKereta: []
    },
    mutations: {
        setModal(state, data) {
            state.modal = data
        },
        setDate(state, data) {
            state.date = data
        },
        setPemesanan(state, data) {
            state.pemesanan = data
        },
        setPelanggan(state, data) {
            state.pelanggan = data
        },
        setStasiun(state, data) {
            state.stasiun = data
        },
        setKereta(state, data) {
            state.kereta = data
        },
        setJadwalKereta(state, data) {
            state.jadwalKereta = data
        }
    },
    actions: {
        
    }
})