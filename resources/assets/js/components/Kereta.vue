<template>
  <main class="column main is-fullheight">
      <div>
        <nav class="breadcrumb is-small" aria-label="breadcrumbs">
          <ul>
            <li><router-link to="/">Home</router-link></li>
            <li class="is-active"><a href="#" aria-current="page">Kereta</a></li>
          </ul>
        </nav>

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
          <div class="tabs is-boxed is-small">
            <ul>
              <li class="is-active"><a>Jadwal</a></li>
              <li><a>Kereta</a></li>
              <li><a>Stasiun</a></li>
            </ul>
          </div>
        </section>
      </div>
    </main>
</template>