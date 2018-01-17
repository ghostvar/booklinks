import dateFormat from './dateformat'
export default {
    install(Vue, options) {
        Vue.mixin({
            data() {
                return {
                    date: '',
                    pemesanan: [
                        { name: 'Rian', jenis: 'Penerbangan', tanggal: '7 Mei 2018' },
                        { name: 'Fadli', jenis: 'Kereta', tanggal: '14 April 2018' },
                        { name: 'Ahmad', jenis: 'Kereta', tanggal: '02 Februari 2018' }
                    ],
                    selectedPesanan: ''
                }
            },
            methods: {
                run() {
                    console.log('works!');
                },
                getTime() {
                    this.date = dateFormat(new Date(), "dddd, dd mmmm yyyy, HH:MM:ss");
                },
                selectPesanan(pesanan) {
                    this.selectedPesanan = pesanan
                }
            },
            mounted() {
                this.getTime();
                setInterval(() => {
                    this.getTime();
                }, 1000)
            }
        });
    }
}