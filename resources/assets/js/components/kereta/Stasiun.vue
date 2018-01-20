<template>
  <div>
    <div class="control is-nested">
      <span v-if="!used.id">
        <button class="button is-success">Tambah</button>
      </span>
      <span v-if="used.id">
        <button class="button is-primary" @click="initStasiun">Batal</button>
        <button class="button is-success">Ubah</button>
        <button class="button is-danger">Hapus</button>
      </span>
    </div>
    <table class="table is-fullwidth is-hoverable is-small">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Stasiun</th>
          <th>Nama Stasiun</th>
	  			<th>Kota</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(stasiun, id) in $store.state.stasiun" :key="id" @click="selectStasiun(stasiun)" :class="{ 'is-selected': (used.id == stasiun.id ? true:false) }">
          <td v-text="id+1"></td>
          <td v-text="stasiun.kode"></td>
          <td v-text="stasiun.name"></td>
          <td v-text="stasiun.kota"></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  mounted() {
    this.initStasiun();
  }
}
</script>
