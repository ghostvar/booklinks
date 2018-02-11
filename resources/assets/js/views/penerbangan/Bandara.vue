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
          <th>Nama Bandara</th>
          <th>Kota</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(bandara, id) in $store.state.bandara" :key="id" @click="selectBandara(bandara)" :class="{ 'is-selected': (used.id == bandara.id ? true:false) }">
          <td v-text="id+1"></td>
          <td v-text="bandara.kode"></td>
          <td v-text="bandara.name"></td>
          <td v-text="bandara.kota"></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
  mounted() {
    this.initBandara();
  }
}
</script>
