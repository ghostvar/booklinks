import Router from 'vue-router'
import Vue from 'vue'

// function load(path) {
//     return require(`./components/${path.replace('.', '/')}`);
// }

Vue.use(Router)

export default new Router({
    mode: 'hash',
    routes: [
        {
            path: '/dashboard',
            component: require('./components/Dashboard')
        },
        {
            path: '/pemesanan',
            component: require('./components/Pemesanan')
        },
        {
            path: '/kereta',
            component: require('./components/Kereta'),
            children: [
                { path: '', redirect: 'jadwal' },
                {
                    path: 'jadwal',
                    component: require('./views/kereta/Jadwal')
                },
                {
                    path: 'kereta',
                    component: require('./views/kereta/Kereta')
                },
                {
                    path: 'stasiun',
                    component:  require('./views/kereta/Stasiun')
                }
            ]
        },
        {
            path: '/pelanggan',
            component: load('Pelanggan')
        },
        {
            path: '/penerbangan',
            component: load('Penerbangan')
        },
        // Redirection
        { path: '*', redirect: '/dashboard' },
        { path: '/', redirect: '/dashboard' }
    ]
});