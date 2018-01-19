import Pelanggan from '../models/Pelanggan'

export default {
    initPelanggan() {
        this.used = {
            id: '',
            name: '',
            email: '',
            kota: '',
            negara: ''
        }
    },
    selectPelanggan(pelanggan) {
        this.used = {
            id: pelanggan.id,
            name: pelanggan.name,
            email: pelanggan.email,
            kota: pelanggan.kota,
            negara: pelanggan.negara
        }
    },
    actionPelanggan() {
        Pelanggan.actionCostumer(this.used, () => {
            this.init()
            this.initPelanggan()
            this.modal = !this.modal
        })
    },
    deletePelanggan() {
        Pelanggan.deleteCostumer(this.used.id, () => {
            this.init()
            this.initPelanggan()
        })
    },
}