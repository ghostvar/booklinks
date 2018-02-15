<template>
  <main class="column main is-fullheight">
    <div class="level">
      <div class="level-left">
      <div class="level-item">
        <div class="title has-text-success">About</div>
      </div>
      </div>
      <div class="level-right">
      <div class="level-item">
        <div class="control">
          <button type="button" class="button is-small" v-text="$store.state.date"></button>
        </div>
      </div>
      </div>
    </div>
    <section>
      <h4 class="title is-4"></h4>
      <h4 class="subtitle is-4"></h4>
    </section>
  </main>
</template>
