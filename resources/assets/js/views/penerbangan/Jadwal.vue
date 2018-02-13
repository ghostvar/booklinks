<template>
  <div>
    <div class="modal" :class="{ 'is-active': modal }">
      <div @click="modal = !modal" class="modal-background"></div>
      <div class="modal-content">
        <div class="box">
          <form action="post" @submit.prevent="actionJadwalPenerbangan">
            <div class="field">
              <label class="label">No Penerbangan</label>
              <div class="field is-grouped">
                <div class="control has-icons-left has-icons-right">
                  <input v-model="used.no_penerbangan" class="input" type="text" placeholder="Nomor Penerbangan">
                  <span class="icon is-small is-left">
                    <i class="fa fa-plane"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="field">
              <label class="label">Pesawat</label>
              <div class="control">
                <div class="select">
                  <select v-model="used.pesawat.id">
                    <option :value="null">Pilih Pesawat</option>
                    <option v-for="(pesawat, id) in $store.state.pesawat" :key="id" :value="pesawat.id" v-text="pesawat.name + ' (' + pesawat.type_pesawat + ')'"></option>
                  </select>
                </div>
              </div>
            </div>

            <div class="field">
              <label class="label">Asal</label>
              <div class="field is-grouped">
                <div class="control">
                  <div class="select">
                    <select v-model="used.asal.kode">
                      <option :value="null">Pilih Bandara</option>
                      <option v-for="(bandara, id) in $store.state.bandara" :key="id" :value="bandara.kode" v-text="bandara.name"></option>
                    </select>
                  </div>
                </div>
                <div class="control">
                  <input v-model="used.waktu_berangkat" type="time" class="input" placeholder="Waktu Berangakat">
                </div>
              </div>
            </div>

            <div class="field">
              <label class="label">Tujuan</label>
              <div class="field is-grouped">
                <div class="control">
                  <div class="select">
                    <select v-model="used.tujuan.kode">
                      <option :value="null">Pilih Bandara</option>
                      <option v-for="(bandara, id) in $store.state.bandara" :key="id" :value="bandara.kode" v-text="bandara.name"></option>
                    </select>
                  </div>
                </div>
                <div class="control">
                  <input v-model="used.waktu_sampai" type="time" class="input" placeholder="Waktu Sampai">
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
        <button class="button is-success" @click="modal = true">Tambah</button>
      </span>
      <span v-if="used.id">
        <button class="button is-text is-light" @click="initJadwalPenerbangan">Batal</button>
        <button class="button is-success" @click="modal = true">Ubah</button>
        <button class="button is-danger">Hapus</button>
      </span>
    </div>
    <table class="table is-fullwidth is-hoverable is-small">
      <thead>
        <tr>
          <th>No</th>
          <th>Penerbangan</th>
          <th>Pesawat</th>
          <th>Asal</th>
	  			<th>Waktu Berangkat</th>
          <th>Tujuan</th>
          <th>Waktu Sampai</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(penerbangan, id) in $store.state.penerbangan" :key="id" @click="selectJadwalPenerbangan(penerbangan)" :class="{ 'is-selected': (used.id == penerbangan.id ? true:false) }">
          <td v-text="id+1"></td>
          <td v-text="penerbangan.pesawat.kode + ' ' + penerbangan.no_penerbangan"></td>
          <td v-text="penerbangan.pesawat.name"></td>
          <td v-text="penerbangan.asal.kota"></td>
          <td v-text="penerbangan.waktu_berangkat"></td>
          <td v-text="penerbangan.tujuan.kota"></td>
          <td v-text="penerbangan.waktu_sampai"></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
  mounted() {
    this.initJadwalPenerbangan();
  }
}
</script>
