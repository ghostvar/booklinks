import Kereta from '../models/Kereta'

export default {
    initStasiun() {
        this.used = {
            id: '',
            kode: '',
            kota: '',
            name: ''
        }
    },
    selectStasiun(stasiun) {
        this.used = {
            id: stasiun.id,
            kode: stasiun.kode,
            kota: stasiun.kota,
            name: stasiun.name
        }
    },
    actionStasiun() {
        Kereta.actionStasiun(this.used, () => {
            this.init();
            this.initStasiun();
            this.modal = !this.modal;
        })
    },
    deleteStasiun() {
        Kereta.deleteStasiun(this.used.id, () => {
            this.init();
            this.initStasiun();
        })
    },

    initKereta(kereta) {
        this.used = {
            id: '',
            name: '',
            no_kereta: '',
            eco_seat_num: '',
            busines_seat_num: '',
            exec_seat_num: ''
        }
    },
    selectKereta(kereta) {
        this.used = {
            id: kereta.id,
            name: kereta.name,
            no_kereta: kereta.no_kereta,
            eco_seat_num: kereta.eco_seat_num,
            busines_seat_num: kereta.busines_seat_num,
            exec_seat_num: kereta.exec_seat_num
        }
    },
    actionKereta() {
        Kereta.actionTrain(this.used, () => {
            this.init();
            this.initKereta();
            this.modal = !this.modal
        })
    },
    deleteKereta() {
        Kereta.deleteTrain(this.used.id, () => {
            this.init();
            this.initKereta();
        })
    },

    initJadwalKereta() {
        this.used = {
            id: '',
            nama_kereta: '',
            stasiun_berangkat: '',
            stasiun_datang: '',
            waktu_berangkat: '',
            waktu_datang: '',
            waktu_tempuh: ''
        }
    },
    selectJadwalKereta(jadwal) {
        this.used = {
            id: jadwal.id,
            nama_kereta: jadwal.nama_kereta,
            stasiun_berangkat: jadwal.stasiun_berangkat,
            stasiun_datang: jadwal.stasiun_datang,
            waktu_berangkat: jadwal.waktu_berangkat,
            waktu_datang: jadwal.waktu_datang,
            waktu_tempuh: jadwal.waktu_tempuh
        }
    }
}