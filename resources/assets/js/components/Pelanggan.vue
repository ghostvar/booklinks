<template>
  <main class="column main is-fullheight">
    <div class="level">
      <div class="level-left">
      <div class="level-item">
        <div class="title has-text-success">Pelanggan</div>
      </div>
      </div>
      <div class="level-right">
      <div class="level-item">
        <button type="button" class="button is-small" v-text="date"></button>
      </div>
      </div>
    </div>
    <section>
      <div class="control">
        <span v-if="!pelanggan.selected">
          <button class="button is-success">Tambah</button>
        </span>
        <span v-if="pelanggan.selected">
          <button class="button is-primary" @click="pelanggan.selected = ''">Batal</button>
          <button class="button is-success">Ubah</button>
          <button class="button is-danger">Hapus</button>
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
          <tr v-for="(user, id) in pelanggan.data" :key="id" @click="selectPelanggan(user)" :class="{ 'is-selected': (pelanggan.selected == user ? true:false) }">
            <td v-text="id+1"></td>
            <td v-text="user.name"></td>
            <td v-text="user.kota"></td>
            <td v-text="user.created_at"></td>
						<td v-text="user.updated_at"></td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>
</template>