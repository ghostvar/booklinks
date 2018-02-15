import axios from './services/axios'

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

                    this.$store.commit('setPemesanan', [
                        { "id": "0", "name": "Rian", "booking_code": "ASM10293", "jenis": "Penerbangan", "created_at": "7 Mei 2018", "updated_at": "8 April 2017", "status": "", "status_pembayaran": "" },
                        { "id": "1", "name": "Fadli", "booking_code": "AAM102293", "jenis": "Kereta", "created_at": "14 April 2018", "updated_at": "2 Juni 2017", "status": "", "status_pembayaran": "" },
                        { "id": "2", "name": "Ahmad", "booking_code": "ASM10232", "jenis": "Kereta", "created_at": "02 Februari 2018", "updated_at": "28 November 2017", "status": "", "status_pembayaran": "" }
                    ]);
                    axios.get('/api/total').then(res => { this.$store.commit('setDataTotal', res.data) });
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