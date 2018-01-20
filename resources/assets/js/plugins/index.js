import data from './data.json'
import Pelanggan from './models/Pelanggan'
import Kereta from './models/Kereta'

import pelangganController from './controllers/pelangganController'
import pemesanController from './controllers/pesananController'
import keretaController from './controllers/keretaController'
import systemController from './controllers/systemController'

export default {
    install(Vue, options) {
        Vue.mixin({ methods: pelangganController });
        Vue.mixin({ methods: pemesanController });
        Vue.mixin({ methods: keretaController });
        Vue.mixin({ methods: systemController });
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
                    this.$store.commit('setJadwalKereta', data.jadwalKereta);
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