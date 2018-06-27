import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/Home'),
        props: true
    },

    {
        path: '/add',
        component: require('./views/AddUser')
    },

    {
        name: 'edit',
        path: '/edit/:userId',
        component: require('./views/EditUser'),
        props: true
    }
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});