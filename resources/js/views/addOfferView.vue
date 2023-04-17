<template>

<form id="addOfferForm" @submit.prevent="handleAddOfferForm" enctype="multipart/form-data" class="w-screen flex justify-center p-2 font-medium">
<div class="py-5 bg-cyan-50 px-4 rounded-md text-blue-700">

  <div class="space-y-4 flex flex-col w-full">

    <div>
        <label for="title" class="block text-sm font-medium leading-6">Titre</label>
        <div class="mt-2">
          <input required id="title" name="title" type="text" autocomplete="title" class="px-2 font-light text-md block w-full rounded-md border-0 py-1.5 text-blue-700 shadow-sm ring-1 ring-inset ring-blue-300 placeholder:text-blue-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
    </div>

    <div>
          <label for="city" class="block text-sm font-medium leading-6 ">Ville</label>
          <div class="mt-2">
            <select required id="city" name="city" autocomplete="city-name" class="px-2 font-light text-md block w-1/2 rounded-md border-0 py-1.5 text-blue-900 shadow-sm ring-1 ring-inset ring-blue-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option class="text-blue-700">Agadir</option>
              <option class="text-blue-700">Safi</option>
            </select>
          </div>
    </div>

  <div >
        <label for="address" class="block text-sm font-medium leading-6">Adresse complete</label>
        <div class="mt-2">
          <input required type="text" name="address" id="address" autocomplete="address" class="px-2 font-light text-md block w-full rounded-md border-0 py-1.5 text-blue-900 shadow-sm ring-1 ring-inset ring-blue-300 placeholder:text-blue-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
  </div>

  <div >
    <label for="location" class="block text-sm font-medium leading-6">Position</label>
    <svg id="location" @click="getLocation" fill="#FF0000" class="mt-2 h-6 w-6 cursor-pointer" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.985 511.985" xml:space="preserve" stroke="#FF0000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M222,3.277C153.477,16.59,99.111,72.751,87.702,141.764c-6.79,41.231,1.13,81.857,21.702,116.271 c2.35,3.928,4.199,7.011,8.39,14l0.967,1.613c41.753,69.614,59.977,101.895,79.073,142.806l38.825,83.218 c7.659,16.416,31.001,16.419,38.664,0.004l34.965-74.901c19.287-41.357,37.562-74.11,79.19-144.553l1.062-1.797 c6.181-10.459,9.139-15.472,12.673-21.482c15.271-25.943,23.445-55.54,23.445-86.29C426.659,63.541,329.368-17.545,222,3.277z M366.44,235.307c-3.518,5.984-6.466,10.977-12.631,21.41l-1.062,1.797c-42.326,71.624-61.063,105.204-81.123,148.219 l-15.625,33.472l-19.5-41.795c-19.925-42.687-38.643-75.842-81.147-146.709l-0.967-1.613c-4.187-6.981-6.027-10.051-8.363-13.954 c-15.428-25.808-21.358-56.232-16.222-87.425c8.504-51.443,49.357-93.645,100.331-103.549 c80.922-15.693,153.862,45.096,153.862,125.49C383.993,193.74,377.88,215.872,366.44,235.307z"></path> <path d="M255.993,106.652c-35.355,0-64,28.645-64,64s28.645,64,64,64s64-28.645,64-64S291.348,106.652,255.993,106.652z M255.993,191.985c-11.791,0-21.333-9.542-21.333-21.333s9.542-21.333,21.333-21.333c11.791,0,21.333,9.542,21.333,21.333 S267.784,191.985,255.993,191.985z"></path> </g> </g> </g> </g></svg>
    <!-- <svg @click="getLocation" fill="#00458B" class="h-6 w-6 cursor-pointer" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.985 511.985" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M222,3.277C153.477,16.59,99.111,72.751,87.702,141.764c-6.79,41.231,1.13,81.857,21.702,116.271 c2.35,3.928,4.199,7.011,8.39,14l0.967,1.613c41.753,69.614,59.977,101.895,79.073,142.806l38.825,83.218 c7.659,16.416,31.001,16.419,38.664,0.004l34.965-74.901c19.287-41.357,37.562-74.11,79.19-144.553l1.062-1.797 c6.181-10.459,9.139-15.472,12.673-21.482c15.271-25.943,23.445-55.54,23.445-86.29C426.659,63.541,329.368-17.545,222,3.277z M366.44,235.307c-3.518,5.984-6.466,10.977-12.631,21.41l-1.062,1.797c-42.326,71.624-61.063,105.204-81.123,148.219 l-15.625,33.472l-19.5-41.795c-19.925-42.687-38.643-75.842-81.147-146.709l-0.967-1.613c-4.187-6.981-6.027-10.051-8.363-13.954 c-15.428-25.808-21.358-56.232-16.222-87.425c8.504-51.443,49.357-93.645,100.331-103.549 c80.922-15.693,153.862,45.096,153.862,125.49C383.993,193.74,377.88,215.872,366.44,235.307z"></path> <path d="M255.993,106.652c-35.355,0-64,28.645-64,64s28.645,64,64,64s64-28.645,64-64S291.348,106.652,255.993,106.652z M255.993,191.985c-11.791,0-21.333-9.542-21.333-21.333s9.542-21.333,21.333-21.333c11.791,0,21.333,9.542,21.333,21.333 S267.784,191.985,255.993,191.985z"></path> </g> </g> </g> </g></svg> -->
  </div>


  <div class="hidden" >
      <div class="mt-2">
        <input type="text" name="latitude" id="latitude" class="px-2 block w-full rounded-md border-0 py-1.5 text-blue-900 shadow-sm ring-1 ring-inset ring-blue-300 placeholder:text-blue-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        <input type="text" name="longitude" id="longitude" class="px-2 block w-full rounded-md border-0 py-1.5 text-blue-900 shadow-sm ring-1 ring-inset ring-blue-300 placeholder:text-blue-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
      </div>
  </div>
  <div >
        <label for="pics" class="block text-sm font-medium leading-6">Photos</label>
        <div class="mt-2">
          <input required id="pics" name="pics[]" multiple type="file" autocomplete="pics" class="block font-light text-md w-full rounded-md border-0 px-2 py-1.5 text-blue-900 shadow-sm ring-1 ring-inset ring-blue-300 placeholder:text-blue-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
        </div>
  </div>

  <div>
      <label for="nbrRooms" class="block text-sm font-medium leading-6">Nombre de chambre</label>
      <div class="mt-2">
        <input required id="nbrRooms" name="nbrRooms" type="number" min="1" autocomplete="nbrRooms" class="block font-light text-md w-full rounded-md border-0 px-2 py-1.5 text-blue-900 shadow-sm ring-1 ring-inset ring-blue-300 placeholder:text-blue-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
      </div>
  </div>
    
  <div>
      <label for="maxColocs" class="block text-sm font-medium leading-6"> Max Colocataires</label>
      <div class="mt-2">
        <input required id="maxColocs" name="maxColocs" type="number" min="1" autocomplete="maxColocs" class="block font-light text-md w-full rounded-md border-0 px-2 py-1.5 text-blue-900 shadow-sm ring-1 ring-inset ring-blue-300 placeholder:text-blue-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
      </div>
  </div>
    
  <div>
      <label for="price" class="block text-sm font-medium leading-6">Prix</label>
      <div class="mt-2">
        <input required id="price" name="price" type="number" autocomplete="price" class="px-2 block font-light text-md w-full rounded-md border-0 py-1.5 text-blue-900 shadow-sm ring-1 ring-inset ring-blue-300 placeholder:text-blue-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
      </div>
  </div>

  <div class="relative flex gap-x-3">
      <div class="flex h-6 items-center">
        <input id="student" name="student" type="checkbox" class="px-2 h-4 w-4 rounded border-blue-300 text-blue-600 focus:ring-blue-600">
      </div>
      <div class="text-sm leading-6">
        <label for="student" class="font-medium">Etudiant</label>
        <p class="text-blue-500 text-sm font-thin">Cochez ce champs si vous trouvez qu'il est adapté aux étudiants</p>
      </div>
  </div>
  <div class="mt-6 flex items-center justify-center">
        <button type="submit"  class="font-light text-md rounded-md bg-blue-700 px-5 py-2 text-sm text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Save</button>
  </div>
  </div>
</div>
  
</form>

</template>
  
<script setup>

import router from '../router'

import { useAuthStore } from '../stores/auth'

var authStore = useAuthStore()


const handleAddOfferForm = function(e){

e.preventDefault()

const Data = new FormData(document.getElementById('addOfferForm'))
Data.append('idUser',authStore.iduser)



$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
    url: "http://localhost:8000/api/offer",
    type: "POST",
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    data: Data,
    contentType: false,
    cache: false,
    processData:false,
    success:function(data){


            if(data==0){

              swal("Message",'Votre solde ne suffit pas','error',{
                button:true,
                button:"OK",
              });



            }else{

              swal("Message",'Offre a été bien ajoutée','success',{
                button:true,
                button:"OK",
              });

              router.push('myOffers')

              window.scrollTo(0, 0)

            }
        
    }
});



}

function getLocation(){

  if(navigator.geolocation){

    navigator.geolocation.getCurrentPosition(showPosition,showError);

  }


}

function showPosition(position){

  document.getElementById('latitude').value = position.coords.latitude
  document.getElementById('longitude').value = position.coords.longitude

  document.getElementById('location').setAttribute('fill', '#00458B')

  swal("Message",'Position de local ajoutée','success',{
                button:true,
                button:"OK",
              });

}

function showError(error){

  switch(error.code){

    case error.PERMISSION_DENIED:

    alert('La géolocalisation est désactivée')

    break

  }

}











</script>