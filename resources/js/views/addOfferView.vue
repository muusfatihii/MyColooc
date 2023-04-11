<template>

<form id="addOfferForm" @submit.prevent="handleAddOfferForm" enctype="multipart/form-data">
  <div class="space-y-4 text-blue-700">

    <div class="border-b border-gray-900/10 pb-12">
      <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Titre</label>
          <div class="mt-2">
            <input id="title" name="title" type="text" autocomplete="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Ville</label>
          <div class="mt-2">
            <select id="city" name="city" autocomplete="city-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option>Agadir</option>
              <option>Safi</option>
            </select>
          </div>
        </div>

        <div class="col-span-full">
          <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Adresse complete</label>
          <div class="mt-2">
            <input type="text" name="address" id="address" autocomplete="address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <!-- <div class="col-span-full">
          <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Photos</label>
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
              <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                  <span>Upload a file</span>
                  <input id="pics" name="pics[]" multiple type="file" class="sr-only">
                </label>
                <p class="pl-1">or drag and drop</p>
              </div>
              <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
            </div>
          </div>
        </div> -->

        <div class="sm:col-span-4">
          <label for="pics" class="block text-sm font-medium leading-6 text-gray-900">Photos</label>
          <div class="mt-2">
            <input id="pics" name="pics[]" multiple type="file" autocomplete="pics" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="nbrRooms" class="block text-sm font-medium leading-6 text-gray-900">Nombre de chambre</label>
          <div class="mt-2">
            <input id="nbrRooms" name="nbrRooms" type="number" autocomplete="nbrRooms" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="maxColocs" class="block text-sm font-medium leading-6 text-gray-900"> Max Colocataires</label>
          <div class="mt-2">
            <input id="maxColocs" name="maxColocs" type="number" autocomplete="maxColocs" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Prix</label>
          <div class="mt-2">
            <input id="price" name="price" type="number" autocomplete="price" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
      </div>
    </div>

    <div class="border-b border-gray-900/10 pb-12">
        <fieldset>
          <div class="space-y-6">
            <div class="relative flex gap-x-3">
              <div class="flex h-6 items-center">
                <input id="student" name="student" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900">Etudiant</label>
                <p class="text-gray-500">Cochez ce champs si vous trouvez qu'il est adapté aux étudiants</p>
              </div>
            </div>
          </div>
        </fieldset>
    </div>

  </div>

  <div class="mt-6 flex items-center justify-center">
    <button type="submit"  class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
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

              alert('Votre solde ne suffit')

            }else{

              alert('Success')

            }
        
    }
});



}











</script>