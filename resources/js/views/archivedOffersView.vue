<template>
    <div class="w-full overflow-x-scroll border border-cyan-50 shadow-md">
      <table class="w-full border-collapse bg-cyan-50 bg-opacity-25 text-left">
        <thead>
          <tr>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Titre</th>
            <th scope="col" class="px-6 py-4 font-light text-blue-700">Date</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-blue-700 border-opacity-20">
          <offerDashboard @updateOffers="updateOffers" v-for="offer in offers" :title="offer.title" :id="offer.id" :created_at="offer.created_at"/>
        </tbody>
      </table>
    
    </div>
    
    </template>
    
    <script>
    
    import offerDashboard from '../components/offerDashboard.vue'
    export default{
        name: 'archivedOffersView',
        props:{
    
          idUser:{
    
            type:Number
    
          }
    
        },
        components:{
    
          offerDashboard,
    
        },
        data(){
    
            return {
                offers: [],
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
    
          }
    
        }
    }
    </script>