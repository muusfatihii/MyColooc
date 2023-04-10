import { createRouter, createWebHistory } from 'vue-router'

import registerView from '../views/registerView.vue'
import signinView from '../views/signinView.vue'
import homeView from '../views/homeView.vue'
import dashboardAdminView from '../views/dashboardAdminView.vue'
import statsAdminView from '../views/statsAdminView.vue'
import usersAdminView from '../views/usersAdminView.vue'
import validateUsersAdminView from '../views/validateUsersAdminView.vue'
import archivedOffersView from '../views/archivedOffersView.vue'
import offersView from '../views/offersView.vue'
import offerDescriptionView from '../views/offerDescriptionView.vue'
import dashboardAnnonceurView from '../views/dashboardAnnonceurView.vue'
import myOffersView from '../views/myOffersView.vue'
import myInterestsView from '../views/myInterestsView.vue'
import addOfferView from '../views/addOfferView.vue'
import myPocketView from '../views/myPocketView.vue'
import myProfil from '../views/myProfil.vue'





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
    path: '/offers',
    name: 'offers',
    component: offersView
  },
  {
    path: '/offerdescription',
    name: 'offerdescription',
    component: offerDescriptionView
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
      },
      {
        path: 'validate',
        name: 'validate',
        component: validateUsersAdminView
      },
      {
        path: 'archivedoffers',
        name: 'archivedoffers',
        component: archivedOffersView
      }

    ]
  },
  {
    path: '/dashboardAnnonceur',
    name: 'dashboardAnnonceur',
    component: dashboardAnnonceurView,
    children: [
      {
        path: 'myoffers',
        name: 'myOffers',
        component: myOffersView
      },
      {
        path: 'myinterests',
        name: 'myInterests',
        component: myInterestsView
      },
      {
        path: 'addoffer',
        name: 'addOffer',
        component: addOfferView
      },
      {
        path: 'mypocket',
        name: 'myPocket',
        component: myPocketView
      },
      {
        path: 'myprofil',
        name: 'myProfil',
        component: myProfil

      }
    ]
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
