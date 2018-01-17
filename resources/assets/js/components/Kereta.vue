<template>
  <main class="column main is-fullheight">
      <div>
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
          <div class="tabs is-small">
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