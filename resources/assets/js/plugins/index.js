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
                    used: ''
                }
            },
            methods: {
                run() {
                    console.log('works!');
                },
                init() {
                    console.info('Data Initialize!')
                    this.getTime();
                    setInterval(() => {
                        this.getTime();
                    }, 1000)

                    this.$store.commit('setPemesanan', data.pemesanan);
                    model.getCostumers(data => { this.$store.commit('setPelanggan', data) })
                    this.$store.commit('setStasiun', data.stasiun);
                    this.$store.commit('setKereta', data.kereta);
                    this.$store.commit('setJadwalKereta', data.jadwalKereta);
                },
                getTime() {
                    this.$store.commit('setDate', dateFormat(new Date(), "dddd, dd mmmm yyyy, HH:MM:ss"));
                },
                selectPesanan(pesanan) {
                    this.used = pesanan
                },
                actionPesanan(pesan) {
                    console.log(pesan)
                },
                selectPelanggan(pelanggan) {
                    this.used = pelanggan
                },
                selectStasiun(stasiun) {
                    this.used = stasiun
                },
                selectKereta(kereta) {
                    this.used = kereta
                },
                selectJadwalKereta(jadwal) {
                    this.used = jadwal
                }
            },
            beforeCreate() {
                if (!sessionStorage.getItem("token")) {
                    window.location = '/login'
                }
            },
            mounted() {
                
            }
        });
    }
}