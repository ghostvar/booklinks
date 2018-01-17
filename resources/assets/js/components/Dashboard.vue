<template>
  <main class="column main">
    <div>
        <nav class="breadcrumb is-small" aria-label="breadcrumbs">
          <ul>
            <li><router-link to="/">Home</router-link></li>
            <li class="is-active"><a href="#" aria-current="page">Dashboard</a></li>
          </ul>
        </nav>

        <div class="level">
          <div class="level-left">
            <div class="level-item">
              <div class="title has-text-success">Dashboard</div>
            </div>
          </div>
          <div class="level-right">
            <div class="level-item">
              <button type="button" class="button is-small" v-text="date"></button>
            </div>
          </div>
        </div>
        <div class="columns is-multiline">
          <div class="column">
            <div class="box notification is-success">
              <div class="heading">Total Santri</div>
              <div class="title">6,950</div>
              <div class="level">
                <div class="level-item">
                  <div class="">
                    <div class="heading">Putra</div>
                    <div class="title is-5">46.75%</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Putri</div>
                    <div class="title is-5">64.25%</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="box notification is-warning">
              <div class="heading">Total Pelajar</div>
              <div class="title">3,520</div>
              <div class="level">
                <div class="level-item">
                  <div class="">
                    <div class="heading">Siswa</div>
                    <div class="title is-5">65%</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Mahasiswa</div>
                    <div class="title is-5">45%</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="box notification is-info">
              <div class="heading">Total Pengurus</div>
              <div class="title">78%</div>
              <div class="level">
                <div class="level-item">
                  <div class="">
                    <div class="heading">Wali Asuh</div>
                    <div class="title is-5">368</div>
                  </div>
                </div>
                <div class="level-item">
                  <div class="">
                    <div class="heading">Mahasiswa</div>
                    <div class="title is-5">510</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="column">
            <div class="box notification is-danger">
              <div class="heading">Total Pegawai</div>
              <div class="title">249</div>
              <div class="level">
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
              </div>
            </div>
          </div>
        </div>
        </div>
        </main>
</template>
