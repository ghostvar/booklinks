import dateFormat from './dateformat'
import data from './data.json'
import model from './model'
export default {
    install(Vue, options) {
        Vue.mixin({
            data() {
                return {
                    date: '',
                    modal: false,
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
                    model.pelanggan(data => { this.pelanggan.data = data })
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
            beforeCreate() {
                if (!sessionStorage.getItem("token")) {
                    window.location = '/login'
                }
            },
            mounted() {
                this.init();
            }
        });
    }
}