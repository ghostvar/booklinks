<template>
  <main class="column main is-fullheight">
    <div class="level">
      <div class="level-left">
      <div class="level-item">
        <div class="title has-text-success">Kereta</div>
      </div>
      </div>
      <div class="level-right">
      <div class="level-item">
        <button type="button" class="button is-small" v-text="date"></button>
      </div>
      </div>
    </div>
    <section>
      <div class="tabs is-boxed">
      <ul>
        <li><router-link to="/kereta/jadwal">Jadwal</router-link></li>
        <li><router-link to="/kereta/kereta">Kereta</router-link></li>
        <li><router-link to="/kereta/stasiun">Stasiun</router-link></li>
      </ul>
      </div>
    </section>
    <router-view></router-view>
  </main>
</template>