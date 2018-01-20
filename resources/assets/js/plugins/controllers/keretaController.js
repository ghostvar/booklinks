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
    initKereta(kereta) {
        this.used = {
            id: '',
            name: ''
        }
    },
    selectKereta(kereta) {
        this.used = {
            id: kereta.id,
            name: kereta.name
        }
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