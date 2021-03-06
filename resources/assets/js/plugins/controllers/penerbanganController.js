import Penerbangan from '../models/Penerbangan'

export default {
    initJadwalPenerbangan() {
        this.used = {
            id: '',
            no_penerbangan: '',
            asal: {
                kode: null
            },
            tujuan: {
                kode: null
            },
            waktu_berangkat: '',
            waktu_sampai: '',
            pesawat: {
                id: null
            }
        }
    },
    selectJadwalPenerbangan(penerbangan) {
        this.used = {
            id: penerbangan.id,
            no_penerbangan: penerbangan.no_penerbangan,
            asal: penerbangan.asal,
            tujuan: penerbangan.tujuan,
            waktu_berangkat: penerbangan.waktu_berangkat,
            waktu_sampai: penerbangan.waktu_sampai,
            pesawat: penerbangan.pesawat
        }
    },
    actionJadwalPenerbangan() {
        Penerbangan.actionPenerbangan(this.used, () => {
            this.init();
            this.initJadwalPenerbangan();
            this.modal = false;
        })
    },
    deleteJadwalPenerbangan() {

    },

    initBandara() {
        this.used = {
            id: '',
            kode: '',
            kota: '',
            name: ''
        }
    },
    selectBandara(bandara) {
        this.used = {
            id: bandara.id,
            kode: bandara.kode,
            kota: bandara.kota,
            name: bandara.name
        }
    },
    actionBandara() {
        Penerbangan.actionBandara(this.used, () => {
            this.initBandara();
            this.init();
            this.modal = false;
        })
    },
    deleteBandara() {
        Penerbangan.deleteBandara(this.used.id, () => {
            this.initBandara();
            this.init();
        })
    },

    initPesawat() {
        this.used = {
            id: '',
            name: '',
            kode: '',
            type_pesawat: '',
            exec_seat_num: '',
            busines_seat_num: '',
            eco_seat_num: ''
        }
    },
    selectPesawat(pesawat) {
        this.used = {
            id: pesawat.id,
            name: pesawat.name,
            kode: pesawat.kode,
            type_pesawat: pesawat.type_pesawat,
            exec_seat_num: pesawat.exec_seat_num,
            busines_seat_num: pesawat.busines_seat_num,
            eco_seat_num: pesawat.eco_seat_num
        }
    },
    actionPesawat() {
        Penerbangan.actionPesawat(this.used, () => {
            this.init();
            this.initPesawat();
            this.modal = false;
        })
    },
    deletePesawat() {
        Penerbangan.deletePesawat(this.used.id, () => {
            this.init();
            this.initPesawat();
        })
    }
}