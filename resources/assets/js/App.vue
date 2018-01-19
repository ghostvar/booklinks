<template>
<div>
    <section class="hero navbar is-primary has-shadow hero-header">
        <div class="hero-body">
            <div class="container-fluid">
                <h1 class="title">BookingLinks</h1>
                <h2 class="subtitle">Aplikasi Ticketing Pesawat dan Kereta</h2>
            </div>
        </div>
    </section>
    <div class="columns">
      <!-- MENU -->
      <div class="column is-2 column-menu">
        <aside class="menu hero is-fullheight is-info">
          <ul class="menu-list">
            <li>
              <router-link to="/dashboard"><i class="fa fa-bar-chart"></i>Dashboard</router-link>
            </li>
            <li>
              <router-link to="/pemesanan"><i class="fa fa-suitcase"></i>Pemesanan</router-link>
            </li>
            <li>
              <router-link to="/pelanggan"><i class="fa fa-users"></i>Pelanggan</router-link>
            </li>
            <li>
              <router-link to="/kereta"><i class="fa fa-train"></i>Kereta</router-link>
            </li>
            <li>
              <a><i class="fa fa-plane"></i>Penerbangan</a>
            </li>
          </ul>
        </aside>
      </div>
      <!-- KONTEN -->
      <div class="column is-content">
        <router-view></router-view>
      </div>
    </div>
</div>    
</template>

<script>
export default {
  mounted() {
    this.init();
  }
}
</script>