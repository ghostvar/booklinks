<template>
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
      <tr v-for="(keret, id) in kereta.data" :key="id" @click="selectKereta(keret)" :class="{ 'is-selected': (kereta.selected == keret ? true:false) }">
        <td v-text="id+1"></td>
        <td v-text="keret.name"></td>
        <td v-text="keret.created_at"></td>
				<td v-text="keret.updated_at"></td>
      </tr>
    </tbody>
  </table>
</template>
