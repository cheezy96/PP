/**
 * router/index.ts
 *
 * Automatic routes for `./src/pages/*.vue`
 */

// Composables
// import { createRouter, createWebHistory } from 'vue-router/auto'
// import { setupLayouts } from 'virtual:generated-layouts'
// import { routes } from 'vue-router/auto-routes'

// const router = createRouter({
//   history: createWebHistory(import.meta.env.BASE_URL),
//   routes: setupLayouts(routes),
// })

// // Workaround for https://github.com/vitejs/vite/issues/11804
// router.onError((err, to) => {
//   if (err?.message?.includes?.('Failed to fetch dynamically imported module')) {
//     if (!localStorage.getItem('vuetify:dynamic-reload')) {
//       console.log('Reloading page to fix dynamic import error')
//       localStorage.setItem('vuetify:dynamic-reload', 'true')
//       location.assign(to.fullPath)
//     } else {
//       console.error('Dynamic import error, reloading page did not fix it', err)
//     }
//   } else {
//     console.error(err)
//   }
// })

// router.isReady().then(() => {
//   localStorage.removeItem('vuetify:dynamic-reload')
// })

// export default router



import '../styles/style.css';
/**
 * router/index.ts
 *
 * Automatic routes for `./src/pages/*.vue`
 */

// Composables
import { createRouter, createWebHistory } from 'vue-router'
import SampleView from '@/pages/SampleView.vue'
import index from '@/pages/index.vue'
import ProductView from '@/pages/ProductView.vue'
import RegisterView from '@/pages/RegisterView.vue'



const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/sample',
      name: 'sample',
      component: SampleView
    },
    {
      path: '/',
      name: 'index',
      component: index
    },
    {
      path: '/product',
      name: 'product',
      component: ProductView
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView
    },
  ]
})

export default router

