export default {
    initPesanan() {
        this.used = {
            id: '',
            name: '',
            booking_code: '',
            jenis: ''
        }
    },
    selectPesanan(pesanan) {
        this.used = {
            id: pesanan.id,
            name: pesanan.name,
            booking_code: pesanan.booking_code,
            jenis: pesanan.jenis
        }
    },
    actionPesanan(pesan) {
        console.log(pesan)
    }
}