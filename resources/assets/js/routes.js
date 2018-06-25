import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/Home')
    },

    {
      path: '/add',
      component: require('./views/AddUser')
    }
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});