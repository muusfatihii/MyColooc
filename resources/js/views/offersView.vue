<template>
<main class="profile-page">
    <popup v-if="showModal">
        <div id="offerDescription">
      <section>
        
        <div class="w-full py-10 md:p-10">
            <div class="flex md:flex-col w-full">

                <div class="flex flex-col md:flex-row md:space-x-1">
                    <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer">Détails</div>
                    <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer border-2 border-b-blue-700">Conditions</div>
                    <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer border-2 border-b-blue-700">Conditions</div>
                </div>

                <div class="py-10 md:p-10 bg-cyan-50 flex flex-col justify-between md:flex-row">

                    <div class="md:w-1/2">
                        <div class="mx-auto w-96">
                        <img :src="'./storage/OfferPics/'+selectedPic" class="w-96 h-96">
                        <div>
                            <ul class="flex">

                                <pic @selectPic="selectPic" v-for="pic in pics" :src="pic.path" />
                                
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="md:w-1/2 flex flex-col">
                        <h2 class="text-blue-700 text-3xl py-5 text-center">Description</h2>
                        
                        <ul style="color: #616571;" class="px-5 space-y-2">
                            <li>Loyer :  {{ price }} </li>
                            <li>Rooms  :  {{ nbrRooms }}</li>
                            <li>Cuisine : 2</li>
                            <li>Toilet : 2</li>
                        </ul>

                        <h3 class="text-blue-700 text-xl py-5 px-5">Conditions : </h3>

                        <div class="grid grid-cols-2 px-5" style="color: #92570C;">
                            <h4>Max : {{ maxColocs }} personnes.</h4>
                            <h4>Max : 4 personnes.</h4>
                            <h4>Max : 4 personnes.</h4>
                            <h4>Max : 4 personnes.</h4>
                            <h4>Max : 4 personnes.</h4>
                            <h4>Max : 4 personnes.</h4>

                        </div>

                        <button style="background-color: #92570C;" class="text-white py-2 px-5 mt-10 mx-auto" @click="showInterest(idOffer,idClient)">Montre votre interet</button>

                        <button style="background-color: #92570C;" class="text-white py-2 px-5 mt-10 mx-auto" @click="closepopup">X</button>


                    </div>

                </div>

            </div>
        </div>
      </section>
        </div>

    </popup>
  <section class="relative block h-52">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('pics/h1.jpg');">
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
  </section>
  <section class="py-16">
    <div class="relative container mx-auto -mt-52 mb-6 shadow-xl rounded-lg bg-white md:-mt-36">
        <div class="flex flex-col items-center md:flex-row md:items-start">
            <aside class="flex flex-row md:flex-col text-sm font-light text-blue-700 space-x-5 md:space-x-0 md:space-y-5 md:w-44">
                        <div class="text-center">
                            <h2 class="w-full md:bg-blue-700 md:text-white py-1 mb-2 rounded-r-md rounded-tl-md ">Ville</h2>
                            <div class="flex justify-center items-center">
                                <select name="" id="">
                                    <option value="Agadir">Agadir</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="w-full md:bg-blue-700 md:text-white py-1 mb-2 rounded-r-md rounded-tl-md ">Budget</h2>
                            <div class="flex justify-center items-center space-x-5">
                                <select name="" id="">
                                    <option value="500">500</option>
                                    <option value="100">1000</option>
                                    <option value="1500">1500</option>
                                    <option value="2000">2000</option>
                                    <option value="2500">2500</option>
                                    <option value="3000">3000</option>
                                </select>
                                <select name="" id="">

                                    <option value="500">500</option>
                                    <option value="100">1000</option>
                                    <option value="1500">1500</option>
                                    <option value="2000">2000</option>
                                    <option value="2500">2500</option>
                                    <option value="3000">3000</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="w-full md:bg-blue-700 md:text-white py-1 mb-2 rounded-r-md">Colocs</h2>
                            <div class="flex justify-center items-center space-x-5">
                                <select name="" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <select name="" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                        <h2 class="w-full md:bg-blue-700 md:text-white py-1 mb-2 rounded-r-md">Nombre de chambres</h2>
                            <div class="flex justify-center items-center space-x-5">
                                <select name="" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <select name="" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>

            </aside>

            <div id="offers" class="grid grid-cols-1 md:grid-cols-2 mx-auto">
                <offer @showDescription="showDescription" v-for="offer in offers" :id="offer.id" :address="offer.address" :price="offer.price" :nbrRooms="offer.nbrRooms" :idClient="idClient" />

            </div>

        </div>
    </div>
  </section>
  
</main>

    
</template>


<script>
import offer from '../components/offer.vue'
import pic from '../components/pic.vue'
import popup from '../components/popup.vue'

// import budget from '../components/budget.vue'
export default{
    name: 'offersView',
    components:{

        offer,
        pic,
        popup

    },
    props:{

        idClient:{
            type:Number
        }

    },
    data(){

        return {
            offers: [],
            hidden: 'hidden',
            price: 0,
            nbrRooms:0,
            maxColocs:0,
            idOffer:'',
            selectedPic:'hhh',
            pics:[],
            prices:[],
            showModal: false

        }

    },
    created(){
        
        axios
          .get('http://localhost:8000/api/offer',
          {
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
                }
          })
          .then(response => this.offers = response.data)

        alert(this.prices)
    
    },
    methods:{
        closepopup(){
            this.showModal = false
        },
        showDescription(payload){
            this.idOffer = payload.idOffer
            // this.hidden = 'hidden'
            


            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({

            url: "http://localhost:8000/api/offer/details",
            type: "POST",
            context: this,
            data: {idoffer:payload.idOffer},
            success:function(offer){


                this.price = offer.price
                this.nbrRooms = offer.nbrRooms
                this.maxColocs = offer.maxP

                this.getPics(payload.idOffer)

            }

        });

        this.showModal = true
 
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

                this.pics = pics

                this.selectedPic = pics[0].path

            }

            });



            // this.hidden = ''
        },
        selectPic(payload){

            this.selectedPic = payload.picSrc

        },showInterest(idOffer,idClient){

                $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });

                $.ajax({

                url: "http://localhost:8000/api/offer/showinterest",
                type: "POST",
                context: this,
                data: {idoffer:idOffer,idclient:idClient},
                success:function(data){

                    if(data==1){
                    alert('Opération réussie')
                    }else{
                        alert('votre solde ne suffit pas')
                    }

                }

                });


        },
        getMinPrice(){

            $.ajax({

            url: "http://localhost:8000/api/offer/minprice",
            type: "GET",
            context: this,
            success:function(minPrice){

                this.prices.push(minPrice)

            }

            });

        },
        getMaxPrice(){

            $.ajax({

            url: "http://localhost:8000/api/offer/minprice",
            type: "GET",
            context: this,
            success:function(maxPrice){

                this.prices.push(maxPrice)

            }

            });

        },

    }
}
</script>