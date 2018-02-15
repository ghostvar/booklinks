import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export default new Vuex.Store({
    strict: true,
    state: {
        date: '',
        dataTotal: {},
        modal: false,
        pemesanan: [],
        pelanggan: [],
        stasiun: [],
        kereta: [],
        jadwalKereta: [],
        bandara: [],
        pesawat: [],
        penerbangan: []
    },
    mutations: {
        setDataTotal(state, data) {
            state.dataTotal = data
        },
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
        },
        setBandara(state, data) {
            state.bandara = data
        },
        setPesawat(state, data) {
            state.pesawat = data
        },
        setPenerbangan(state, data) {
            state.penerbangan = data
        }
    },
    getters: {
        pelanggan(state) {
            return state.pelanggan
        },
        pemesanan(state) {
            return state.pemesanan
        },
        pelanggan(state) {
            return state.pelanggan
        },
        stasiun(state) {
            return state.stasiun
        },
        kereta(state) {
            return state.kereta
        },
        jadwalKereta(state) {
            return state.jadwalKereta
        },
        bandara(state) {
            return state.bandara
        },
        pesawat(state) {
            return state.pesawat
        },
        penerbangan(state) {
            return state.penerbangan
        }
    },
    actions: {

    }
})