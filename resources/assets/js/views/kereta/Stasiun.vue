<template>
  <div>
    <div class="modal" :class="{ 'is-active': modal }">
      <div @click="modal = !modal" class="modal-background"></div>
      <div class="modal-content">
        <div class="box">
          <form action="post" @submit.prevent="actionStasiun">
            <div class="field">
            <label class="label">Kode Stasiun</label>
            <div class="control is-expanded">
              <input v-model="used.kode" class="input" type="text" placeholder="Kode Stasiun">
            </div>
          </div>

          <div class="field">
            <label class="label">Nama Stasiun</label>
            <div class="control has-icons-left has-icons-right">
              <input v-model="used.name" class="input" type="text" placeholder="Nama Stasiun">
              <span class="icon is-small is-left">
                <i class="fa fa-university"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">Kota</label>
            <div class="control has-icons-left has-icons-right">
              <input v-model="used.kota" class="input" type="test" placeholder="Kota">
              <span class="icon is-small is-left">
                <i class="fa fa-map"></i>
              </span>
            </div>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button class="button is-success">Simpan</button>
            </div>
            <div class="control">
              <button type="button" @click="modal = !modal" class="button is-text">Cancel</button>
            </div>
          </div>
          </form>
        </div>
      </div>
      <button @click="modal = !modal" class="modal-close is-large" aria-label="close"></button>
    </div>
    <div class="control is-nested">
      <span v-if="!used.id">
        <button class="button is-success" @click="modal = true">Tambah</button>
      </span>
      <span v-if="used.id">
        <button class="button is-text is-light" @click="initStasiun">Batal</button>
        <button class="button is-success" @click="modal = true">Ubah</button>
        <button class="button is-danger" @click="deleteStasiun">Hapus</button>
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
