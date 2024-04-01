import {createRouter, createWebHistory} from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'login.layout',
            component: () => import('../views/Components/LoginLayout.vue'),
            children: [
                {
                    path: '/login',
                    name: 'login',
                    component: () => import('../views/User/Login.vue'),
                },
                {
                    path: '/registration',
                    name: 'login.registration',
                    component: () => import('../views/User/Registration.vue'),
                }
            ]
        },
        {
            path: '/button',
            component: () => import('../views/Components/MainLayout.vue'),
            children: [
                {
                    path: '/button',
                    name: 'button',
                    component: () => import('../views/Index.vue')
                },
                {
                    path: '/settings',
                    name: 'settings',
                    component: () => import('../views/Pages/Settings.vue')
                },
            ]
        },
        {
            path: '/:pathMatch(.*)*',
            name:'404',
            component: () => import('../views/Pages/PageNotFound.vue')
        }
    ]
})
router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('access_token')

    if(to.name !== 'login')
    {
        if(!token){
            return next({
                name: 'login'
            })
        }
    }
    if(to.name === 'login' && token){
        return next({
            name: 'button'
        })
    }

    next();
})

export default router
