<template>
  <div>
    <div class="control is-nested">
        <span>
          <nav class="level">
            <div class="level-left">
              <div class="level-item">
                <button @click="tambah = true; initKereta()" class="button is-success">Tambah</button>
              </div>
            </div>
            <div class="level-right">
              <div class="level-item">
                <div class="field has-addons">
                  <p class="control">
                    <input v-model="search" class="input" type="text" placeholder="Cari Kereta ...">
                  </p>
                  <p class="control">
                    <button class="button"><i class="fa fa-search"></i></button>
                  </p>
                </div>
              </div>
            </div>
          </nav>
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
        <tr v-for="(field, id) in kereta" :key="id" @click="selectKereta(field); tambah = false" :class="{ 'is-selected': (used.id == field.id ? true:false) }">
          <td v-text="id+1"></td>
          <td v-text="field.name"></td>
          <td v-text="field.created_at"></td>
	  			<td v-text="field.updated_at"></td>
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
import { mapGetters } from 'vuex'
import jpath from 'node-jpath'
export default {
  data() {
    return {
      tambah: false,
      search: '',
      kereta: []
    }
  },
  mounted() {
    this.initKereta();
    this.kereta = this.$store.state.kereta
  },
  watch: {
    search() {
      if (this.search) {
        var query = this.search.replace(/[^\w\s]/gi, '');
        this.kereta = jpath.filter({ data: this.keretas }, "data[name*='"+query+"']");
      } else {
        this.kereta = this.keretas
      }
    },
    keretas() {
      this.kereta = this.keretas
    }
  },
  computed: {
    ...mapGetters({
      keretas: 'kereta'
    })
  }
}
</script>
