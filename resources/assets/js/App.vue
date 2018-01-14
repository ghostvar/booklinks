<template>
<div>
    <section class="hero is-primary hero-header">
        <div class="hero-body">
            <div class="container-fluid">
                <h1 class="title">Primary title</h1>
                <h2 class="subtitle">Primary subtitle</h2>
            </div>
        </div>
    </section>
    <div class="columns">
      <!-- MENU -->
      <div class="column is-2 column-menu">
        <aside class="menu hero is-fullheight is-info">
          <ul class="menu-list">
            <li>
              <a><i class="fa fa-file-text-o"></i>Formulir</a>
            </li>
            <li>
              <a><i class="fa fa-building-o"></i>Pesantren</a>
            </li>
            <li>
              <a><i class="fa fa-university"></i>Lembaga</a>
            </li>
            <li>
              <a><i class="fa fa-level-up"></i>Alumni</a>
            </li>
            <li>
              <a><i class="fa fa-cogs"></i>Pengaturan</a>
            </li>
            <li>
              <a class="is-active"><i class="fa fa-bar-chart"></i>Statistik</a>
            </li>
          </ul>
        </aside>
      </div>
      <!-- KONTEN -->
      <div class="column is-content">
        <dashboard></dashboard>
      </div>
    </div>
</div>    
</template>

<script>
import ExampleComponent from './components/ExampleComponent'
import Dashboard from './components/Dashboard'
export default {
    components: { ExampleComponent, Dashboard }
}
</script>