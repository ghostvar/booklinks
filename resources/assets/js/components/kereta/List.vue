<template>
  <div>
    <div class="control is-nested">
      <span v-if="!used.id">
        <button class="button is-success">Tambah</button>
      </span>
      <span v-if="used.id">
        <button class="button is-primary" @click="initKereta">Batal</button>
        <button class="button is-success">Ubah</button>
        <button class="button is-danger">Hapus</button>
      </span>
    </div>
    <table class="table is-fullwidth is-hoverable is-small">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Kereta</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(kereta, id) in $store.state.kereta" :key="id" @click="selectKereta(kereta)" :class="{ 'is-selected': (used.id == kereta.id ? true:false) }">
          <td v-text="id+1"></td>
          <td v-text="kereta.name"></td>
          <td v-text="kereta.created_at"></td>
	  			<td v-text="kereta.updated_at"></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  mounted() {
    this.initKereta();
  }
}
</script>
