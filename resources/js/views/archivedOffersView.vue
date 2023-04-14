<template>
    <div class="w-full overflow-x-scroll border bg-white p-2 shadow-md">
      <popup v-if="showDetails">

        <div class="w-3/4 h-3/4 flex flex-col bg-white py-5 rounded-lg md:p-10 md:flex-row">
            <!-- <div class="hidden bg-white flex flex-col md:flex-row">

                <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer">Détails</div>
                <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer border-2 border-b-blue-700">Conditions</div>
                <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer border-2 border-b-blue-700">Conditions</div>

            </div> -->
            <div class="w-full flex flex-col justify-around items-center md:flex-row">
                <div class="flex flex-col">
                    <img :src="'http://localhost:8000/storage/OfferPics/'+selectedPic" class="w-40 h-40 rounded-md md:w-80 md:h-80">
                    <div class="mt-1">
                        <ul class="flex">

                            <pic @selectPic="selectPic" v-for="pic in offerr.pics" :src="pic.path" />
                            
                        </ul>
                    </div>
                </div>
            <div class="flex flex-col font-light">
                    <h2 class="text-md text-blue-700 md:text-3xl md:pb-5 text-left">Description</h2>
            
                    <ul style="color: #616571;" class="md:space-y-2 ">
                        <li>Prix :  {{ offerr.price }} </li>
                        <li>Chambres  :  {{ offerr.nbrRooms }}</li>
                        <li>Cuisine : 2</li>
                        <li>Toilet : 2</li>
                    </ul>

            <h3 class="text-blue-700 md:text-xl md:py-5">Conditions : </h3>

            <div class="grid grid-cols-2" style="color: #92570C;">
                <h4>Max : {{ offerr.maxColocs }} personnes.</h4>
            </div>

            <div class="flex justify-between mt-2 md:mt-10">

                <button class="rounded-sm bg-blue-700 text-white py-2 px-5" @click="unarchive(offerr.id)">desarchiver</button>

                <button class="rounded-sm bg-blue-700 text-white py-2 px-5" @click="closepopup">X</button>

            </div>
                </div>
            </div>
            
        </div>

      </popup>
      <table class="w-full border-collapse bg-cyan-100 bg-opacity-50 text-left rounded-t-md">
        <thead>
          <tr>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Titre</th>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Date</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-blue-700 border-opacity-20">
          <offerDashboard @showdetails="showdetails" v-for="offer in offers" :title="offer.title" :id="offer.id" :created_at="offer.created_at"/>
        </tbody>
      </table>
    
    </div>
    
    </template>
    
    <script>
    
    import offerDashboard from '../components/offerDashboard.vue'
    import pic from '../components/pic.vue'
    import popup from '../components/popup.vue'
    export default{
        name: 'archivedOffersView',
        props:{
    
          idUser:{
    
            type:Number
    
          }
    
        },
        components:{
    
          offerDashboard,
          pic,
          popup
    
        },
        data(){
    
            return {
                offers: [],
                showDetails:false,
                offerr:{
                    id:'',
                    price:'',
                    nbrRooms:'',
                    maxColocs:'',
                    pics:[],
                },
                selectedPic:null
            }
    
        },
        created(){
            axios
              .get('http://localhost:8000/api/offer/archived',
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
              .get('http://localhost:8000/api/offer/archived',
              {
                    headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                    }
              })
              .then(response => this.offers = response.data)
    
          },
          showdetails(payload){


            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({

            url: "http://localhost:8000/api/offer/details",
            type: "POST",
            context: this,
            data: {idoffer:payload.idoffer},
            success:function(offer){

                this.offerr.id = payload.idoffer
                this.offerr.price = offer.price
                this.offerr.nbrRooms = offer.nbrRooms
                this.offerr.maxColocs = offer.maxP

               this.getPics(payload.idoffer)

            }

        });


            this.showDetails = true

          },
          getPics(idOffer){


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
              success:function(pics){

              this.offerr.pics = pics

              this.selectedPic = pics[0].path

              }

              });

           },
          closepopup(){

            this.showDetails = false

          },
          unarchive(idOffer){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
    
                url: "http://localhost:8000/api/offer/unarchive",
                type: "POST",
                context: this,
                data: {idoffer:idOffer},
                success:function(){

                  this.updateOffers()
                  this.showDetails = false
    
                }
    
            });


          }
    
        }
    }
    </script>