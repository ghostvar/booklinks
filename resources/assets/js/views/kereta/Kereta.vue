<template>
  <div>
    <div class="control is-nested">
        <span>
          <button @click="tambah = true; initKereta()" class="button is-success">Tambah</button>
        </span>
    </div>
    <div class="columns">
      <div class="column">
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
        <tr v-for="(kereta, id) in $store.state.kereta" :key="id" @click="selectKereta(kereta); tambah = false" :class="{ 'is-selected': (used.id == kereta.id ? true:false) }">
          <td v-text="id+1"></td>
          <td v-text="kereta.name"></td>
          <td v-text="kereta.created_at"></td>
	  			<td v-text="kereta.updated_at"></td>
        </tr>
      </tbody>
    </table>
      </div>
      <div v-if="tambah || used.id" class="column is-4">
        <div class="field">
          <label class="label">No. KA</label>
          <div class="control">
            <input class="input is-small" v-model="used.no_kereta" type="number" placeholder="Nomor Kereta">
          </div>
        </div>

        <div class="field">
          <label class="label">Nama Kereta</label>
          <div class="control has-icons-left">
            <input class="input is-small" v-model="used.name" type="text" placeholder="Nama Kereta">
            <span class="icon is-small is-left">
              <i class="fa fa-train"></i>
            </span>
          </div>
        </div>

        <div class="field">
          <label class="label">Jumlah Kursi</label>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded">
                <input class="input is-small" v-model="used.eco_seat_num" type="number" placeholder="Ekonomi">
              </p>
            </div>
            <div class="field">
              <p class="control is-expanded">
                <input class="input is-small" v-model="used.busines_seat_num" type="number" placeholder="Bisnis">
              </p>
            </div>
            <div class="field">
              <p class="control is-expanded">
                <input class="input is-small" v-model="used.exec_seat_num" type="number" placeholder="Eksekutif">
              </p>
            </div>
          </div>
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button class="button is-text" @click="initKereta(); tambah = false">Batal</button>
          </div>
          <div class="control">
            <span v-if="!tambah">
              <button @click="actionKereta" class="button is-success">Ubah</button>
              <button @click="deleteKereta" class="button is-danger">Hapus</button>
            </span>
            <span v-if="tambah">
              <button @click="actionKereta" class="button is-primary">Simpan</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.initKereta();
  },
  data() {
    return {
      tambah: false
    }
  }
}
</script>
