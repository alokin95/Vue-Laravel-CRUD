import VueRouter from 'vue-router';

let routes = [
    {
        name: 'Home',
        path: '/',
        component: require('./views/Home'),
        props: true
    },

    {
        path: '/add',
        component: require('./views/AddUser'),
        props: true
    },

    {
        name: 'edit',
        path: '/edit',
        component: require('./views/EditUser'),
        props: true
    }
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});