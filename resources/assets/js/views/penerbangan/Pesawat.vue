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
          <th>Kode</th>
          <th>Nama Pesawat</th>
          <th>Tipe</th>
          <!--th>Kapasitas</th-->
        </tr>
      </thead>
      <tbody>
        <tr v-for="(pesawat, id) in $store.state.pesawat" :key="id" @click="selectPesawat(pesawat)" :class="{ 'is-selected': (used.id == pesawat.id ? true:false) }">
          <td v-text="id+1"></td>
          <td v-text="pesawat.kode"></td>
          <td v-text="pesawat.name"></td>
          <td v-text="pesawat.type_pesawat"></td>
          <!--td v-text="pesawat.exec_seat_num + pesawat.eco_seat_num + pesawat.busines_seat_num"></td-->
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
  mounted() {
    this.initPesawat();
  }
}
</script>
