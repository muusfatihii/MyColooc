<template>
<div class="w-full overflow-x-scroll border border-cyan-50 shadow-md">
  <popup v-if="showModal">
    <table class="w-full border-collapse bg-white text-left overflow-x-scroll">
    <thead>
      <tr @click="close_popup" class="cursor-pointer">X</tr>
      <tr>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">UserName</th>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">Nom</th>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">Nombre</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-blue-700 border-opacity-20">
      <interested v-for="int in interested" :idoffer="idoffer" :id="int.id" :username="int.username" :name="int.name"/>
    </tbody>
  </table>
  </popup>
  <table class="w-full border-collapse bg-cyan-50 bg-opacity-25 text-left">
    <thead>
      <tr>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">Titre</th>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">Date</th>
        <th scope="col" class="px-6 py-4 font-light text-blue-700">Soumissionnaires</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-blue-700 border-opacity-20">
      <myOfferDashboard @showInterestedUsers="showInterestedUsers" @updateOffers="updateOffers" v-for="offer in offers" :title="offer.title" :id="offer.id" :created_at="offer.created_at"/>
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
            showModal:false
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

      }

    }
}
</script>