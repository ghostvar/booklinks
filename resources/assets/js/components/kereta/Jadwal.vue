<template>
  <div>
    <div class="control is-nested">
      <span v-if="!jadwalKereta.selected">
        <button class="button is-success">Tambah</button>
      </span>
      <span v-if="jadwalKereta.selected">
        <button class="button is-primary" @click="jadwalKereta.selected = ''">Batal</button>
        <button class="button is-success">Ubah</button>
        <button class="button is-danger">Hapus</button>
      </span>
    </div>
    <table class="table is-fullwidth is-hoverable is-small">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Kereta</th>
          <th>Stasiun Keberangkatan</th>
          <th>Stasiun Kedatangan</th>
          <th>Waktu Keberangkatan</th>
          <th>Waktu Kedatangan</th>
          <th>Waktu Tempuh</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(jadwal, id) in jadwalKereta.data" :key="id" @click="selectJadwalKereta(jadwal)" :class="{ 'is-selected': (jadwalKereta.selected == jadwal ? true:false) }">
          <td v-text="id+1"></td>
          <td v-text="jadwal.nama_kereta"></td>
          <td v-text="jadwal.stasiun_berangkat"></td>
          <td v-text="jadwal.stasiun_datang"></td>
	  			<td v-text="jadwal.waktu_berangkat"></td>
          <td v-text="jadwal.waktu_datang"></td>
          <td v-text="jadwal.waktu_tempuh"></td>
        </tr>
      </tbody>
    </table>
  </div>    
</template>
