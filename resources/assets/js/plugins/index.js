import dateFormat from './dateformat'
import data from './data.json'
export default {
    install(Vue, options) {
        Vue.mixin({
            data() {
                return {
                    date: '',
                    pemesanan: {
                        data: [],
                        selected: ''
                    },
                    pelanggan: {
                        data: [],
                        selected: ''
                    },
                    stasiun: {
                        data: [],
                        selected: ''
                    },
                    kereta: {
                        data: [],
                        selected: ''
                    },
                    jadwalKereta: {
                        data: [],
                        selected: ''
                    }
                }
            },
            methods: {
                run() {
                    console.log('works!');
                },
                init() {
                    this.getTime();
                    setInterval(() => {
                        this.getTime();
                    }, 1000)

                    this.pemesanan.data = data.pemesanan
                    this.pelanggan.data = data.pelanggan
                    this.stasiun.data = data.stasiun
                    this.kereta.data = data.kereta
                    this.jadwalKereta.data = data.jadwalKereta
                },
                getTime() {
                    this.date = dateFormat(new Date(), "dddd, dd mmmm yyyy, HH:MM:ss");
                },
                selectPesanan(pesanan) {
                    this.pemesanan.selected = pesanan
                },
                actionPesanan(pesan) {
                    console.log(pesan)
                },
                selectPelanggan(pelanggan) {
                    this.pelanggan.selected = pelanggan
                },
                selectStasiun(stasiun) {
                    this.stasiun.selected = stasiun
                },
                selectKereta(kereta) {
                    this.kereta.selected = kereta
                },
                selectJadwalKereta(jadwal) {
                    this.jadwalKereta.selected = jadwal
                }
            },
            mounted() {
                this.init();
            }
        });
    }
}