import Vue from "vue";
import Router from "vue-router";

const V_Route = () => import('../components/App');

Vue.use(Router);

export default new Router ({
    mode:'history',
    routes: [
        {
            path: '/app',
            name: 'routeName',
            // meta: {
            //     requireAuth: true //需要登录
            // },
            component: V_Route
        },
    ],
});