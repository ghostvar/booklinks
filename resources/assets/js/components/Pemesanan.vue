<template>
  <main class="column main hero is-fullheight">
      <div>
        <nav class="breadcrumb is-small" aria-label="breadcrumbs">
          <ul>
            <li><router-link to="/">Home</router-link></li>
            <li class="is-active"><a href="#" aria-current="page">Pemesanan</a></li>
          </ul>
        </nav>

        <div class="level">
          <div class="level-left">
            <div class="level-item">
              <div class="title has-text-success">Pemesanan</div>
            </div>
          </div>
          <div class="level-right">
            <div class="level-item">
              <button type="button" class="button is-small" v-text="date"></button>
            </div>
          </div>
        </div>
        <section>
            <table class="table is-fullwidth is-hoverable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Tiket</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(pesan, id) in pemesanan" :key="id" @click="selectPesanan(pesan)" :class="{ 'is-selected': (selectedPesanan == pesan ? true: false) }">
                        <td v-text="id+1"></td>
                        <td v-text="pesan.name"></td>
                        <td v-text="pesan.jenis"></td>
                        <td v-text="pesan.tanggal"></td>
                    </tr>
                </tbody>
            </table>
        </section>
        </div>
    </main>
</template>