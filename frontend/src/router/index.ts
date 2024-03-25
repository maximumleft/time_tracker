import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name:'login',
      component: () => import('../views/Components/LoginLayout.vue'),
      children: [
        {
          path: '/',
          component: () => import('../views/User/Login.vue'),
        },
        {
          path: '/registration',
          name:'login.registration',
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


  ]
})

export default router
