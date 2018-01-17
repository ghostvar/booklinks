import Router from 'vue-router'

function load(path) {
    return require(`../components/${path}`);
}

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
            component: load('Kereta')
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