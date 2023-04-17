<template>
<main class="profile-page">
    <popup v-if="showModal">
        <div class="relative w-3/4 h-3/4 flex flex-col bg-white py-5 rounded-lg md:p-10 md:flex-row">
            <button class="absolute top-1 right-1 rounded-sm rounded-tr-lg bg-blue-50 text-blue-700 py-2 px-5 hover:bg-blue-700 hover:text-white" @click="closepopup">X</button>

            <!-- <div class="hidden bg-white flex flex-col md:flex-row">

                <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer">Détails</div>
                <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer border-2 border-b-blue-700">Conditions</div>
                <div class="text-center font-light rounded-t-lg w-40 py-5 px-2 bg-cyan-50 text-blue-700 cursor-pointer border-2 border-b-blue-700">Conditions</div>

            </div> -->
            <div class="w-full flex flex-col justify-around items-center md:flex-row">
                <div class="mt-8 flex flex-col">
                    <img :src="'./storage/OfferPics/'+selectedPic" class="w-40 h-40 rounded-md md:w-80 md:h-80">
                    <div class="mt-1">
                        <ul class="flex">

                            <pic @selectPic="selectPic" v-for="pic in pics" :src="pic.path" />
                            
                        </ul>
                    </div>
                </div>
            <div class="flex flex-col font-light pl-5">
                    <h2 class="text-md text-blue-700 md:text-3xl md:pb-5 text-left">Description</h2>
            
                    <ul class="text-blue-700 md:space-y-2 ">
                        <li>Prix :  {{ price }} </li>
                        <li>Chambres  :  {{ nbrRooms }}</li>
                        <li v-if="latitude!='' && longitude!=''" @click="showLocalisation" class="cursor-pointer">
                        <svg id="location" fill="#00458B" class="mt-2 h-5 w-5 cursor-pointer" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.985 511.985" xml:space="preserve" stroke="#FF0000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M222,3.277C153.477,16.59,99.111,72.751,87.702,141.764c-6.79,41.231,1.13,81.857,21.702,116.271 c2.35,3.928,4.199,7.011,8.39,14l0.967,1.613c41.753,69.614,59.977,101.895,79.073,142.806l38.825,83.218 c7.659,16.416,31.001,16.419,38.664,0.004l34.965-74.901c19.287-41.357,37.562-74.11,79.19-144.553l1.062-1.797 c6.181-10.459,9.139-15.472,12.673-21.482c15.271-25.943,23.445-55.54,23.445-86.29C426.659,63.541,329.368-17.545,222,3.277z M366.44,235.307c-3.518,5.984-6.466,10.977-12.631,21.41l-1.062,1.797c-42.326,71.624-61.063,105.204-81.123,148.219 l-15.625,33.472l-19.5-41.795c-19.925-42.687-38.643-75.842-81.147-146.709l-0.967-1.613c-4.187-6.981-6.027-10.051-8.363-13.954 c-15.428-25.808-21.358-56.232-16.222-87.425c8.504-51.443,49.357-93.645,100.331-103.549 c80.922-15.693,153.862,45.096,153.862,125.49C383.993,193.74,377.88,215.872,366.44,235.307z"></path> <path d="M255.993,106.652c-35.355,0-64,28.645-64,64s28.645,64,64,64s64-28.645,64-64S291.348,106.652,255.993,106.652z M255.993,191.985c-11.791,0-21.333-9.542-21.333-21.333s9.542-21.333,21.333-21.333c11.791,0,21.333,9.542,21.333,21.333 S267.784,191.985,255.993,191.985z"></path> </g> </g> </g> </g></svg></li>
                    </ul>

            <h3 class="text-blue-700 md:text-xl md:py-5">Conditions : </h3>

            <div class="grid grid-cols-2 text-red-400">
                <h4>Max : {{ maxColocs }} personnes.</h4>
            </div>

            <div class="flex justify-between mt-2 md:mt-10">

                <button v-if="idClient!=idofferowner && idClient!=''" class="rounded-sm bg-blue-700 text-white py-2 px-5" @click="showInterest(idOffer,idClient)">Montre votre interet</button>


            </div>
                </div>
            </div>
            
        </div>
    </popup>
    <popup v-if="Localisation">

        <div class="h-screen w-screen md:p-20">

            <div class="flex justify-end">
                <div @click="closeLocalisation" class="text-white bg-black bg-opacity-10 hover:bg-white hover:text-black rounded-t-sm p-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="#555" width="26" height="26"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.7816 4.03157C12.0062 3.80702 12.0062 3.44295 11.7816 3.2184C11.5571 2.99385 11.193 2.99385 10.9685 3.2184L7.50005 6.68682L4.03164 3.2184C3.80708 2.99385 3.44301 2.99385 3.21846 3.2184C2.99391 3.44295 2.99391 3.80702 3.21846 4.03157L6.68688 7.49999L3.21846 10.9684C2.99391 11.193 2.99391 11.557 3.21846 11.7816C3.44301 12.0061 3.80708 12.0061 4.03164 11.7816L7.50005 8.31316L10.9685 11.7816C11.193 12.0061 11.5571 12.0061 11.7816 11.7816C12.0062 11.557 12.0062 11.193 11.7816 10.9684L8.31322 7.49999L11.7816 4.03157Z" fill="currentColor"></path></svg></div>
            </div>
            <iframe class="h-full w-full rounded-b-md rounded-tl-md" :src="'https://www.google.com/maps?q='+latitude+','+longitude+'&h1=es;z=14&output=embed'">
            </iframe>

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
                                <select @change="filter(0)" name="" id="" v-model="city">
                                    <option value="">All</option>
                                    <option value="Agadir">Agadir</option>
                                    <option value="Safi">Safi</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="w-full md:bg-blue-700 md:text-white py-1 mb-2 rounded-r-md rounded-tl-md ">Budget</h2>
                            <div class="flex justify-center items-center space-x-5">
                                <select name="" id="" @change="filter(0)" v-model="minPrice">
                                    <option value="500">500</option>
                                    <option value="100">1000</option>
                                    <option value="1500">1500</option>
                                    <option value="2000">2000</option>
                                    <option value="2500">2500</option>
                                    <option value="3000">3000</option>
                                </select>
                                <select name="" id="" @change="filter(0)" v-model="maxPrice">

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
                                <select name="" id="" @change="filter()" v-model="minColocs">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <select name="" id="" @change="filter()" v-model="maxColocs">
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
                                <select name="" id="" @change="filter()" v-model="minRooms">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <select name="" id="" @change="filter()" v-model="maxRooms">
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
                <offer @showDescription="showDescription" v-for="offer in offers" :id="offer.id" :address="offer.address" :price="offer.price" :nbrRooms="offer.nbrRooms" :student="offer.student" :validated="offer.validated" :maxP="offer.maxP" :idClient="idClient" />

            </div>
        </div>
        <div class="flex justify-center">
            <nav aria-label="Page navigation example">
                <ul class="list-style-none flex">
                    <li>
                    <a
                        v-if="page>1"
                        @click="previous"
                        class="cursor-pointer relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-500 transition-all duration-300 dark:text-neutral-400"
                        >Previous</a
                    >
                    </li>
                    <li  @click="go(pagee)" v-for="pagee in nbrPages">
                    <a
                        class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100  dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                        href="#!"
                        >{{ pagee }}</a
                    >
                    </li>
                    <!-- <li aria-current="page">
                    <a
                        class="relative block rounded bg-primary-100 px-3 py-1.5 text-sm font-medium text-primary-700 transition-all duration-300"
                        href="#!"
                        >2
                        <span
                        class="absolute -m-px h-px w-px overflow-hidden whitespace-nowrap border-0 p-0 [clip:rect(0,0,0,0)]"
                        >(current)</span
                        >
                    </a>
                    </li> -->
                    
                    <li>
                    <a
                       v-if="page<this.nbrPages"
                       @click="next"
                        class="cursor-pointer relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white"
                        href="#!"
                        >Next</a
                    >
                    </li>
                </ul>
        </nav>

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
            type:Number,
            default:''
        },
        searchedCity:{
            type:String
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
            selectedPic:'',
            pics:[],
            prices:[],
            showModal: false,
            city:'',
            minPrice:0,
            maxPrice:10000,
            minColocs:0,
            maxColocs:7,
            minRooms:0,
            maxRooms:7,
            idofferowner:'',
            Localisation:false,
            latitude:'',
            longitude:'',
            p:2,
            page:1,
            nbrPages:1


        }

    },
    beforeCreate(){

        this.city = this.searchedCity

    },
    created(){

        




        // this.nbrOffers()

        this.filter((this.page-1)*this.p)



            


        
        
        // axios
        //   .get('http://localhost:8000/api/offer',
        //   {
        //         headers: {
        //         'Content-Type': 'application/x-www-form-urlencoded'
        //         }
        //   })
        //   .then(response => this.offers = response.data)

        

    
    },
    // mounted(){

    //     alert(this.city)

    //     // this.city = this.searchedCity

    // },
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

                this.idofferowner = offer.client_id
                this.price = offer.price
                this.nbrRooms = offer.nbrRooms
                this.maxColocs = offer.maxP
                this.latitude  = offer.latitude
                this.longitude  = offer.longitude

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
        filter(skip){

            this.nbrOffers()

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({

            url: "http://localhost:8000/api/offer/filter",
            type: "POST",
            context: this,
            data: {city:this.city,minColocs:this.minColocs,maxColocs:this.maxColocs,
                minPrice:this.minPrice,maxPrice:this.maxPrice,
                minRooms:this.minRooms,maxRooms:this.maxRooms,skip:skip},
            success:function(offers){


                    this.offers=offers

            }

            });

        },
        showLocalisation(){

            this.showModal=false
            this.Localisation=true

        },
        closeLocalisation(){

           
            this.Localisation=false
            this.showModal=true

        },
        nbrOffers(){



            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({

            url: "http://localhost:8000/api/offer/nbroffers",
            type: "POST",
            context: this,
            data: {city:this.city,minColocs:this.minColocs,maxColocs:this.maxColocs,
                minPrice:this.minPrice,maxPrice:this.maxPrice,
                minRooms:this.minRooms,maxRooms:this.maxRooms},
            success:function(nbroffers){

                this.nbroffers=nbroffers

                this.nbrPages = Math.ceil(this.nbroffers/this.p)

            }

            });

        },
        go(page){

            this.page = page

            this.filter((this.page-1)*this.p)

        },
        previous(){

            this.page--
            this.filter((this.page-1)*this.p)

        },
        next(){

            this.page++
            this.filter((this.page-1)*this.p)

        }

    }
}
</script>