import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },


  {
    path: '/ajout-article',
    name: 'ajout-article',
    component: () => import('../views/AddArticleView.vue')
  }, 

  {
    path: '/salle-de-bain',
    name: 'salle-de-bain',
    component: () => import('../views/BathroomView.vue')
  }, 

  {
    path: '/chambre',
    name: 'chambre',
    component: () => import('../views/BedroomView.vue')
  }, 

  {
    path: '/connexion',
    name: 'connexion',
    component: () => import('../views/ConnexionView.vue')
  }, 



  {
    path: '/jardin',
    name: 'jardin',
    component: () => import('../views/GardenView.vue')
  },

  {
    path: '/inscription',
    name: 'inscription',
    component: () => import('../views/InscriptionView.vue')
  },


  {
    path: '/cuisine',
    name: 'cuisine',
    component: () => import('../views/KitchenView.vue')
  },



  {
    path: '/salon',
    name: 'salon',
    component: () => import('../views/LivingroomView.vue')
  },



  {
    path: '/profil',
    name: 'profil',
    component: () => import('../views/ProfilView.vue')
  },


  {
    path: '/article/:id',
    name: 'article-piece',
    component: () => import('../views/SingleArticleView.vue')
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
