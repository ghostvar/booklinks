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
            path: '/pelanggan',
            component: require('./components/Pelanggan')
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
            path: '/penerbangan',
            component: require('./components/Penerbangan'),
            children: [
                { path: '', redirect: 'jadwal' },
                {
                    path: 'jadwal',
                    component: require('./views/penerbangan/Jadwal')
                },
                {
                    path: 'pesawat',
                    component: require('./views/penerbangan/Pesawat')
                },
                {
                    path: 'bandara',
                    component: require('./views/penerbangan/Bandara')
                }
            ]
        },
        {
            path: '/about',
            component: require('./components/About')
        },
        // Redirection
        { path: '*', redirect: '/dashboard' },
        { path: '/', redirect: '/dashboard' }
    ]
});