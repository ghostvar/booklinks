<template>
  <div>
    <div class="control is-nested">
      <span v-if="!used.id">
        <button class="button is-success">Tambah</button>
      </span>
      <span v-if="used.id">
        <button class="button is-text is-light" @click="initStasiun">Batal</button>
        <button class="button is-success">Ubah</button>
        <button class="button is-danger">Hapus</button>
      </span>
    </div>
    <table class="table is-fullwidth is-hoverable is-small">
      <thead>
        <tr>
          <th>No</th>
          <th>Penerbangan</th>
          <th>Pesawat</th>
          <th>Asal</th>
	  			<th>Waktu Berangkat</th>
          <th>Tujuan</th>
          <th>Waktu Sampai</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(penerbangan, id) in $store.state.penerbangan" :key="id" @click="selectJadwalPenerbangan(penerbangan)" :class="{ 'is-selected': (used.id == penerbangan.id ? true:false) }">
          <td v-text="id+1"></td>
          <td v-text="penerbangan.pesawat.kode + ' ' + penerbangan.no_penerbangan"></td>
          <td v-text="penerbangan.pesawat.name"></td>
          <td v-text="penerbangan.asal.kota"></td>
          <td v-text="penerbangan.waktu_berangkat"></td>
          <td v-text="penerbangan.tujuan.kota"></td>
          <td v-text="penerbangan.waktu_sampai"></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
  mounted() {
    this.initJadwalPenerbangan();
  }
}
</script>
