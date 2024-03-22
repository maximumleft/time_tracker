import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/platform',
      name: 'platform',
      component: () => import('../views/Index.vue')
    },
    {
      path: '/login',
      name: 'user.login',
      component: () => import('../views/User/Login.vue')
    },
  ]
})

export default router
