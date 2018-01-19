import Router from 'vue-router'
import Vue from 'vue'

function load(path) {
    return require(`../components/${path.replace('.', '/')}`);
}

Vue.use(Router)

export default new Router({
    mode: 'hash',
    routes: [
        {
            path: '/dashboard',
            component: load('Dashboard')
        },
        {
            path: '/pemesanan',
            component: load('Pemesanan')
        },
        {
            path: '/kereta',
            component: load('kereta.Main'),
            children: [
                { path: '', redirect: 'jadwal' },
                {
                    path: 'jadwal',
                    component: load('kereta.Jadwal')
                },
                {
                    path: 'kereta',
                    component: load('kereta.List')
                },
                {
                    path: 'stasiun',
                    component: load('kereta.Stasiun')
                }
            ]
        },
        {
            path: '/pelanggan',
            component: load('Pelanggan')
        },
        // Redirection
        { path: '*', redirect: '/dashboard' },
        { path: '/', redirect: '/dashboard' }
    ]
});