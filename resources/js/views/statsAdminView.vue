<template>
<div class="flex-grow text-gray-800">
    <header class="flex items-center h-20 px-6 sm:px-10 bg-white">
      <button class="block sm:hidden relative flex-shrink-0 p-2 mr-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 focus:bg-gray-100 focus:text-gray-800 rounded-full">
        <span class="sr-only">Menu</span>
          <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
        </svg>
      </button>
      <div class="flex flex-shrink-0 items-center ml-auto">
        <button class="inline-flex items-center p-2 hover:bg-gray-100 focus:bg-gray-100 rounded-lg">
          <span class="sr-only">User Menu</span>
          <div class="hidden md:flex md:flex-col md:items-end md:leading-tight">
            <span class="font-semibold">Mustapha FATIHI</span>
            <span class="text-sm text-gray-600">Administrateur</span>
          </div>
          <span class="h-12 w-12 ml-2 sm:ml-3 mr-2 bg-gray-100 rounded-full overflow-hidden">
            <img src="https://randomuser.me/api/portraits/men/68.jpg" alt="user profile photo" class="h-full w-full object-cover">
          </span>
          <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor" class="hidden sm:block h-6 w-6 text-gray-300">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg> 
        </button>
        <div class="border-l pl-3 ml-3 space-x-1">
          <button class="relative p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
            <span class="sr-only">Notifications</span>
            <span class="absolute top-0 right-0 h-2 w-2 mt-1 mr-2 bg-red-500 rounded-full"></span>
            <span class="absolute top-0 right-0 h-2 w-2 mt-1 mr-2 bg-red-500 rounded-full animate-ping"></span>
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button>
          <button class="relative p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100 focus:text-gray-600 rounded-full">
            <span class="sr-only">Log out</span>
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
</svg>
          </button>
        </div>
      </div>
    </header>
    <main class="p-6 sm:p-10 space-y-6">
      <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
          <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-white bg-blue-700 rounded-full mr-6">
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <div>
            <span class="block text-2xl font-bold">{{ stats.nbrAnnonceurs }}</span>
            <span class="block text-cyan-300">Annonceurs</span>
          </div>
        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
          <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-white bg-blue-700 rounded-full mr-6">
            <svg class="w-6 h-6" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>validate</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Combined-Shape" fill="#FFFFFF" transform="translate(64.000000, 63.999974)"> <path d="M336.9,-1.42108547e-14 L306.419,42.666 L42.6666667,42.6666928 L42.6666667,341.333359 L341.333333,341.333359 L341.333,140.606 L384,80.872 L384,384.000026 L1.42108547e-14,384.000026 L1.42108547e-14,2.61499954e-05 L336.9,-1.42108547e-14 Z M345.307019,24.9336114 L380.026314,49.7331076 L205.714356,293.769849 L65.2539169,159.416386 L94.7460831,128.583667 L199.616,228.885359 L345.307019,24.9336114 Z M357.333333,2.61499954e-05 L357.333,7.308 L347.102,-1.42108547e-14 L357.333333,2.61499954e-05 Z"> </path> </g> </g> </g></svg>
          </div>
          <div>
            <span class="block text-2xl font-bold">{{ stats.nbrProfilsToValidate }}</span>
            <span class="block text-cyan-300">Profils annonceurs à valider</span>
          </div>
        </div>
      </section>
      <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
          <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-white bg-blue-700 rounded-full mr-6">
            <svg class="w-6 h-6" fill="#FFFFFF" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg" id="memory-archive"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M2 2H20V8H19V20H3V8H2V2M17 18V8H5V18H17M4 4V6H18V4H4M7 10H15V12H7V10Z"></path></g></svg>
          </div>
          <div>
            <span class="block text-2xl font-bold">{{ stats.nbrArchivedOffers }}</span>
            <span class="block text-cyan-300">Offres archivées</span>
          </div>
        </div>
        <div class="flex items-center p-8 bg-white shadow rounded-lg">
          <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-white bg-blue-700 rounded-full mr-6">
            <svg class="h-6 w-6" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><g> <path fill="#FFFFFF" d="M505.837,180.418L279.265,76.124c-7.349-3.385-15.177-5.093-23.265-5.093c-8.088,0-15.914,1.708-23.265,5.093 L6.163,180.418C2.418,182.149,0,185.922,0,190.045s2.418,7.896,6.163,9.627l226.572,104.294c7.349,3.385,15.177,5.101,23.265,5.101 c8.088,0,15.916-1.716,23.267-5.101l178.812-82.306v82.881c-7.096,0.8-12.63,6.84-12.63,14.138c0,6.359,4.208,11.864,10.206,13.618 l-12.092,79.791h55.676l-12.09-79.791c5.996-1.754,10.204-7.259,10.204-13.618c0-7.298-5.534-13.338-12.63-14.138v-95.148 l21.116-9.721c3.744-1.731,6.163-5.504,6.163-9.627S509.582,182.149,505.837,180.418z"></path> <path fill="#FFFFFF" d="M256,346.831c-11.246,0-22.143-2.391-32.386-7.104L112.793,288.71v101.638 c0,22.314,67.426,50.621,143.207,50.621c75.782,0,143.209-28.308,143.209-50.621V288.71l-110.827,51.017 C278.145,344.44,267.25,346.831,256,346.831z"></path> </g> </g></svg>
          </div>
          <div>
            <span class="block text-2xl font-bold">{{ stats.nbrStudentOffers }}</span>
            <span class="block text-cyan-300">Offres adaptées étudiant</span>
          </div>
        </div>
        <div class="row-span-3 bg-white shadow rounded-lg">
          <div class="flex items-center justify-between px-6 py-5 font-semibold border-b border-gray-100">
            <span>Meilleurs annonceurs</span>
            <button type="button" class="inline-flex justify-center rounded-md px-1 -mr-1 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-600" id="options-menu" aria-haspopup="true" aria-expanded="true">
              Descending
              <svg class="-mr-1 ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
            <!-- Refer here for full dropdown menu code: https://tailwindui.com/components/application-ui/elements/dropdowns -->
          </div>
          <div class="overflow-y-auto" style="max-height: 24rem;">
            <ul class="p-6 space-y-6">
              <bestAnnonceur v-for="bestAnnonceur in bestAnnonceurs" :name="bestAnnonceur.name" :nbrAnnonces="bestAnnonceur.nbrAnnonces" />
            </ul>
          </div>
        </div>
      </section>
    </main>
  </div>
</template>
<script>

import bestAnnonceur from '../components/bestAnnonceur.vue'

export default {

    name:'statsAdminView',
    components:{
      bestAnnonceur,

    },
    data(){
      return{
        stats:{

          "nbrAnnonceurs":0,
          "nbrArchivedOffers":0,
          "nbrProfilsToValidate":0,
          "nbrStudentOffers":0

        },
        bestAnnonceurs: []
      }
    },
    created(){

      axios
          .get('http://localhost:8000/api/offer/stats',
          {
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
                }
          })
          .then(response => this.stats = response.data)
      

      axios
      .get('http://localhost:8000/api/offer/bestannonceurs',
      {
            headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
            }
      })
      .then(response => this.bestAnnonceurs = response.data)

    }

}
</script>