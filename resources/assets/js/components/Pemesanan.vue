<template>
  <main class="column main is-fullheight">
    <div class="level">
      <div class="level-left">
      <div class="level-item">
        <div class="title has-text-success">Pemesanan</div>
      </div>
      </div>
      <div class="level-right">
      <div class="level-item">
        <button type="button" class="button is-small" v-text="$store.state.date"></button>
      </div>
      </div>
    </div>
    <section>
      <div class="control">
        <span v-if="!used.id">
          <button class="button is-success">Tambah</button>
        </span>
        <span v-if="used.id">
          <button class="button is-primary" @click="initPesanan()">Batal</button>
          <button class="button is-success">Ubah</button>
          <button class="button is-danger">Hapus</button>
        </span>
      </div>
    </section>
    <section>
      <table class="table is-fullwidth is-hoverable is-small">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kode Booking</th>
            <th>Jenis Tiket</th>
            <th>Creted</th>
            <th>Updated</th>
            <th>Status</th>
            <th>Status Pembayaran</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(pesanan, id) in $store.state.pemesanan" :key="id" @click="selectPesanan(pesanan)" @dblclick="actionPesanan(pesanan)" :class="{ 'is-selected': (used.id == pesanan.id ? true: false) }">
            <td v-text="id+1"></td>
            <td v-text="pesanan.name"></td>
            <td v-text="pesanan.booking_code"></td>
            <td v-text="pesanan.jenis"></td>
            <td v-text="pesanan.created_at"></td>
            <td v-text="pesanan.updated_at"></td>
            <td v-text="(pesanan.status ? pesanan.status: 'N/A')"></td>
            <td v-text="(pesanan.payment_status ? pesanan.payment_status: 'N/A')"></td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>
</template>

<script>
export default {
  mounted() {
    this.initPesanan()
  }
}
</script>
