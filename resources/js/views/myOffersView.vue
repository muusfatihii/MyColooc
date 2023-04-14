<template>
<div class="w-full overflow-x-scroll border bg-white p-2 shadow-md">
  <popup v-if="showPhotosSlider">

    <div class="relative" >
         <div class="absolute top-1 right-2 text-white cursor-pointer" @click="hidePhotos">X</div>

         <div class="absolute top-1 left-2 text-white cursor-pointer" @click="deletePic">S</div>
        
          <img :src="'http://localhost:8000/storage/OfferPics/'+selectedOffer.photos[currentIndex].path" alt="image" class="rounded-md h-80 w-80" />

          <button
      @click="previous()"
      class="absolute left-2 top-1/2 z-10 flex h-5 w-5 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md"
    >
      <svg
        class="h-4 w-4 font-bold text-blue-500"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2.5"
          d="M15 19l-7-7 7-7"
        ></path>
      </svg>
    </button>

    <button
      @click="forward()"
      class="absolute right-2 top-1/2 z-10 flex h-5 w-5 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md"
    >
      <svg
        class="h-4 w-4 font-bold text-blue-500"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2.5"
          d="M9 5l7 7-7 7"
        ></path>
      </svg>
    </button>
    </div>
  </popup>
  <popup v-if="showModal">
    <table class="relative w-3/4 rounded-md border-collapse bg-white text-left overflow-x-scroll">
    <thead>
      <tr @click="close_popup" class="absolute top-0 left-1 cursor-pointer text-blue-700">X</tr>
      <tr>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">UserName</th>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">Nom</th>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">Nombre</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-blue-700 border-opacity-20">
      <interested v-for="int in interested" :idoffer="idoffer" :id="int.id" :username="int.username" :name="int.name" :state="int.state"/>
    </tbody>
  </table>
  </popup>
  <popup v-if="showUpdateFormm">
    <form id="updateOfferForm" @submit.prevent="handleUpdateOfferForm" enctype="multipart/form-data" class="w-screen flex justify-center p-2 ">
<div class="py-2 bg-cyan-50 px-4 rounded-md text-blue-700">
  <div class="space-y-1 flex flex-col w-full">

    <div>
        <label for="title" class="block text-sm font-medium leading-6">Titre</label>
        <div class="mt-2">
          <input v-model="toUpdateOffer.title" id="title" name="title" type="text" autocomplete="title" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
    </div>

  <div>
        <label for="city" class="block text-sm font-medium leading-6 ">Ville</label>
        <div class="mt-2">
          <select id="city" name="city" autocomplete="city-name" class="px-2 block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <option class="text-blue-700">{{ toUpdateOffer.city }}</option>
            <option class="text-blue-700">Agadir</option>
            <option class="text-blue-700">Safi</option>
          </select>
        </div>
  </div>

  <div >
              <label for="address" class="block text-sm font-medium leading-6">Adresse complete</label>
              <div class="mt-2">
                <input v-model="toUpdateOffer.address" type="text" name="address" id="address" autocomplete="address" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
        <input v-model="toUpdateOffer.nbrRooms" id="nbrRooms" name="nbrRooms" type="number" autocomplete="nbrRooms" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
      </div>
  </div>
    
  <div>
      <label for="maxColocs" class="block text-sm font-medium leading-6"> Max Colocataires</label>
      <div class="mt-2">
        <input v-model="toUpdateOffer.maxP" id="maxColocs" name="maxColocs" type="number" autocomplete="maxColocs" class="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
      </div>
  </div>
    
  <div>
      <label for="price" class="block text-sm font-medium leading-6">Prix</label>
      <div class="mt-2">
        <input v-model="toUpdateOffer.price" id="price" name="price" type="number" autocomplete="price" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
      </div>
  </div>

  <div class="relative flex gap-x-3">
      <div class="flex h-6 items-center">
        <input v-if="toUpdateOffer.student" checked  name="student" type="checkbox" class="px-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
        <input v-if="!toUpdateOffer.student"  name="student" type="checkbox" class="px-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
      </div>
      <div class="text-sm leading-6">
        <label for="student" class="font-medium">Etudiant</label>
        <p class="text-blue-500 text-sm">Cochez ce champs si vous trouvez qu'il est adapté aux étudiants</p>
      </div>
  </div>
  <div class="mt-6 gap-4 flex items-center justify-start">
        <button type="submit"  class="rounded-md bg-blue-700 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        <button @click="closeUpdatePopUp" type="button"  class="rounded-md bg-blue-700 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">X</button>

  </div>
  </div>
</div>
  
</form>
  </popup>
  <table class="w-full border-collapse bg-cyan-100 bg-opacity-50 text-left rounded-t-md">
    <thead>
      <tr>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">Titre</th>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">Date</th>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">Soumissionnaires</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-blue-700 border-opacity-20">
      <myOfferDashboard @showPhotos="showPhotos" @showUpdateForm="showUpdateForm" @showInterestedUsers="showInterestedUsers" @updateOffers="updateOffers" v-for="offer in offers" :title="offer.title" :id="offer.id" :created_at="offer.created_at" :userarchived="offer.userarchived"/>
    </tbody>
  </table>
</div>

</template>

<script>

import myOfferDashboard from '../components/myOfferDashboard.vue'
import interested from '../components/interested.vue'
import popup from '../components/popup.vue'
export default{
    name: 'myOffersView',
    props:{

      idUser:{

        type:Number

      }

    },
    components:{

      myOfferDashboard,
      interested,
      popup

    },
    data(){

        return {
            offers: [],
            interested: [],
            idoffer:'',
            showModal:false,
            showUpdateFormm:false,
            toUpdateOffer:{
              title:'',
              city:'',
              address:'',
              nbrRooms:0,
              maxP:0,
              price:0,
              student:''
            },
            idOfferToUpdate:'',
            selectedOffer:{
              id:'',
              photos:[]
            },
            showPhotosSlider:false,
            currentIndex:0,
            idSelectedPhoto:''

        }

    },
    created(){
        axios
          .get('http://localhost:8000/api/myoffers?idUser='+this.idUser,
          {
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
                }
          })
          .then(response => this.offers = response.data)
    
    },
    methods:{

      updateOffers(){

        axios
          .get('http://localhost:8000/api/myoffers?idUser='+this.idUser,
          {
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
                }
          })
          .then(response => this.offers = response.data)

      },
      showInterestedUsers(payload){

        this.interested = payload.interests
        this.idoffer = payload.idoffer


        this.showModal = true



      },
      close_popup(){

        this.showModal = false

      },
      showUpdateForm(payload){

        this.idOfferToUpdate = payload.idoffer

        axios
          .get('http://localhost:8000/api/offer/update?idOffer='+payload.idoffer,
          {
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
                }
          })
          .then(response => this.toUpdateOffer = response.data)
          
        this.showUpdateFormm = true
      },
      closeUpdatePopUp(){

        this.showUpdateFormm = false

        },
        handleUpdateOfferForm(){

          const Data = new FormData(document.getElementById('updateOfferForm'))
          Data.append('idOffer',this.idOfferToUpdate)
          
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          $.ajax({
              url: 'http://localhost:8000/api/offer/updateoffer',
              type: "POST",
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              data: Data,
              contentType: false,
              cache: false,
              processData:false,
              context:this,
              success:function(){

                this.showUpdateFormm = false

                router.push('myOffers')

              }
          });

        },
        showPhotos(payload){

          $.ajaxSetup({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
              });

              $.ajax({

              url: "http://localhost:8000/api/offer/pics",
              type: "POST",
              context: this,
              data: {idoffer:payload.idoffer},
              success:function(photos){

              this.selectedOffer.id = payload.idoffer

              this.selectedOffer.photos = photos

              this.idSelectedPhoto = this.selectedOffer.photos[this.currentIndex].id

              this.showPhotosSlider = true

              }

              });

        },
        updatePhotos(idOffer){

          $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });

          $.ajax({

          url: "http://localhost:8000/api/offer/pics",
          type: "POST",
          context: this,
          data: {idoffer:idOffer},
          success:function(photos){

          this.selectedOffer.photos = photos

          }

          });

        }
        ,
        previous() {
        if (this.currentIndex > 0) {
          this.currentIndex = this.currentIndex - 1;
          this.idSelectedPhoto = this.selectedOffer.photos[this.currentIndex].id
        }
      },
      forward() {
        if (this.currentIndex < this.selectedOffer.photos.length-1) {
          this.currentIndex = this.currentIndex + 1;
          this.idSelectedPhoto = this.selectedOffer.photos[this.currentIndex].id

        }
      },
      hidePhotos(){
        this.showPhotosSlider = false

      },
      deletePic(){

        if(this.selectedOffer.photos.length>1){

          $.ajaxSetup({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
              });

          $.ajax({

          url: "http://localhost:8000/api/offer/pics/delete",
          type: "POST",
          context: this,
          data: {idpic:this.idSelectedPhoto},
          success:function(data){

            alert(data)

          this.updatePhotos(this.selectedOffer.id)

          this.currentIndex = this.currentIndex - 1;

          this.idSelectedPhoto = this.selectedOffer.photos[this.currentIndex].id


          }

          });

        }

      }

    }
}
</script>