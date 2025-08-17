import Landingpage from '@/components/landingpage.vue'
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {path:'/', component: Landingpage},
  ],
})

export default router
