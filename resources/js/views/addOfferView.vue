<template>

<form id="addOfferForm" @submit.prevent="handleAddOfferForm" enctype="multipart/form-data" class="w-screen flex justify-center p-2">
<div class="py-5 bg-cyan-50 px-4 rounded-md text-blue-700">
  <div class="space-y-4 flex flex-col w-full">

    <div>
        <label for="title" class="block text-sm font-medium leading-6">Titre</label>
        <div class="mt-2">
          <input id="title" name="title" type="text" autocomplete="title" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
    </div>

  <div>
        <label for="city" class="block text-sm font-medium leading-6 ">Ville</label>
        <div class="mt-2">
          <select id="city" name="city" autocomplete="city-name" class="px-2 block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <option class="text-blue-700">Agadir</option>
            <option class="text-blue-700">Safi</option>
          </select>
        </div>
  </div>

  <div >
              <label for="address" class="block text-sm font-medium leading-6">Adresse complete</label>
              <div class="mt-2">
                <input type="text" name="address" id="address" autocomplete="address" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
  </div>
  <button type="button" @click="getLocation">position</button>
  <div class="hidden" >
      <div class="mt-2">
        <input type="text" name="latitude" id="latitude" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        <input type="text" name="longitude" id="longitude" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
      </div>
  </div>
  <div >
              <label for="pics" class="block text-sm font-medium leading-6">Photos</label>
              <div class="mt-2">
                <input id="pics" name="pics[]" multiple type="file" autocomplete="pics" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
  </div>

  <div>
      <label for="nbrRooms" class="block text-sm font-medium leading-6">Nombre de chambre</label>
      <div class="mt-2">
        <input id="nbrRooms" name="nbrRooms" type="number" autocomplete="nbrRooms" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
      </div>
  </div>
    
  <div>
      <label for="maxColocs" class="block text-sm font-medium leading-6"> Max Colocataires</label>
      <div class="mt-2">
        <input id="maxColocs" name="maxColocs" type="number" autocomplete="maxColocs" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
      </div>
  </div>
    
  <div>
      <label for="price" class="block text-sm font-medium leading-6">Prix</label>
      <div class="mt-2">
        <input id="price" name="price" type="number" autocomplete="price" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
      </div>
  </div>

  <div class="relative flex gap-x-3">
      <div class="flex h-6 items-center">
        <input id="student" name="student" type="checkbox" class="px-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
      </div>
      <div class="text-sm leading-6">
        <label for="student" class="font-medium">Etudiant</label>
        <p class="text-blue-500 text-sm">Cochez ce champs si vous trouvez qu'il est adapté aux étudiants</p>
      </div>
  </div>
  <div class="mt-6 flex items-center justify-center">
        <button type="submit"  class="rounded-md bg-blue-700 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
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

              swal("Message",'Votre solde ne suffit pas','success',{
                button:true,
                button:"OK",
              });



            }else{

              swal("Message",'Offre a été bien ajoutée','success',{
                button:true,
                button:"OK",
              });

              router.push('myOffers')

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

}

function showError(error){

  switch(error.code){

    case error.PERMISSION_DENIED:

    alert('La géolocalisation est désactivée')

    break

  }

}











</script>