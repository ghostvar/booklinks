<template>
  <main class="column main is-fullheight">
    <div class="level">
      <div class="level-left">
      <div class="level-item">
        <div class="title has-text-success">Penerbangan</div>
      </div>
      </div>
      <div class="level-right">
      <div class="level-item">
        <button type="button" class="button is-small" v-text="$store.state.date"></button>
      </div>
      </div>
    </div>
    <section>
      <div class="tabs is-boxed">
      <ul>
        <li><router-link to="/penerbangan/jadwal">Jadwal</router-link></li>
        <li><router-link to="/penerbangan/pesawat">Pesawat</router-link></li>
        <li><router-link to="/penerbangan/bandara">Bandara</router-link></li>
      </ul>
      </div>
    </section>
    <router-view></router-view>
  </main>
</template>
