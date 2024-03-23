import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'user.login',
      component: () => import('../views/User/Login.vue')
    },
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
})

export default router
