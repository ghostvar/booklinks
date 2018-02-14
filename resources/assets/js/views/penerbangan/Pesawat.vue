<template>
  <div>
    <div class="modal" :class="{ 'is-active': modal }">
      <div @click="modal = !modal" class="modal-background"></div>
      <div class="modal-content">
        <div class="box">
          <form action="post" @submit.prevent="actionPesawat">
            <div class="field">
            <label class="label">Kode Pesawat</label>
            <div class="control is-expanded">
              <input v-model="used.kode" class="input" type="text" placeholder="Kode Pesawat">
            </div>
          </div>

          <div class="field">
            <label class="label">Nama Pesawat</label>
            <div class="control has-icons-left has-icons-right">
              <input v-model="used.name" class="input" type="text" placeholder="Nama Pesawat">
              <span class="icon is-small is-left">
                <i class="fa fa-plane"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">Type Pesawat</label>
            <div class="control has-icons-left has-icons-right">
              <input v-model="used.type_pesawat" class="input" type="test" placeholder="Type Pesawat">
              <span class="icon is-small is-left">
                <i class="fa fa-gear"></i>
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
        <nav class="level">
            <div class="level-left">
              <div class="level-item">
                <button class="button is-success" @click="modal = true">Tambah</button>
              </div>
            </div>
            <div class="level-right">
              <div class="level-item">
                <div class="field has-addons">
                  <p class="control">
                    <input v-model="search" class="input" type="text" placeholder="Cari pelanggan ...">
                  </p>
                  <p class="control">
                    <button class="button"><i class="fa fa-search"></i></button>
                  </p>
                </div>
              </div>
            </div>
          </nav>
      </span>
      <span v-if="used.id">
        <button class="button is-text is-light" @click="initStasiun">Batal</button>
        <button class="button is-success" @click="modal = true">Ubah</button>
        <button class="button is-danger" @click="deletePesawat">Hapus</button>
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
        <tr v-for="(pesawat, id) in pesawat" :key="id" @click="selectPesawat(pesawat)" :class="{ 'is-selected': (used.id == pesawat.id ? true:false) }">
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
import { mapGetters } from 'vuex'
import jpath from 'node-jpath'
export default {
  data() {
    return {
      search: '',
      pesawat: []
    }
  },
  mounted() {
    this.initPesawat();
    this.pesawat = this.$store.state.pesawat
  },
  watch: {
    search() {
      if (this.search) {
        var query = this.search.replace(/[^\w\s]/gi, '');
        this.pesawat = jpath.filter({ data: this.pesawats }, "data[kode*='"+query+"' || name*='"+query+"' || type_pesawat*='"+query+"']");
      } else {
        this.pesawat = this.pesawats
      }
    },
    pesawats() {
      this.pesawat = this.pesawats
    }
  },
  computed: {
    ...mapGetters({
      pesawats: 'pesawat'
    })
  }
}
</script>
