<template>
  <main class="column main">
        <div class="level">
          <div class="level-left">
            <div class="level-item">
              <div class="title has-text-success">Dashboard</div>
            </div>
          </div>
          <div class="level-right">
            <div class="level-item">
              <button type="button" class="button is-small" v-text="$store.state.date"></button>
            </div>
          </div>
        </div>
        <div class="columns is-multiline">
          <div class="column">
            <div class="box notification is-success">
              <div class="heading">Total Penerbangan</div>
              <div class="title" v-text="$store.state.dataTotal.penerbangan">0</div>
              <div class="level">
                <div class="level-item">
                  <div class="">
                    <div class="heading">Bandara</div>
                    <div class="title is-5" v-text="$store.state.dataTotal.bandara">0</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Pesawat</div>
                    <div class="title is-5" v-text="$store.state.dataTotal.pesawat">0</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="box notification is-warning">
              <div class="heading">Total Kereta</div>
              <div class="title" v-text="$store.state.dataTotal.kereta">0</div>
              <div class="level">
                <div class="level-item">
                  <div class="">
                    <div class="heading">Rute</div>
                    <div class="title is-5" v-text="$store.state.dataTotal.rute">0</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Stasiun</div>
                    <div class="title is-5" v-text="$store.state.dataTotal.stasiun">0</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="box notification is-info">
              <div class="heading">Total Pelanggan</div>
              <div class="title" v-text="$store.state.dataTotal.pelanggan">0</div>
              <div class="level">
                <div class="level-item">
                  <div class="">
                    <div class="heading">Aktif</div>
                    <div class="title is-5">N/A</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Non Aktif</div>
                    <div class="title is-5">N/A</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="box notification is-danger">
              <div class="heading">Total Administrator</div>
              <div class="title" v-text="$store.state.dataTotal.admin">0</div>
              <!--div class="level">
                <div class="level-item">
                  <div class="">
                    <div class="heading">Sekolah</div>
                    <div class="title is-5">106K</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Universitas</div>
                    <div class="title is-5">+ 28,5%</div>
                  </div>
                </div>
              </div-->
            </div>
          </div>
        </div>
        </main>
</template>
