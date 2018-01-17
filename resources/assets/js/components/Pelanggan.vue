<template>
  <main class="column main is-fullheight">
      <div>
        <nav class="breadcrumb is-small" aria-label="breadcrumbs">
          <ul>
            <li><router-link to="/">Home</router-link></li>
            <li class="is-active"><a href="#" aria-current="page">Pelanggan</a></li>
          </ul>
        </nav>

        <div class="level">
          <div class="level-left">
            <div class="level-item">
              <div class="title has-text-success">Pelanggan</div>
            </div>
          </div>
          <div class="level-right">
            <div class="level-item">
              <button type="button" class="button is-small" v-text="date"></button>
            </div>
          </div>
        </div>
        <section>
            <table class="table is-fullwidth is-hoverable is-small">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Created at</th>
						<th>Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, id) in pelanggan.data" :key="id" @click="selectPelanggan(user)" :class="{ 'is-selected': (pelanggan.selected == user ? true:false) }">
                        <td v-text="id+1"></td>
                        <td v-text="user.name"></td>
                        <td v-text="user.kota"></td>
                        <td v-text="user.created_at"></td>
						<td v-text="user.updated_at"></td>
                    </tr>
                </tbody>
            </table>
        </section>
        </div>
    </main>
</template>