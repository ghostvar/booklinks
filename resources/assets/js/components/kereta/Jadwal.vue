<template>
  <div>
    <div class="control is-nested">
      <span v-if="!used.id">
        <button class="button is-success">Tambah</button>
      </span>
      <span v-if="used.id">
        <button class="button is-primary" @click="initJadwalKereta">Batal</button>
        <button class="button is-success">Ubah</button>
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
          <td v-text="jadwal.waktu_berangkat"></td>
          <td v-text="jadwal.stasiun_berangkat"></td>
          <td v-text="jadwal.waktu_sampai"></td>
          <td v-text="jadwal.stasiun_sampai"></td>
          <td v-text="jadwal.waktu_tempuh + ' Jam'"></td>
        </tr>
      </tbody>
    </table>
  </div>    
</template>

<script>
export default {
  mounted() {
    this.initJadwalKereta();
  }
}
</script>