<template>
  <main class="column main is-fullheight">
    <div class="modal" :class="{ 'is-active': modal }">
      <div @click="modal = !modal" class="modal-background"></div>
      <div class="modal-content">
        <div class="box">
          <form action="post" @submit.prevent="actionPelanggan">
          <div class="field">
            <label class="label">Nama Lengkap</label>
            <div class="control has-icons-left has-icons-right">
              <input v-model="used.name" class="input" type="text" placeholder="Nama Anda">
              <span class="icon is-small is-left">
                <i class="fa fa-user"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
              <input v-model="used.email" class="input" type="email" placeholder="Email Anda">
              <span class="icon is-small is-left">
                <i class="fa fa-envelope"></i>
              </span>
            </div>
          </div>

          <div class="field">
            <label class="label">Kota</label>
            <div class="control">
              <input v-model="used.kota" class="input" type="text" placeholder="Kota Asal">
            </div>
          </div>

          <div class="field">
            <label class="label">Negara</label>
            <div class="control">
              <input v-model="used.negara" class="input" type="text" placeholder="Negara Asal">
            </div>
          </div>

          <!--div class="field">
            <div class="control">
              <label class="checkbox">
                <input type="checkbox">
                I agree to the <a href="#">terms and conditions</a>
              </label>
            </div>
          </div-->

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
    <div class="level">
      <div class="level-left">
      <div class="level-item">
        <div class="title has-text-success">Pelanggan</div>
      </div>
      </div>
      <div class="level-right">
      <div class="level-item">
        <div class="control">
          <button type="button" class="button is-small" v-text="$store.state.date"></button>
          <button type="button" class="button is-small" @click="init" title="Singkronisasi"><i class="fa fa-refresh"></i></button>
        </div>
      </div>
      </div>
    </div>
    <section>
      <div class="control">
        <span v-if="!used.id">
          <nav class="level">
            <div class="level-left">
              <div class="level-item">
                <button @click="modal = !modal" class="button is-success">Tambah</button>
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
          <button class="button is-text is-light" @click="initPelanggan">Batal</button>
          <button class="button is-success" @click="modal = !modal">Ubah</button>
          <button class="button is-danger" @click="deletePelanggan">Hapus</button>
        </span>
      </div>
    </section>
    <section>
      <table class="table is-fullwidth is-hoverable is-small">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Created at</th>
						<th>Updated at</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(user, id) in pelanggan" :key="id" @click="selectPelanggan(user)" :class="{ 'is-selected': (used.id == user.id ? true:false) }">
            <td v-text="id+1"></td>
            <td v-html="user.name"></td>
            <td v-text="user.kota"></td>
            <td v-text="user.created_at"></td>
						<td v-text="user.updated_at"></td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>
</template>

<script>
import { mapGetters } from 'vuex'
import jpath from 'node-jpath'
export default {
  data() {
    return {
      search: '',
      pelanggan: []
    }
  },
  mounted() {
    this.initPelanggan()
    this.pelanggan = this.$store.state.pelanggan
  },
  watch: {
    search() {
      if (this.search) {
        var query = this.search.replace(/[^\w\s]/gi, '');
        this.pelanggan = jpath.filter({ data: this.pelanggans }, "data[kota*='"+query+"' || name*='"+query+"']");
      } else {
        this.pelanggan = this.pelanggans
      }
    },
    pelanggans() {
      this.pelanggan = this.pelanggans
    }
  },
  computed: {
    ...mapGetters({
      pelanggans: 'pelanggan'
    })
  }
}
</script>
