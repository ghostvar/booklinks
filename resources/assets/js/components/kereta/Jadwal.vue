<template>
  <div>
    <div class="control is-nested">
      <span v-if="!pelanggan.selected">
        <button class="button is-success">Tambah</button>
      </span>
      <span v-if="pelanggan.selected">
        <button class="button is-primary" @click="pelanggan.selected = ''">Batal</button>
        <button class="button is-success">Ubah</button>
        <button class="button is-danger">Hapus</button>
      </span>
    </div>
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
  </div>    
</template>
