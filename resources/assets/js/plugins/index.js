import data from './data.json'
import Pelanggan from './models/Pelanggan'
import Kereta from './models/Kereta'
import Penerbangan from './models/Penerbangan'

import pelangganController from './controllers/pelangganController'
import pemesanController from './controllers/pesananController'
import keretaController from './controllers/keretaController'
import penerbanganController from './controllers/penerbanganController'
import systemController from './controllers/systemController'

export default {
    install(Vue, options) {
        Vue.mixin({ methods: pelangganController });
        Vue.mixin({ methods: pemesanController });
        Vue.mixin({ methods: keretaController });
        Vue.mixin({ methods: systemController });
        Vue.mixin({ methods: penerbanganController });
        Vue.mixin({
            data() {
                return {
                    date: '',
                    modal: false,
                    used: ''
                }
            },
            methods: {
                init() {
                    console.info('Data Initialize!')
                    this.getTime();
                    setInterval(() => {
                        this.getTime();
                    }, 1000)

                    this.$store.commit('setPemesanan', data.pemesanan);
                    Pelanggan.getCostumers(data => { this.$store.commit('setPelanggan', data) });
                    Kereta.getStasiun(data => { this.$store.commit('setStasiun', data); });
                    Kereta.getTrains(data => { this.$store.commit('setKereta', data); });
                    Kereta.getJadwal(data => { this.$store.commit('setJadwalKereta', data); });

                    Penerbangan.getBandara(data => { this.$store.commit('setBandara', data); });
                    Penerbangan.getPesawat(data => { this.$store.commit('setPesawat', data); });
                    Penerbangan.getPenerbangan(data => { this.$store.commit('setPenerbangan', data); });
                }
            },
            beforeCreate() {
                if (!sessionStorage.getItem("token")) {
                    window.location = '/login'
                }
            }
        });
    }
}