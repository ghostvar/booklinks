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
    findStasiunWithCode(kode) {
        var _return = {};
        for(var i = 0;this.$store.state.stasiun.length > i;i++) {
            if (this.$store.state.stasiun[i].kode == kode) {
                _return = {
                    kode: kode,
                    name: this.$store.state.stasiun[i].name,
                    kota: this.$store.state.stasiun[i].kota
                };
            }
        }
        return _return;
        // this.$store.state.stasiun.forEach(stasiun => {
        // });
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
            kereta: {
                no_kereta: null
            },
            rute: []
        }
    },
    selectJadwalKereta(jadwal) {
        var rute = [];
        for(var i = 0;jadwal.rute.length > i;i++) {
            rute.push({
                id: jadwal.rute[i].id,
                jurusan_id: jadwal.rute[i].jurusan_id,
                stasiun_berangkat: {
                    kode: jadwal.rute[i].stasiun_berangkat.kode,
                    kota: jadwal.rute[i].stasiun_berangkat.kota,
                    name: jadwal.rute[i].stasiun_berangkat.name
                },
                stasiun_sampai: {
                    kode: jadwal.rute[i].stasiun_sampai.kode,
                    kota: jadwal.rute[i].stasiun_sampai.kota,
                    name: jadwal.rute[i].stasiun_sampai.name
                },
                waktu_berangkat: jadwal.rute[i].waktu_berangkat,
                waktu_sampai: jadwal.rute[i].waktu_sampai,
                urutan: jadwal.rute[i].urutan
            })
        }
        this.used = {
            id: jadwal.id,
            kereta: jadwal.kereta,
            rute: rute
        }
    },
    actionJadwalKereta() {
        Kereta.actionJadwal(this.used, () => {
            this.viewMode = 'default';
            this.initRute();
        })
    },
    deleteJadwalKereta() {
        Kereta.deleteJadwal(this.used.id, () => {
            this.init();
        })
    },

    initTarifKereta() {
        this.used = {
            id: '',
            kereta: '',
            kelas: '',
            tarif: '',
            jurusan: ''
        }
    },
    selectTarifKereta(tarif) {
        this.used = {
            id: tarif.id,
            kereta: tarif.kereta,
            kelas: tarif.kelas,
            tarif: tarif.tarif,
            jurusan: tarif.jurusan
        }
    }
}