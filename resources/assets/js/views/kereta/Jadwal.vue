<template>
  <div>
    <span v-if="viewMode == 'default'">
      <div class="control is-nested">
        <span v-if="!used.id">
          <button class="button is-success" @click="viewMode = 'add'; initRute()">Tambah</button>
        </span>
        <span v-if="used.id">
          <button class="button is-light is-text" @click="initJadwalKereta()">Batal</button>
          <button class="button is-success" @click="viewMode = 'edit'">Ubah</button>
          <button class="button is-danger">Hapus</button>
        </span>
      </div>
      <table class="table is-fullwidth is-hoverable is-small">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kereta</th>
            <th>Waktu Keberangkatan</th>
            <th>Stasiun Keberangkatan</th>
            <th>Waktu Kedatangan</th>
            <th>Stasiun Kedatangan</th>
            <th>Waktu Tempuh</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(jadwal, id) in $store.state.jadwalKereta" :key="id" @click="selectJadwalKereta(jadwal)" :class="{ 'is-selected': (used.id == jadwal.id ? true:false) }">
            <td v-text="id+1"></td>
            <td v-text="jadwal.kereta.name"></td>
            <td v-text="jadwal.rute[0].waktu_berangkat"></td>
            <td v-text="jadwal.rute[0].stasiun_berangkat.name"></td>
            <td v-text="jadwal.rute[jadwal.rute.length-1].waktu_sampai"></td>
            <td v-text="jadwal.rute[jadwal.rute.length-1].stasiun_sampai.name"></td>
            <td v-text="jadwal.waktu_tempuh + ' Jam'"></td>
          </tr>
        </tbody>
      </table>
    </span>
    <span v-if="viewMode == 'add' || viewMode == 'edit'">
      <form method="post" @submit.prevent="actionTempRute">
      <div class="control is-nested">
        <button class="button is-light is-text" type="button" @click="viewMode = 'default'; initRute()">Kembali</button>
        <button class="button is-primary" type="button" @click="actionJadwalKereta">Simpan</button>
      </div>
      <div class="columns">
        <div class="column is-4">
          <div class="field">
            <label class="label">Kereta</label>
            <div class="control">
              <div class="select is-small">
                <select v-model="used.kereta.no_kereta">
                  <option :value="null">Pilih Kereta</option>
                  <option v-for="(kereta, id) in $store.state.kereta" :key="id" v-text="kereta.name" :value="kereta.no_kereta"></option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column is-6">
          <div class="field">
            <label class="label">Keberangkatan</label>
            <div class="control">
              <div class="select is-small">
                <select v-model="ruteSelect.stasiun_berangkat.kode">
                  <option :value="null">Pilih Stasiun</option>
                  <option v-for="(stasiun, id) in $store.state.stasiun" :key="id" :value="stasiun.kode" v-text="stasiun.name"></option>
                </select>
              </div>
            </div>
          </div>
          <div class="field">
            <div class="control">
              <input v-model="ruteSelect.waktu_berangkat" class="input is-small" type="time" placeholder="">
            </div>
          </div>
        </div>
        <div class="column is-6">
          <div class="field">
            <label class="label">Kedatangan</label>
            <div class="control">
              <div class="select is-small">
                <select v-model="ruteSelect.stasiun_sampai.kode">
                  <option :value="null">Pilih Stasiun</option>
                  <option v-for="(stasiun, id) in $store.state.stasiun" :key="id" :value="stasiun.kode" v-text="stasiun.name"></option>
                </select>
              </div>
            </div>
          </div>
          <div class="field">
            <div class="control">
              <input v-model="ruteSelect.waktu_sampai" class="input is-small" type="time" placeholder="">
            </div>
          </div>
        </div>
      </div>
      <div class="control has-left">
        <span v-if="!ruteSelect.id">
          <button class="button is-success" type="submit">Tambah</button>
        </span>
        <span v-if="ruteSelect.id">
          <button class="button is-text is-light" type="button" @click="initRute">Batal</button>
          <button class="button is-success" type="submit">Ubah</button>
          <button class="button is-danger" type="button" @click="deleteTempRute">Hapus</button>
        </span>
      </div>
      </form>
      <div>
        <table class="table is-fullwidth is-hoverable is-small">
          <thead>
            <tr>
              <th>No</th>
              <th>Stasiun Keberangkatan</th>
              <th>Waktu Berangkat</th>
              <th>Stasiun Kedatangan</th>
              <th>Waktu Sampai</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(rute, id) in used.rute" :key="id" @click="selectRute(rute)" :class="{ 'is-selected': (ruteSelect.id == rute.id ? true:false) }">
              <td v-text="id+1"></td>
              <td v-text="rute.stasiun_berangkat.name"></td>
              <td v-text="rute.waktu_berangkat"></td>
              <td v-text="rute.stasiun_sampai.name"></td>
              <td v-text="rute.waktu_sampai"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </span>
  </div> 
</template>

<script>
export default {
  data() {
    return {
      viewMode: 'default',
      idAddRute: 0,
      ruteSelect: {}
    }
  },
  methods: {
    initRute() {
      this.ruteSelect = {
        id: '',
				jurusan_id: '',
				stasiun_berangkat: {
          kode: null
        },
				stasiun_sampai: {
          kode: null
        },
				waktu_berangkat: '',
				waktu_sampai: '',
				urutan: ''
      }
    },
    selectRute(rute) {
      this.ruteSelect = {
        id: rute.id,
				jurusan_id: rute.jurusan_id,
				stasiun_berangkat: rute.stasiun_berangkat,
				stasiun_sampai: rute.stasiun_sampai,
				waktu_berangkat: rute.waktu_berangkat,
				waktu_sampai: rute.waktu_sampai,
				urutan: rute.urutan
      }
    },
    actionTempRute() {
      if (this.ruteSelect.id) {
        for(var i = 0;this.used.rute.length > i;i++) {
          if (this.used.rute[i].id == this.ruteSelect.id) {
            this.used.rute[i] = {
              id: this.used.rute[i].id,
              stasiun_berangkat: this.findStasiunWithCode(this.ruteSelect.stasiun_berangkat.kode),
              stasiun_sampai: this.findStasiunWithCode(this.ruteSelect.stasiun_sampai.kode),
              waktu_berangkat: this.ruteSelect.waktu_berangkat,
              waktu_sampai: this.ruteSelect.waktu_sampai
            }
          }
        }
      } else {
        this.idAddRute++;
        this.used.rute.push({
          id: this.idAddRute,
          jurusan_id: '',
          stasiun_berangkat: this.findStasiunWithCode(this.ruteSelect.stasiun_berangkat.kode),
          stasiun_sampai: this.findStasiunWithCode(this.ruteSelect.stasiun_sampai.kode),
          waktu_berangkat: this.ruteSelect.waktu_berangkat,
          waktu_sampai: this.ruteSelect.waktu_sampai,
          urutan: this.idAddRute
        })
      }
      this.initRute();
    },
    deleteTempRute() {
      for(var i = 0;this.used.rute.length > i;i++) {
        if (this.used.rute[i].id == this.ruteSelect.id) {
          this.used.rute.splice(i, 1);
          this.initRute()
        }
      }
    }
  },
  mounted() {
    this.initJadwalKereta();
    this.initRute();
  }
}
</script>