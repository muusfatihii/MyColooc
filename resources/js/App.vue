<template>
<header>
<div class="header z-50 sticky top-0 bg-cyan-50 shadow-md flex items-center justify-between px-8 py-02">
    <!-- logo -->
    <h1 class="w-3/12">
        <div>
          <RouterLink to="/"><span class="text-blue-700 text-lg">My</span><span class="text-cyan-400 text-lg">Coloc</span></RouterLink>
        </div>
    </h1>

    <!-- navigation -->
    <nav class="nav font-light text-md">
        <ul class="flex items-center">
            <li class="p-4 border-b-2 border-cyan-400 border-opacity-0 text-blue-700 hover:border-opacity-50 hover:text-cyan-500 duration-200 cursor-pointer active">
              <RouterLink to="/">MyColoc</RouterLink>
            </li>
            <li class="p-4 border-b-2 border-cyan-400 border-opacity-0 text-blue-700 hover:border-opacity-50 hover:text-cyan-500 duration-200 cursor-pointer">
              <RouterLink to="/offers" href="">Annonces</RouterLink>
            </li>
            <li v-if="authStore.isAuthenticated && authStore.isadmin" class="p-4 border-b-2 border-cyan-400 border-opacity-0 text-blue-700 hover:border-opacity-50 hover:text-cyan-500 duration-200 cursor-pointer">
              <RouterLink to="/dashboardadmin" href="">Dashboard</RouterLink>
            </li>
            <li v-if="authStore.isAuthenticated && !authStore.isadmin" class="p-4 border-b-2 border-cyan-400 border-opacity-0 text-blue-700 hover:border-opacity-50 hover:text-cyan-500 duration-200 cursor-pointer">
              <RouterLink to="/dashboardAnnonceur" href="">Dashboard</RouterLink>
            </li>
            <li @click="logout" v-if="authStore.isAuthenticated" class="p-4 border-b-2 border-cyan-400 border-opacity-0 text-blue-700 hover:border-opacity-50 hover:text-cyan-500 duration-200 cursor-pointer">
              Log Out
            </li>
            <li v-if="!authStore.isAuthenticated" class="p-4 border-b-2 border-cyan-400 border-opacity-0 text-blue-700 hover:border-opacity-50 hover:text-cyan-500 duration-200 cursor-pointer">
              <RouterLink to="/register">S'inscrire</RouterLink>
            </li>
            <li v-if="!authStore.isAuthenticated" class="ml-5 p-2 rounded font-light bg-blue-700 text-white cursor-pointer">
              <RouterLink to="/signin">Se connecter</RouterLink>
            </li>
        </ul>
    </nav>

</div>

<router-view :idClient="authStore.iduser" searchedCity="'Agadir'" />

<section class="p-6 dark:bg-gray-800 dark:text-gray-100">
		<div class="container grid gap-6 mx-auto text-center lg:grid-cols-2 xl:grid-cols-5">
			<div class="w-full px-6 py-16 rounded-md sm:px-12 md:px-16 xl:col-span-2 dark:bg-gray-900">
				<h1 class="text-3xl font-light text-blue-700 dark:text-gray-50">Ici vous trouvez Votre Colocation <span class="text-cyan-500">idéale.</span></h1>
				<p class="my-12">
					<span class="font-light dark:text-gray-50 text-start">Modular and versatile.Fugit vero facilis dolor sit neque cupiditate minus esse accusamus cumque at.</span>
				</p>
				<form action="" class="self-stretch ng-untouched ng-pristine ng-valid">
					<div class="flex rounded-md overflow-hidden w-full">
                        <input id="searchedCity" type="text" class="px-5 w-full rounded-md rounded-r-none text-blue-700 border border-sm border-blue-700 font-light"/>
                        <button type="button" @click="searchByCity" class="bg-blue-700 text-white px-4 text-md font-light py-2 rounded-r-md">Serach</button>
          </div>
				</form>
			</div>
			<img src="pics/home_.jpg" 
      alt="" 
      class="object-cover w-full rounded-tl-3xl  xl:col-span-3 dark:bg-gray-500"
      style="border-bottom-right-radius: 12rem;border-top-left-radius: 12rem;">
		</div>
</section>

<section class="my-12 bg-blue-100 bg-opacity-5 pb-5">
    <h2 class="ml-5 mb-10 text-blue-700 font-light text-3xl">Récemment ajoutées</h2>
    <div id="offers" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-20 gap-y-5">
        <a href="#" class="card block rounded-lg p-4 shadow-sm shadow-indigo-100">
      <img
        alt="Home"
        src="https://images.unsplash.com/photo-1613545325278-f24b0cae1224?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
        class="h-56 w-72 rounded-md object-cover"
      />

      <div class="mt-2">
        <dl>
          <div>
            <dt class="sr-only">Price</dt>

            <dd class="text-xs font-medium">2000MDH/Month</dd>
          </div>

          <div>
            <dt class="sr-only text-blue-700">Address</dt>

            <dd class="font-medium text-blue-700">123 Wallaby Avenue, Park Road</dd>
          </div>
        </dl>

        <div class="mt-6 flex items-center gap-8 text-xs">
          <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
            <svg
              class="h-4 w-4 text-blue-700"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"
              />
            </svg>

            <div class="mt-1.5 sm:mt-0">
              <p class="text-gray-500">Parking</p>

              <p class="font-medium">2 spaces</p>
            </div>
          </div>

          <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
            <svg
              class="h-4 w-4 text-blue-700"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"
              />
            </svg>

            <div class="mt-1.5 sm:mt-0">
              <p class="text-gray-500">Bathroom</p>

              <p class="font-medium">2 rooms</p>
            </div>
          </div>

          <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
            <svg
              class="h-4 w-4 text-blue-700"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
              />
            </svg>

            <div class="mt-1.5 sm:mt-0">
              <p class="text-gray-500">Bedroom</p>

              <p class="font-medium">4 rooms</p>
            </div>
          </div>
        </div>
      </div>
        </a>
    </div>
</section>
<section class="p-6 dark:bg-gray-800 dark:text-gray-100">
		<div class="container grid gap-6 mx-auto text-center lg:grid-cols-2 xl:grid-cols-5">
      <img src="pics/home1.jpg" 
      alt="" 
      class="object-cover w-full xl:col-span-3 dark:bg-gray-500"
      style="border-bottom-left-radius: 12rem;border-top-right-radius: 12rem;">
			<div class="w-full px-6 py-16 rounded-md sm:px-12 md:px-16 xl:col-span-2 dark:bg-gray-900">
				<h1 class="text-3xl font-light text-blue-700 dark:text-gray-50">Notre valeur ajoutée</h1>
				<p class="my-12">
					<span class="font-light dark:text-gray-50 text-start">Modular and versatile.Fugit vero facilis dolor sit neque cupiditate minus esse accusamus cumque at.</span>
				</p>
        <ul class="text-md text-blue-700 font-light text-start space-y-5">
          <li>
            <svg fill="#00458B" class="w-4 h-4 inline mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.42 512.42" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M509.313,67.45c-4.16-4.16-10.88-4.267-15.04-0.107L134.06,422.33l-115.2-121.6c-3.733-4.48-10.453-5.12-15.04-1.387 c-4.48,3.733-5.12,10.453-1.387,15.04c0.32,0.32,0.533,0.64,0.853,0.96l122.667,129.493c1.92,2.133,4.693,3.307,7.573,3.307h0.213 c2.773,0,5.44-1.067,7.467-3.093l368-362.667C513.473,78.33,513.473,71.61,509.313,67.45z"></path> </g> </g> </g></svg>
Local le plus adapté aux besoins des étudiants</li>
          <li>
            <svg fill="#00458B" class="w-4 h-4 inline mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.42 512.42" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M509.313,67.45c-4.16-4.16-10.88-4.267-15.04-0.107L134.06,422.33l-115.2-121.6c-3.733-4.48-10.453-5.12-15.04-1.387 c-4.48,3.733-5.12,10.453-1.387,15.04c0.32,0.32,0.533,0.64,0.853,0.96l122.667,129.493c1.92,2.133,4.693,3.307,7.573,3.307h0.213 c2.773,0,5.44-1.067,7.467-3.093l368-362.667C513.473,78.33,513.473,71.61,509.313,67.45z"></path> </g> </g> </g></svg>
             Dans des zones plus sécurisées et dans des appartements tranquils </li>
          <li>
            <svg fill="#00458B" class="w-4 h-4 inline mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.42 512.42" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M509.313,67.45c-4.16-4.16-10.88-4.267-15.04-0.107L134.06,422.33l-115.2-121.6c-3.733-4.48-10.453-5.12-15.04-1.387 c-4.48,3.733-5.12,10.453-1.387,15.04c0.32,0.32,0.533,0.64,0.853,0.96l122.667,129.493c1.92,2.133,4.693,3.307,7.573,3.307h0.213 c2.773,0,5.44-1.067,7.467-3.093l368-362.667C513.473,78.33,513.473,71.61,509.313,67.45z"></path> </g> </g> </g></svg>
            Plus proche de vos établissements</li>
          <li>
            <svg fill="#00458B" class="w-4 h-4 inline mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.42 512.42" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M509.313,67.45c-4.16-4.16-10.88-4.267-15.04-0.107L134.06,422.33l-115.2-121.6c-3.733-4.48-10.453-5.12-15.04-1.387 c-4.48,3.733-5.12,10.453-1.387,15.04c0.32,0.32,0.533,0.64,0.853,0.96l122.667,129.493c1.92,2.133,4.693,3.307,7.573,3.307h0.213 c2.773,0,5.44-1.067,7.467-3.093l368-362.667C513.473,78.33,513.473,71.61,509.313,67.45z"></path> </g> </g> </g></svg>
            Ou des moyens de transport y menant </li>
        </ul>
			</div>
		</div>
</section>
<section class="p-6 dark:bg-gray-800 dark:text-gray-100">
		<div class="container grid gap-6 mx-auto text-center lg:grid-cols-2 xl:grid-cols-5">
			<div class="w-full px-6 py-16 rounded-md sm:px-12 md:px-16 xl:col-span-2 dark:bg-gray-900">
				<h1 class="text-3xl font-light text-blue-700 dark:text-gray-50">Pourquoi Nous?</h1>
				<p class="my-12">
					<span class="font-light dark:text-gray-50 text-start">Modular and versatile.Fugit vero facilis dolor sit neque cupiditate minus esse accusamus cumque at.</span>
				</p>
        <ul class="text-md text-blue-700 font-light text-start space-y-5">
          <li>
            <svg fill="#00458B" class="w-4 h-4 inline mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.42 512.42" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M509.313,67.45c-4.16-4.16-10.88-4.267-15.04-0.107L134.06,422.33l-115.2-121.6c-3.733-4.48-10.453-5.12-15.04-1.387 c-4.48,3.733-5.12,10.453-1.387,15.04c0.32,0.32,0.533,0.64,0.853,0.96l122.667,129.493c1.92,2.133,4.693,3.307,7.573,3.307h0.213 c2.773,0,5.44-1.067,7.467-3.093l368-362.667C513.473,78.33,513.473,71.61,509.313,67.45z"></path> </g> </g> </g></svg>
            Profils des propriètaires validés</li>
          <li>
            <svg fill="#00458B" class="w-4 h-4 inline mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.42 512.42" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M509.313,67.45c-4.16-4.16-10.88-4.267-15.04-0.107L134.06,422.33l-115.2-121.6c-3.733-4.48-10.453-5.12-15.04-1.387 c-4.48,3.733-5.12,10.453-1.387,15.04c0.32,0.32,0.533,0.64,0.853,0.96l122.667,129.493c1.92,2.133,4.693,3.307,7.573,3.307h0.213 c2.773,0,5.44-1.067,7.467-3.093l368-362.667C513.473,78.33,513.473,71.61,509.313,67.45z"></path> </g> </g> </g></svg>
            Idée fiable de local de l'intérieur</li>
          <li>
            <svg fill="#00458B" class="w-4 h-4 inline mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.42 512.42" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M509.313,67.45c-4.16-4.16-10.88-4.267-15.04-0.107L134.06,422.33l-115.2-121.6c-3.733-4.48-10.453-5.12-15.04-1.387 c-4.48,3.733-5.12,10.453-1.387,15.04c0.32,0.32,0.533,0.64,0.853,0.96l122.667,129.493c1.92,2.133,4.693,3.307,7.573,3.307h0.213 c2.773,0,5.44-1.067,7.467-3.093l368-362.667C513.473,78.33,513.473,71.61,509.313,67.45z"></path> </g> </g> </g></svg>
            Filtrage parfait basé sur votre prochain établissement</li>
          <li>
            <svg fill="#00458B" class="w-4 h-4 inline mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.42 512.42" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M509.313,67.45c-4.16-4.16-10.88-4.267-15.04-0.107L134.06,422.33l-115.2-121.6c-3.733-4.48-10.453-5.12-15.04-1.387 c-4.48,3.733-5.12,10.453-1.387,15.04c0.32,0.32,0.533,0.64,0.853,0.96l122.667,129.493c1.92,2.133,4.693,3.307,7.573,3.307h0.213 c2.773,0,5.44-1.067,7.467-3.093l368-362.667C513.473,78.33,513.473,71.61,509.313,67.45z"></path> </g> </g> </g></svg>
            Recommandations des anciens locataires</li>
        </ul>
			</div>
      <img src="pics/home2.jpg" 
      alt="" 
      class="object-cover w-full xl:col-span-3 dark:bg-gray-500"
      style="border-bottom-right-radius: 12rem;border-top-left-radius: 12rem;">
		</div>
</section>
<section class="mb-6">
  <div
  class="block w-3/4 mx-auto rounded-xl bg-blue-700 p-4 shadow-xl sm:p-6 lg:p-8"
  >

  <h3 class="mt-3 text-center text-lg font-bold text-white sm:text-xl">
    Get Started Now With<br/>My<span class="text-cyan-500">Coloc</span>
  </h3>

  <p class="mt-4 text-center text-sm text-gray-300">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio eius labore
    nisi tempore modi vel voluptate ullam nostrum adipisci suscipit eaque quae
    cupiditate, accusamus minus laboriosam totam laborum, deserunt sint.
  </p>

<div class="flex justify-center">

  <button @click="start" class="mt-5 mx-auto px-6 py-2 bg-white text-blue-700 hover:text-blue-800 text-sm font-medium rounded-md">
	C'est parti
  </button>

 </div>

</div>
</section>
</header>
</template>

<script setup>

import router from './router'


import { useAuthStore } from './stores/auth'

const authStore = useAuthStore()


var searchedCity



function logout(){


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "http://localhost:8000/api/auth/logout",
            type: "POST",
            context: this,
            success:function(){


              authStore.isAuthenticated=false
              authStore.isadmin=false
              authStore.iduser=''
              authStore.name=''
              authStore.solde=0

              router.push('/')

              
            }
        });


}

function start(){
  

  window.scrollTo(0, 0);

  router.push('/offers')



}

function searchByCity(){

  searchedCity = document.getElementById('searchedCity').value


  if(searchedCity!=''){



    window.scrollTo(0, 0)

    router.push('/offers')



    // router.push({path: '/offers', params:{searchedCity:searchedCity}})
  }
        
}


</script>



