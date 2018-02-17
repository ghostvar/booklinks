<template>
  <div>
    <div class="control is-nested">
      <span v-if="!used.id">
        <nav class="level">
            <div class="level-left">
              <div class="level-item">
                <button class="button is-success">Tambah</button>
              </div>
            </div>
            <div class="level-right">
              <div class="level-item">
                <div class="field has-addons">
                  <p class="control">
                    <input v-model="search" class="input" type="text" placeholder="Cari Stasiun ...">
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
        <button class="button is-text is-light" @click="initTarifKereta">Batal</button>
        <button class="button is-success">Ubah</button>
        <button class="button is-danger">Hapus</button>
      </span>
    </div>
    <table class="table is-fullwidth is-hoverable is-small">
      <thead>
        <tr>
          <th>No</th>
          <th>Jurusan</th>
          <th>Nama Kereta</th>
          <th>kelas</th>
	  			<th>Tarif</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(tarif, id) in tarifKereta" :key="id" @click="selectTarifKereta(tarif)" :class="{ 'is-selected': (tarif.id == used.id ? true:false) }">
          <td v-text="id+1"></td>
          <td v-text="tarif.jurusan"></td>
          <td v-text="tarif.kereta.name"></td>
          <td v-text="tarif.kelas"></td>
          <td v-text="tarif.tarif"></td>
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
      tarifKereta: []
    }
  },
  mounted() {
    this.initTarifKereta();
    this.tarifKereta = this.$store.state.tarifKereta
  },
  watch: {
    search() {
      if (this.search) {
        var query = this.search.replace(/[^\w\s]/gi, '');
        this.tarifKereta = jpath.filter({ data: this.tarifKeretas }, "data[jurusan*='"+query+"' || tarif*='"+query+"' || kereta.name*='"+query+"']");
      } else {
        this.tarifKereta = this.tarifKeretas
      }
    },
    tarifKeretas() {
      this.tarifKereta = this.tarifKeretas
    }
  },
  computed: {
    ...mapGetters({
      tarifKeretas: 'tarifKereta'
    })
  }
}
</script>
