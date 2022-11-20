import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },

  {
    path: '/rooms/:id',
    name: 'single-room',
    component: () => import('../views/SingleRoomView.vue')
  },

  {
    path: '/tips/:id',
    name: 'single-tips',
    component: () => import('../views/SingleTipsView.vue')
  },


  {
    path: '/:pathMatch(.*)*',
    name: 'no-found',
    component: () => import('../views/404View.vue')
  }, 
  {
    path: '/ajout-article',
    name: 'ajout-article',
    component: () => import('../views/AddArticleView.vue')
  }, 

  {
    path: '/connexion',
    name: 'connexion',
    component: () => import('../views/ConnexionView.vue')
  }, 


  {
    path: '/inscription',
    name: 'inscription',
    component: () => import('../views/InscriptionView.vue')
  },

  {
    path: '/profil',
    name: 'profil',
    component: () => import('../views/ProfilView.vue')
  },



  {
    path: '/connexion',
    name: 'connexion',
    component: () => import('../views/ConnexionView.vue')
  }, 


  {
    path: '/inscription',
    name: 'inscription',
    component: () => import('../views/InscriptionView.vue')
  },

  {
    path: '/contact',
    name: 'contact',
    component: () => import('../views/ContactView.vue')
  },


  {
    path: '/qui-sommes-nous',
    name: 'qui-sommes-nous',
    component: () => import('../views/AboutView.vue')
  },



  {
    path: '/politique-de-confidentialite',
    name: 'politique-de-confidentialite',
    component: () => import('../views/PrivacyView.vue')
  },


  {
    path: '/mentions-legales',
    name: 'mentions',
    component: () => import('../views/LegalView.vue')
  },
  
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
