import { createRouter, createWebHistory } from 'vue-router'

import registerView from '../views/registerView.vue'
import signinView from '../views/signinView.vue'
import homeView from '../views/homeView.vue'
import dashboardAdminView from '../views/dashboardAdminView.vue'
import statsAdminView from '../views/statsAdminView.vue'
import usersAdminView from '../views/usersAdminView.vue'


const routes = [
  {
    path: '/',
    name: 'home',
    component: homeView
  },
  {
    path: '/register',
    name: 'register',
    component: registerView
  },
  {
    path: '/signin',
    name: 'signin',
    component: signinView
  },
  {
    path: '/dashboardadmin',
    name: 'dashboardadmin',
    component: dashboardAdminView,
    children:[
      {
        path: 'stats',
        name: 'stats',
        component: statsAdminView
      },
      {
        path: 'users',
        name: 'users',
        component: usersAdminView
      }

    ]
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
