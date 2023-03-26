import { createRouter, createWebHistory} from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/cats',
      name: 'CatIndex',
      component: () => import('../views/cats/CatIndex.vue')
    },
        {
      path: '/cats/create',
      name: 'CatCreate',
      component: () => import('../views/cats/CatCreate.vue')
    },
            {
      path: '/cats/:id/edit',
      name: 'CatEdit',
      component: () => import('../views/cats/CatEdit.vue')
    },
    //             {
    //   path: '/cats/:id/delete',
    //   name: 'CatDelete',
    //   component: () => import('../views/cats/CatDelete.vue')
    // }
  ],
})

export default router
