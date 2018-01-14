import Router from 'vue-router'

function load(path) {
    return require(`../components/${path}`);
}

export default new Router({
    mode: "hash",
    routes: [
        {
            path: '/dashboard',
            component: load('Dashboard')
        },
        // Redirection
        { path: '*', redirect: '/dashboard' },
        { path: '/', redirect: '/dashboard' }
    ]
})