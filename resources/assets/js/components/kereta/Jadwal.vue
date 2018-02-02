<template>
  <div>
    <span v-if="viewMode == 'default'">
      <div class="control is-nested">
        <span v-if="!used.id">
          <button class="button is-success" @click="viewMode = 'add'; initRute()">Tambah</button>
        </span>
        <span v-if="used.id">
          <button class="button is-light is-text" @click="initJadwalKereta(); initRute()">Batal</button>
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
      <div class="control is-nested">
        <button class="button is-light is-text" @click="viewMode = 'default'">Kembali</button>
      </div>
      <div class="columns">
        <div class="column is-4">
          <div class="field">
            <label class="label">Kereta</label>
            <div class="control">
              <div class="select is-small">
                <select>
                  <option>Pilih Kereta</option>
                  <option v-for="(kereta, id) in $store.state.kereta" :key="id" :selected="(used.kereta.no_kereta == kereta.no_kereta ? true:false)" v-text="kereta.name"></option>
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
                <select>
                  <option>Pilih Stasiun</option>
                  <option v-for="(stasiun, id) in $store.state.stasiun" :key="id" :selected="(ruteSelect.stasiun_berangkat.kode == stasiun.kode ? true:false)" :value="stasiun.kode" v-text="stasiun.name"></option>
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
                <select>
                  <option>Pilih Stasiun</option>
                  <option v-for="(stasiun, id) in $store.state.stasiun" :key="id" :selected="(ruteSelect.stasiun_sampai.kode == stasiun.kode ? true:false)" :value="stasiun.kode" v-text="stasiun.name"></option>
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
      ruteSelect: {
        id: '',
				jurusan_id: '',
				stasiun_berangkat: '',
				stasiun_sampai: '',
				waktu_berangkat: '',
				waktu_sampai: '',
				urutan: ''
      },
      time: ''
    }
  },
  methods: {
    initRute() {
      this.ruteSelect = {
        id: '',
				jurusan_id: '',
				stasiun_berangkat: '',
				stasiun_sampai: '',
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
    sendTime() {
      console.log(this.time)
    }
  },
  mounted() {
    this.initJadwalKereta();
  }
}
</script>