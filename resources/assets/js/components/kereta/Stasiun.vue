<template>
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
      <tr v-for="(stas, id) in stasiun.data" :key="id" @click="selectStasiun(stas)" :class="{ 'is-selected': (stasiun.selected == stas ? true:false) }">
        <td v-text="id+1"></td>
        <td v-text="stas.kode"></td>
        <td v-text="stas.name"></td>
        <td v-text="stas.kota"></td>
      </tr>
    </tbody>
  </table>
</template>
